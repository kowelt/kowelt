<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminCompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with(['offers'])->get();

        return view('admin.companies', [
            'companies' => $companies,
            'nav' => 'companies'
        ]);
    }

    public function create()
    {
        return view('admin.companies-create', [
            'nav' => 'companies'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        Company::create($data);

        return redirect(route('admin.companies', app()->getLocale()));
    }

    public function edit($language, $id)
    {
        $company = Company::with(['offers'])->where('id', $id)->first();

        return view('admin.companies-edit', [
            'company' => $company,
            'nav' => 'companies'
        ]);
    }

    public function update(Request $request, $language, Company $company)
    {
        $data = $this->validator($request->all(), $company->id)->validate();
        $company->update($data);

        return redirect(route('admin.companies', $language));
    }

    public function delete($language, Company $company)
    {
        $company->delete();

        return redirect(route('admin.companies', $language));
    }

    private function validator(array $data, $company_id = null)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:256',
            'lastname' => 'required|string|max:256',
//            'email' => ['required', 'string', 'max:256', Rule::unique('companies')->ignore($company_id ?? '')],
            'email' => 'required|email',
            'tel' => 'required|string|max:256',
            'company_name' => 'required|string|max:256',
            'interested_in' => 'required|string|max:256',
            'professional_field' => 'required|string|max:256',
            'professional_experience' => 'required|string|max:256',
            'need_assistance' => 'required|string|max:256',
            'employees_number' => 'required|string|max:256',
        ]);
    }
}
