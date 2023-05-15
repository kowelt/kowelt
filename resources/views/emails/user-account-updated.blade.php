<x-mail::message>
{{ __('mail-user-account-updated.salutation') }}, @if($user->gender == '1') {{ __('mail-user-account-updated.Monsieur') }} @elseif($user->gender == '2') {{ __('mail-user-account-updated.Madame') }} @else  @endif {{ $user->firstname }} {{ $user->lastname }}

# {{ __('mail-user-account-updated.reussite') }}


{{ __('mail-user-account-updated.salutation_fin') }},<br>
{{ __('mail-user-account-updated.equipe') }}
</x-mail::message>
