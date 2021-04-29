<script type="text/javascript">
    $(function () {
        'use strict';

        let isRTL = $('html').attr('data-textdirection') === 'rtl';
        let positionClass = (isRTL ? 'toast-top-left' : 'toast-top-right');

        @if(isset ($errors) && count($errors) > 0)

        @foreach($errors->all() as $error)
        $(function () {
            var msg = '{{ $error }}';
            var title = '{{ trans('app.error_message') }}';
            var type = 'error';
            toastr[type](msg, title, {
                positionClass: positionClass,
                closeButton: true,
                progressBar: true,
                preventDuplicates: true,
                newestOnTop: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                timeOut: 5000,
                rtl: isRTL
            });
        });
        @endforeach
        @endif
        @if(Session::get('success', false))

        @php
            $data = Session::get('success');
        @endphp

        @if (is_array($data))
        @foreach ($data as $msg)
        $(function () {
            var msg = '{{ $msg }}';
            var title = '{{ trans('app.success_message') }}';
            var type = 'success';
            toastr[type](msg, title, {
                positionClass: positionClass,
                closeButton: true,
                progressBar: true,
                preventDuplicates: true,
                newestOnTop: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                timeOut: 5000,
                rtl: isRTL
            });
        });
        @endforeach
        @else
        $(function () {
            var msg = '{{ $data }}';
            var title = '{{ trans('app.success_message') }}';
            var type = 'success';
            toastr[type](msg, title, {
                positionClass: positionClass,
                closeButton: true,
                progressBar: true,
                preventDuplicates: true,
                newestOnTop: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                timeOut: 5000,
                rtl: isRTL
            });
        });
        @endif
        @endif
    });
</script>

