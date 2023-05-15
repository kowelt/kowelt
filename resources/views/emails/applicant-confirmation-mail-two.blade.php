<x-mail::message>
{{ __('mail-confirmation-two.salutation') }}, @if($user->gender == '1') {{ __('mail-confirmation-two.Monsieur') }} @elseif($user->gender == '2') {{ __('mail-confirmation-two.Madame') }} @else  @endif {{ $user->firstname }} {{ $user->lastname }}
    <br>

# {{ __('mail-confirmation-two.reussite') }}

{{ __('mail-confirmation-two.corp_du_mail') }} <a href="{{ route('applicant.login', app()->getLocale()) }}" target="_blank">KOWELT</a>
    <br>
    <br>

{{ __('mail-confirmation-two.Données_de_connexion') }}:<br>
{{ __('mail-confirmation-two.Email') }}: {{ $user->email }}<br>
{{ __('mail-confirmation-two.Mot_de_passe') }}: {{ __('mail-confirmation-two.Celui_que_vous_avez_choisi') }}
    <br>
    <br>

{{ __('mail-confirmation-two.amuse_toi') }}
    <br>

{{ __('mail-confirmation-two.salutation_fin') }},<br>
{{ __('mail-confirmation-two.equipe') }}
</x-mail::message>
