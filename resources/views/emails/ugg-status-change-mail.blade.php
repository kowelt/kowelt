<x-mail::message>
{{ __('mail-confirmation-two.salutation') }}, @if($user->gender == '1') {{ __('mail-confirmation-two.Monsieur') }} @elseif($user->gender == '2') {{ __('mail-confirmation-two.Madame') }} @else  @endif {{ $user->firstname }} {{ $user->lastname }}
<br>

@if($user->status == 'in_process')
{!! __('status-messages.in_process') !!}
@endif

@if($user->status == 'selected_second_phase')
@if($user->gender == '2')
{!! __('status-messages.selected_second_phase_female', ['city' => $city->{'name_' . app()->getLocale()}]) !!}
@else
{!! __('status-messages.selected_second_phase', ['city' => $city->{'name_' . app()->getLocale()}]) !!}
@endif
@endif

@if($user->status == 'not_selected_second_phase')
{!! __('status-messages.not_selected_second_phase') !!}
@endif

@if($user->status == 'documents_under_verification')
{!! __('status-messages.documents_under_verification') !!}
@endif

@if($user->status == 'registered_for_the_exam')
{!! __('status-messages.registered_for_the_exam', ['city' => $city->{'name_' . app()->getLocale()}]) !!}
@endif

@if($user->status == 'rejected')
{!! __('status-messages.rejected') !!}
@endif

@if($user->status == 'selected')
{!! __('status-messages.selected') !!}
@endif

@if($user->status == 'not_selected')
{!! __('status-messages.not_selected') !!}
@endif

<br>
{{ __('mail-confirmation-two.salutation_fin') }},<br>
{{ __('mail-confirmation-two.equipe') }}
<br>
<br>
@if(in_array($user->status, ['selected_second_phase', 'documents_under_verification', 'registered_for_the_exam']))
{!! __('status-messages.message_rappel') !!}
@endif
</x-mail::message>
