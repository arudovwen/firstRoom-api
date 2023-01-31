<x-mail::message>
You just requested a password change, use the link to reset your password

<x-mail::button :url="$details['url']">
Click to reset
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
