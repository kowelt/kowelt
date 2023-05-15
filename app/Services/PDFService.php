<?php

namespace App\Services;

use App\Models\UggCity;
use App\Models\UggSession;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PDFService
{
    public static function generatePdf($user, $ugg_form): string
    {
        if ($user->pdf_path) {
            return $user->pdf_path;
        }

        $data = [
            'date' => Carbon::now()->format('d/m/Y'),
            'end_date' => Carbon::now()->addDays(14)->format('d/m/Y'),
            'ugg_form' => $ugg_form,
            'session' => UggSession::find($ugg_form->session),
            'ugg_city' => UggCity::find($ugg_form->ugg_city),
            'user' => $user,
        ];

        $pdf = PDF::loadView('pdf.ugg-pdf-' . ($user->language ?? $ugg_form->exam_language), $data);

        $filename = Str::snake($user->firstname) . '_' . Str::snake($user->lastname) . '_' . time() . '.pdf';

        $pdf->save($filename, 'pdf');

        return asset('/storage/users/pdf/' . $filename);
    }
}
