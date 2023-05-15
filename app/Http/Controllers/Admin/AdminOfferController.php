<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminOfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['company'])->get();

        return view('admin.offers', [
            'offers' => $offers,
            'nav' => 'offers'
        ]);
    }

    public function create()
    {
        $companies = Company::all();

        return view('admin.offers-create', [
            'companies' => $companies,
            'nav' => 'offers',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        Offer::create($data);

        return redirect(route('admin.offers', app()->getLocale()));
    }

    public function edit($language, $id)
    {
        $offer = Offer::with(['company'])->where('id', $id)->first();
        $companies = Company::all();

        return view('admin.offers-edit', [
            'offer' => $offer,
            'companies' => $companies,
            'nav' => 'offers'
        ]);
    }

    public function update(Request $request, $language, Offer $offer)
    {
        $data = $this->validator($request->all())->validate();
        $offer->update($data);

        return redirect(route('admin.offers', $language));
    }

    public function delete($language, Offer $offer)
    {
        $offer->delete();

        return redirect(route('admin.offers', $language));
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'company_id' => 'required|numeric',
            'title' => 'required|string|max:256',
            'description' => 'required|string',
        ]);
    }
}
