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

        // $data = [
        //     'foo' => 'bar'
        //   ];

        // $pdf = PDF::loadFile(public_path().'/storage/env/nicesnippets.pdf', $data, [], [
        //     'title'      => 'Another Title',
        //     'margin_top' => 0,
        //     'watermark'=> 'test',
        //     'watermark_text_alpha' => 0.1,
        //     'show_watermark' => true,
        //   ]);
        // return $pdf->stream('document.pdf');

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
