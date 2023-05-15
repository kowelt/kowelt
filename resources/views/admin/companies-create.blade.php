@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create Company</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form class="p-6 container mx-auto" action="{{ route('admin.companies.store', app()->getLocale()) }}" method="POST">
                @csrf
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('company.your_staff_request') }}</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <label for="interested_in" class="block text-sm font-medium text-gray-700">{{ __('company.What_are_you_interested_in') }}<span class="text-red-500">*</span></label>
                                            <select id="interested_in" name="interested_in" autocomplete="interested_in" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('interested_in') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                                <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}</option>
                                                <option value="{{ __('company.Professionnels') }}" {{ old('interested_in') == __('company.Professionnels') ? 'selected' : '' }}>{{ __('company.Professionnels') }}</option>
                                                <option value="{{ __('company.Apprentis') }}" {{ old('interested_in') == __('company.Apprentis') ? 'selected' : '' }}>{{ __('company.Apprentis') }}</option>
                                                <option value="{{ __('company.Stagiaires') }}" {{ old('interested_in') == __('company.Stagiaires') ? 'selected' : '' }}>{{ __('company.Stagiaires') }}</option>
                                                <option value="{{ __('company.etudiants_salariés') }}" {{ old('interested_in') == __('company.etudiants_salariés') ? 'selected' : '' }}>{{ __('company.etudiants_salariés') }}</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="professional_field" class="block text-sm font-medium text-gray-700">{{ __('company.Professional_field') }}<span class="text-red-500">*</span></label>
                                            <input type="text" name="professional_field" id="professional_field" autocomplete="professional_field" value="{{ old('professional_field') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('professional_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="professional_experience" class="block text-sm font-medium text-gray-700">{{ __('company.Desired_professional_experience') }}<span class="text-red-500">*</span></label>
                                            <select id="professional_experience" name="professional_experience" autocomplete="professional_experience" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('professional_experience') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                                <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}</option>
                                                <option value="{{ __('company.Less_than') }} 1 {{ __('company.year') }}" {{ old('professional_experience') == __('company.Less_than') . ' 1 ' . __('company.year') ? 'selected' : '' }}>{{ __('company.Less_than') }} 1 {{ __('company.year') }}</option>
                                                <option value="1 {{ __('company.to') }} 2 {{ __('company.years') }}" {{ old('professional_experience') == '1 ' . __('company.to') . ' 2 ' . __('company.years') ? 'selected' : '' }}>1 {{ __('company.to') }} 2 {{ __('company.years') }}</option>
                                                <option value="3 {{ __('company.to') }} 5 {{ __('company.years') }}" {{ old('professional_experience') == '3 ' . __('company.to') . ' 5 ' . __('company.years') ? 'selected' : '' }}>3 {{ __('company.to') }} 5 {{ __('company.years') }}</option>
                                                <option value="{{ __('company.More_than') }} 5 {{ __('company.years') }}" {{ old('professional_experience') == __('company.More_than') . ' 5 ' . __('company.years') ? 'selected' : '' }}>{{ __('company.More_than') }} 5 {{ __('company.years') }}</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="need_assistance" class="block text-sm font-medium text-gray-700">{{ __('company.Where_do_you_need_assistance') }}<span class="text-red-500">*</span></label>
                                            <input type="text" name="need_assistance" id="need_assistance" autocomplete="need_assistance" value="{{ old('need_assistance') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('need_assistance') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="employees_number" class="block text-sm font-medium text-gray-700">{{ __('company.How_many_employees_are_you_looking_for') }}<span class="text-red-500">*</span></label>
                                            <select id="employees_number" name="employees_number" autocomplete="employees_number" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('employees_number') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                                <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}</option>
                                                <option value="1" {{ old('employees_number') == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2 {{ __('company.to') }} 5" {{ old('employees_number') == '2 ' . __('company.to') . ' 5' ? 'selected' : '' }}>2 {{ __('company.to') }} 5</option>
                                                <option value="6 {{ __('company.to') }} 10" {{ old('employees_number') == '6 ' . __('company.to') . ' 10' ? 'selected' : '' }}>6 {{ __('company.to') }} 10</option>
                                                <option value="{{ __('company.More_than') }} 10" {{ old('employees_number') == __('company.More_than') . ' 10' ? 'selected' : '' }}>{{ __('company.More_than') }} 10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('company.your_contact_data') }}</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="firstname" class="block text-sm font-medium text-gray-700">{{ __('account.firstname') }}<span class="text-red-500">*</span></label>
                                            <input type="text" name="firstname" id="firstname" autocomplete="firstname" value="{{ old('firstname') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('firstname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="lastname" class="block text-sm font-medium text-gray-700">{{ __('account.lastname') }}<span class="text-red-500">*</span></label>
                                            <input type="text" name="lastname" id="lastname" autocomplete="lastname" value="{{ old('lastname') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('lastname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>
                                        <div class="col-span-6">
                                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('company.Email_address') }}<span class="text-red-500">*</span></label>
                                            <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>
                                        <div class="col-span-6">
                                            <label for="tel" class="block text-sm font-medium text-gray-700">{{ __('account.tel') }}<span class="text-red-500">*</span></label>
                                            <input type="tel" name="tel" id="tel" autocomplete="tel" value="{{ old('tel') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('tel') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>
                                        <div class="col-span-6">
                                            <label for="company_name" class="block text-sm font-medium text-gray-700">{{ __('company.Company_name') }}<span class="text-red-500">*</span></label>
                                            <input type="text" name="company_name" id="company_name" autocomplete="company_name" value="{{ old('company_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('company_name') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="flex justify-end gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.companies', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
