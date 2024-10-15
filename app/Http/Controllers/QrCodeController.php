<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    /**
     * Generate a QR code.
     */
    public function generate(Request $request)
    {
        // Validate the input (if necessary)
        $request->validate([
            'data' => 'required|string|max:255',
        ]);

        // Generate the QR code
        $qrCode = QrCode::size(300)->generate($request->input('data'));

        // Return the QR code as an image
        return response($qrCode)->header('Content-type', 'image/svg+xml');

        return view('generate-qr-code')->with('qr_code', $qrCode);
    }

    public function scan()
    {
        return view('qr.scan');
    }

    /**
     * Display student information based on scanned QR code data.
     */
    public function showStudent(Request $request)
    {
        // Assuming the QR code contains student ID or relevant information
        $data = $request->input('data');

        // Fetch student by ID or other identifier from the QR code data
        $student = Student::where('mobile', $data)->first(); // Adjust according to your QR code data

        if (!$student) {
            return redirect()->route('scan.qr.code')->with('error', 'Student not found.');
        }

        // Generate the QR code for the student and show the details
        $qrCode = QrCode::size(300)->generate($student->name . ' - ' . $student->mobile);

        return view('students.show', compact('student', 'qrCode'));
    }
}
