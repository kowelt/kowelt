<x-mail::message>
{{ __('mail-confirmation-email.salutation') }}, @if($user->gender == '1') {{ __('mail-confirmation-email.Monsieur') }} @elseif($user->gender == '2') {{ __('mail-confirmation-email.Madame') }} @else  @endif {{ $user->firstname }} {{ $user->lastname }}
    <br>

@php
    $accord = (app()->getLocale() == 'fr' && $user->gender == '2') ? 'e' : '';
@endphp

# {{ __('mail-confirmation-email.remerciement', ['accord' => $accord]) }}

{{ __('mail-confirmation-email.corp_du_mail') }}
    <br>

<x-mail::button :url="$activation_link">
    {{ __('mail-confirmation-email.bouton_confirmation_texte') }}
</x-mail::button>

{{ __('mail-confirmation-email.lien_ne_fonctionne_pas') }}: {{ $activation_link }}
    <br>

{{ __('mail-confirmation-email.mon_compte') }}
    <br>

{{ __('mail-confirmation-email.salutation_fin') }},<br>
{{ __('mail-confirmation-email.equipe') }}
</x-mail::message>
