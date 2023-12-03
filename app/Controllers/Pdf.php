<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\PengaduanModel;

class Pdf extends BaseController
{

    protected $PengaduanModel;

    public function __construct()
    {
        $this->PengaduanModel = new PengaduanModel();
    }


    public function generate()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDay = date('d');
        $pengaduan = $this->PengaduanModel->findAll();

        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'tanggal' => $currentDay,
            'bulan' => $currentMonth,
            'tahun' => $currentYear,
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('admin/pdf', $data);

        // Create PDF instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content into DOMPDF
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output the generated PDF to browser
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

}
