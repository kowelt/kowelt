<x-mail::message>
# Hi Admin

New message from: {{ $data['name'] }}
    <br>

E-Mail: {{ $data['email'] }}
    <br>

{{ $data['message'] }}
    <br>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
