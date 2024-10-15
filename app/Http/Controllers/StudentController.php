<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); // Fetch all students from the database
        $qrCodes = []; // Initialize an array to hold QR codes for each student

        foreach ($students as $student) {
            // Format the QR code content
          $qrCodes[$student->id] = QrCode::size(80)->generate($student->name . ' - ' . $student->address . ' - ' . $student->mobile);
        }
    
        return view('students.index', compact('students', 'qrCodes')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'year_level' => 'required|string|max:20',
        'course' => 'required|string|max:100',
        'section' => 'required|string|max:50',
        ]);

        Student::create($request->all()); // Create a new student
        return redirect()->route('students.index')->with('success', 'Student created successfully.'); // Redirect to index
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id); // Fetch student by ID

    
        $qrCode = QrCode::size(80)->generate($student->name . ' - ' . $student->address . ' - ' . $student->mobile);
        // Pass the student and qrCode variables to the view
        return view('students.show', compact('student', 'qrCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id); // Fetch student by ID
        return view('students.edit', compact('student')); // Return the edit view
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'year_level' => 'required|string|max:20',
            'course' => 'required|string|max:100',
            'section' => 'required|string|max:50',
            ]);

        $student = Student::findOrFail($id);
        $student->update($request->all()); // Update the student
        return redirect()->route('students.index')->with('success', 'Student updated successfully.'); // Redirect to index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete(); // Delete the student
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.'); // Redirect to index
    }


}
