{{--<div class="mt-5 md:mt-20 grid grid-cols-5 gap-1 bg-gray-100 p-1">
    <div class="col-span-5 md:col-span-1 bg-white">
        <br>
        <div class="py-2 px-5 font-bold">{{ __('account.mon_cv') }}</div>
        <hr class="mx-auto">
        <div onclick="window.location.href='{{ route('applicant.dashboard', [app()->getLocale(), 'cv', 'cv-form']) }}'"
             class="py-3 px-5 hover:bg-gray-200 cursor-pointer {{ $section_2 == 'cv-form' ? 'bg-gray-100' : ''}}">
            <a>{{ __('account.cv_form') }}</a>
        </div>
        <br>
    </div>
    <div class="col-span-5 md:col-span-4 bg-white p-5">
        @if($section_2 == 'cv-form')
            @include('applicant.pages_content._cv-form')
        @endif
    </div>
</div>--}}
<br>
<br>
<div class="col-span-5 md:col-span-4 bg-white p-5 shadow max-w-7xl mx-auto">
    <div class="md:flex items-center">
        <div class="px-5 mb-4 md:mb-0 md:border-r">
            <div class="text-2xl font-bold">
                {{ __('account.Welcome_to_KOWELT') }}
            </div>
            <br>
            <div class="text-xl">
                {{ __('account.Your_information') }}
            </div>
            <br>
            <div class="text-xl">
                {{ __('account.We_will_contact') }}
            </div>
            <br>
            <div class="text-xl">
                {{ __('account.With_KOWELT') }}
            </div>
        </div>
        <hr class="mb-4 md:hidden">
        <div class="text-xl px-4">
            <div class="mb-4">
                {{--text-[#26549A]--}}
                <div class="text-2xl mb-4 font-bold text-blue-500">{{ __('account.Personal_Informations') }}</div>
                <div class="mb-2">{{ __('account.Applicant_number') }}: {{ '38448' . str_pad($curriculum_vitae->id, 3, '0', STR_PAD_LEFT) }}</div>
                <div class="mb-2">{{ __('account.Name_Surmane') }}: {{ Auth::user()->lastname }}, {{ Auth::user()->firstname }}</div>
                <div>{{ __('account.E_mail_notifications') }}
                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>--}}</div>
            </div>
            <hr class="mb-4">
            <div>
                <div class="text-2xl mb-4 font-bold text-blue-500">{{ __('account.Help_Contact') }}</div>
                <div class="mb-2">{{ __('account.Should_you_require') }}:</div>
                <div class="italic">contact.germany@kowelt.de</div>
            </div>
        </div>
    </div>
</div>
