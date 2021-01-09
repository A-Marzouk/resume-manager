@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
<div class="custom-footer">
    This email was sent by <a href="mailto:info@civ.ie">info@civ.ie</a>
    <br>
    Update <a href="https://civ.ie/login">subscription</a> preference
    <br>
    Please do not reply to this email. | Need help? Visit our <a>FAQ</a>
    <br>
    © {{ date('Y') }} civ.ie | @lang('All rights reserved.')
</div>

@endcomponent
@endslot
@endcomponent