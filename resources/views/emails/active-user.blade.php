@component('mail::message')
#کد فعال سازی

@component('mail::button', ['url' => route('activation.account' , $code)])
    فعال کردن ایمیل
@endcomponent

@endcomponent