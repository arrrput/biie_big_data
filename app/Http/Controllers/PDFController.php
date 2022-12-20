<?php

namespace App\Http\Controllers;

use setasign\Fpdi\Fpdi;

class PDFController extends Controller
{
    //
    public function generatePDF()

    {

      $filepath = public_path('storage/env/nicesnippets.pdf');
      $outputfilepath = public_path('storage/env/output_nicesnippets.pdf');
      
      $this->filePDF($filepath, $outputfilepath);
      
      return response()->file($outputfilepath);

    }

    public function filePDF($file, $outputfilepath){

      $fpdi = new Fpdi();
      $count = $fpdi->setSourceFile($file);

      for($i = 1; $i<= $count; $i++){
        $template = $fpdi->importPage($i);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        $fpdi->SetFont("helvetica", "", 15);
        $fpdi->SetFillColor(153,0,153);

        $left =10;
        $top = 10;
        $text = "UNCONTROLLED DOCUMENT";

        $fpdi->Text($left, $top, $text);
        $fpdi->Image("https://thumbs.dreamstime.com/b/url-text-blue-grungy-vintage-stamp-url-text-blue-grungy-vintage-rectangle-stamp-212480336.jpg");

      }

      return $fpdi->Output($outputfilepath, 'F');
    }
}
