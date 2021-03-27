<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
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
}