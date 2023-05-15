<?php

namespace App\Http\Controllers;

use App\Models\UggCity;
use App\Models\UggForm;
use App\Models\UggSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function generatePDF() {

        $user = Auth::user();
        $ugg_form = UggForm::withAll()->where('user_id', $user->id)->first();
        $session = UggSession::find($ugg_form->session);
        $ugg_city = UggCity::find($ugg_form->ugg_city);

        $data = [
            'date' => Carbon::now()->format('d/m/Y'),
            'end_date' => Carbon::now()->addDays(14)->format('d/m/Y'),
            'ugg_form' => $ugg_form,
            'session' => $session,
            'ugg_city' => $ugg_city,
            'user' => $user,
        ];

//        $pdf = PDF::loadView('pdf.ugg-pdf-' . ($user->language ?? $ugg_form->exam_language), $data);
        $pdf = PDF::loadView('pdf.ugg-pdf-fr', $data);

//        $content = $pdf->save('name.pdf', 'pdf');

        return $pdf->stream();

    }
}
