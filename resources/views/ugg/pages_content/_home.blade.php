
<br>
<br>
<div class="col-span-5 md:col-span-4 bg-white p-5 shadow max-w-7xl mx-auto font-notosans">
    <div class="md:flex">
        <div class="px-5 mb-4 md:mb-0 md:border-r flex flex-col justify-between">
            <div class="text-xl">
                @php
                    $salutation = Auth::user()->gender == '2' ? __('status-messages.salutation_female') : __('status-messages.salutation');
                    $accord = app()->getLocale() == 'fr' ? 'e' : '';
                @endphp
                @if(Auth::user()->status == 'in_process')
                    {!! __('status-messages.in_process_dashboard', ['salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'selected_second_phase')
                    {!! __('status-messages.selected_second_phase_dashboard', ['salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'not_selected_second_phase')
                    {!! __('status-messages.not_selected_second_phase_dashboard', ['salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'documents_under_verification')
                    {!! __('status-messages.documents_under_verification_dashboard', ['salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'registered_for_the_exam')
                    {!! __('status-messages.registered_for_the_exam_dashboard', ['salutation' => $salutation, 'accord' => $accord, 'city' => $ugg_city->{'name_' . app()->getLocale()}]) !!}
                @endif

                @if(Auth::user()->status == 'rejected')
                    {!! __('status-messages.rejected_dashboard', ['salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'selected')
                    {!! __('status-messages.selected_dashboard', ['note' => Auth::user()->note/100 . '/20', 'salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

                @if(Auth::user()->status == 'not_selected')
                    {!! __('status-messages.not_selected_dashboard', ['note' => Auth::user()->note/100 . '/20', 'salutation' => $salutation, 'accord' => $accord]) !!}
                @endif

{{--                @if(!in_array(Auth::user()->status, ['registered_for_the_exam', 'selected', 'rejected', 'not_selected', 'not_selected_second_phase']))--}}
                @if(in_array(Auth::user()->status, ['in_process', 'selected_second_phase', 'documents_under_verification']))
                    <br>
                    <br>
                    <div class="text-lg italic">
                        {!! __('status-messages.avoid_sending_dashboard') !!}
                    </div>
                @endif
            </div>
            <div class="flex justify-center sm:justify-start gap-2 mt-5 flex-wrap">
                @if(!in_array(Auth::user()->status, ['in_process', 'not_selected_second_phase']))
                    @if(!in_array(Auth::user()->status, ['registered_for_the_exam', 'rejected', 'selected', 'not_selected']))
                        <a href="{{ Auth::user()->pdf_path }}" download
                           class="px-10 py-3 border-2 border-black text-black hover:bg-black hover:text-white rounded text-center font-bold"
                        >{{ __('ugg.Download_PDF') }}</a>
                    @endif
                @if(Auth::user()->payment_method != App\Models\User::PAYMENT_METHOD_STRIPE)
                    <a href="{{ route('ugg.dashboard', [app()->getLocale(), 'upload-pdf']) }}"
                       class="px-10 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded text-center"
                    >{{ __('ugg.Upload_Documents') }}</a>
                @endif
                @endif

                @if(Auth::user()->status == 'selected_second_phase')
                    <a href="{{ route('ugg.stripe', [app()->getLocale()]) }}"
                       class="px-10 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded text-center"
                    >{{ __('ugg.Process_payment') }}</a>
                @endif
            </div>
        </div>
        <hr class="mb-4 md:hidden">
        <div class="text-xl px-4">
            <div class="mb-4">
                {{--text-[#26549A]--}}
                <div class="text-2xl mb-4 font-bold text-blue-500">{{ __('account.Personal_Informations') }}</div>
                <div class="mb-2"><span class="underline font-light">{{ __('account.Applicant_number') }}</span>: <span class="font-semibold">{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</span></div>
                <div class="mb-2"><span class="underline font-light">{{ __('account.Name_Surmane') }}</span>: <span class="font-semibold">{{ Auth::user()->lastname }}, {{ Auth::user()->firstname }}</span></div>
                <div class="font-light italic">{{ __('account.E_mail_notifications') }}</div>
                <div><span class="underline font-light">Status</span>:
                    <span class="@if(Auth::user()->status == 'selected') text-green-400 @elseif(in_array(Auth::user()->status, ['not_selected_second_phase', 'rejected', 'not_selected'])) text-red-400 @else text-yellow-400 @endif font-semibold">
                        {{ config('status_list_' . app()->getLocale() . '.' . Auth::user()->status) }}
                    </span>
                </div>
            </div>
            <hr class="mb-4">
            <div>
                <div class="text-2xl mb-4 font-bold text-blue-500">{{ __('account.Help_Contact') }}</div>
                <div class="mb-2">{{ __('account.Should_you_require') }}:</div>
                <div class="italic font-semibold">contact.kodreams@kowelt.de</div>
            </div>
        </div>
    </div>
</div>
