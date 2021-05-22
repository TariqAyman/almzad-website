<tr>
    <td class="header">
        @if(setting('company_name'))
            <a href="{{ url('/') }}" style="display: inline-block;">
                <img src="{{ setting('company_logo') ? asset(setting('company_logo')) : asset('frontend/img/logo.png') }}" alt="{{ setting('company_name') }}" class="logo">
            </a>
        @else
            <a href="{{ $url }}" style="display: inline-block;">
                @if (trim($slot) === 'Laravel')
                    <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
                @else
                    {{ $slot }}
                @endif
            </a>
        @endif
    </td>
</tr>
