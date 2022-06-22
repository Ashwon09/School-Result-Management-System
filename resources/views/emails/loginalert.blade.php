@component('mail::message')
# Login Alert

Your Account was Logged in at {{$time}} .
If It was you who logged in then you can ignore this message. 
Else change Password by clicking the button below

@component('mail::button', ['url' => 'http://127.0.0.1:8000/student-password'])
Change Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
