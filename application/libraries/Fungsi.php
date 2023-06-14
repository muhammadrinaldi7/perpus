<?php
class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }
    function PdfGenerator($html, $filename, $kertas, $orientasi)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($kertas, $orientasi);
        $dompdf->getOptions()->setChroot(FCPATH);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array("Attachment" => 0));
    }
}
