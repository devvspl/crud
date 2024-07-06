<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    public function print()
    {
        $products = Product::all();
        $invoiceData = [
            'invoice_id' => 123,
            'transaction_id' => 1234567,
            'payment_method' => 'Paypal',
            'creation_date' => date('M d, Y'),
            'total_amount' => 141.50
        ];

        $pdf = PDF::loadView('invoice', compact('products', 'invoiceData'));
        return $pdf->download('invoice.pdf');
    }
}
