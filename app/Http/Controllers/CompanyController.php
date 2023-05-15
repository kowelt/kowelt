<?php

namespace App\Http\Controllers;

use App\Mail\CompanyRegisterMail;
use App\Mail\NewCompanyRegisteredAdminMail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company', [
            'navigation' => 'company'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $company = Company::create($data);

        Mail::to($company->email)->locale(app()->getLocale())->send(new CompanyRegisterMail());
        Mail::to(config('mail.to.admin_applicant'))->locale('en')->send(new NewCompanyRegisteredAdminMail($company));

        return redirect(route('welcome', app()->getLocale()))->with('success', __('navigation.succes_message_company'));
    }

    private function validator(array $data, $company_id = null)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
//            'email' => ['required', 'string', 'max:255', Rule::unique('companies')->ignore($company_id ?? '')],
            'email' => 'required|email',
            'tel' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'interested_in' => 'required|string|max:255',
            'professional_field' => 'required|string|max:255',
            'professional_experience' => 'required|string|max:255',
            'need_assistance' => 'required|string|max:255',
            'employees_number' => 'required|string|max:255',
        ]);
    }
}
