<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created student in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|unique:students',
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:students',
            'phone_number' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'gender' => 'required',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }

    // Display the specified student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show the form for editing the specified student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the specified student in storage
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|unique:students,student_id,'.$student->id,
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'phone_number' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'gender' => 'required',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student details updated successfully.');
    }

    // Remove the specified student from storage
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
