
@component('mail::message')
    Hi,

    A link titled "[{{ $link->title }}]({{ $link->url }})" was submitted by {{ $link->user->email }}.

    {{ $link->body }}

    Kind Regards,

    Your blog
@endcomponent
