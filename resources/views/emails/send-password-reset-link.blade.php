<x-mail::message>
{{ __('mail-reset-password.salutation') }}, @if($user->gender == '1') {{ __('mail-reset-password.Monsieur') }} @elseif($user->gender == '2') {{ __('mail-reset-password.Madame') }} @else  @endif {{ $user->firstname }} {{ $user->lastname }}

# {{ __('mail-reset-password.reussite') }}

<x-mail::button :url="$reset_link">
{{ __('mail-reset-password.bouton') }}
</x-mail::button>

{{ __('mail-reset-password.lien_ne_fonctionne_pas') }}: {{ $reset_link }}

{{ __('mail-reset-password.salutation_fin') }},<br>
{{ __('mail-reset-password.equipe') }}
</x-mail::message>
