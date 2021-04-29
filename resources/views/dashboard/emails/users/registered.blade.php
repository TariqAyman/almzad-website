@component('mail::message')
    # New User Registered
    @component('mail::panel')
        A new user has been registered.

    @endcomponent


    * Name : {{ $user->name }}
    * Email : {{ $user->email }}

    @component('mail::button', ['url' => route('admin.admins.show', $user->id)])
        View User Details
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
