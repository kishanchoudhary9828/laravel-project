@component('mail::message')
# Introduction

Verify OTP. {{ $otp }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
