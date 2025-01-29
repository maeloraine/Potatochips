<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{

    public function generatePdfWithQrCode()
    {
        $referenceNumber = 'ABC123'; // Example reference number

        // Generate QR code
        $qrCode = QrCode::size(200)->generate($referenceNumber);

        // Load view and pass QR code
        $pdf = Pdf::loadView('pdf_view', compact('qrCode', 'referenceNumber'));
        return $pdf->download('receipt.pdf');
    }
}


