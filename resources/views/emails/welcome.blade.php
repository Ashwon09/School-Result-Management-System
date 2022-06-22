@component('mail::message')
# Welcome to ABCD

The body of your message.


@component('mail::table')
| Laravel | Table |
| ------------- |:-------------:|
| Name is | {{$data['name']}} |
| Addresss is | {{$data['address']}} |
| Date of Birth is | {{$data['dob']}} |

@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Visit Site

@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent