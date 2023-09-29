<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;

class PdfController extends Controller
{
   
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com  ',
            'date' => date('m/d/Y')
        ];
        $user=User::all();
        
        $html = "<html>";
        $html .= "<body>";
        $html .= "<th>";
        $html .= "<h1>Helo rd</h1>";
        $html .= "</th>";
        $html .= "</body>";
        $html .= "</html>";
        // dd($html);
       
        $pdf = PDF::loadView('PDF', $data ,compact('user','html'));
    
        return $pdf->download('Blog.pdf');
    }
}


