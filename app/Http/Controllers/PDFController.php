<?php

namespace App\Http\Controllers;

use PDF;

class PDFController extends Controller
{
    public function getpdf()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('/pdf/myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

    public function generateLeaveFormPDF($userData, $leaveData)
    {
        $data = [
            'user' => $userData,
            'leaves' => $leaveData
        ];

        $pdf = PDF::loadView('/pdf/leave_summary', $data);

        return $pdf->download('leave_summary.pdf');
    }
}
