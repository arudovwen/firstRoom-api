<x-mail::message>
# Email verification

The body of your message.

<x-mail::button :url="$detail['url']">
Click to verify your email address
</x-mail::button>
<br>
or use the link below to verify your email address <br>
<a :href="$detail['url']">{{ $detail['url'] }}</a>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
