@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/black-logo.png') }}" alt="مزاد الخير" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('frontend.verifyPhone') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="tel" style="direction: {{ Session::get('appLocale') == 'ar' ? 'ltr' : 'rtl' }};text-align: {{ Session::get('appLocale') == 'ar' ? 'left' : 'right' }};" class="form-control" name="phone_number" id="phone_number" placeholder="@lang('app.phone_number')" required
                                           readonly value="{{ old('phone_number') ?? auth('user')->user()->phone_number }}" title="@lang('app.phone_number')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>

                                <div class="form-group">
                                    <div id="recaptcha-container"></div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <button type="button" class="btn btn-info w-100" onclick="sendOTP()">ارسال الكود</button>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                                    <input type="text" id="verification" class="form-control" placeholder="@lang('app.Verification code')">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                    <br>
                                    <button type="button" class="btn btn-info w-100" onclick="verify()">تاكيد الكود</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('page-script')
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>
    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-firestore.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "{{ env('FIREBASE_API_KEY') }}",
            authDomain:  "{{ env('FIREBASE_API_AUTH_DOMAIN') }}",
            projectId:  "{{ env('FIREBASE_API_PROJECT_ID') }}",
            storageBucket:  "{{ env('FIREBASE_API_STORAGE_BUCKET') }}",
            messagingSenderId:  "{{ env('FIREBASE_API_MESSAGING_SENDER_ID') }}",
            appId:  "{{ env('FIREBASE_API_APP_ID') }}",
            measurementId:  "{{ env('FIREBASE_API_MEASUREMENT_ID') }}"
        };
        firebase.initializeApp(firebaseConfig);

        window.onload = function () {


            render();
        };

        function render() {
            firebase.auth().languageCode = '{{ app()->getLocale() }}';
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');

            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'normal',
                'callback': function (recaptchaToken) {
                    // reCAPTCHA solved, send recaptchaToken and phone number to backend.
                    sendOTP(recaptchaToken);
                }
            });

            recaptchaVerifier.render();
        }

        function sendOTP(recaptchaToken) {
            var number = $("#phone_number").val();
            console.log(number);
            console.log(window.recaptchaVerifier);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{ route('frontend.verifyPhone.sendOTP') }}",
                data: {recaptchaToken: recaptchaToken},
                success: function (data) {
                    console.log(data);
                }
            });

            // firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            //     window.confirmationResult = confirmationResult;
            //     coderesult = confirmationResult;
            //     console.log(coderesult);
            //     $("#successAuth").text("Message sent");
            //     $("#successAuth").show();
            // }).catch(function (error) {
            //     $("#error").text(error.message);
            //     $("#error").show();
            // });
        }

        function verify() {
            var code = $("#verification").val();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{ route('frontend.verifyPhone.verify') }}",
                data: {code: code},
                success: function (data) {
                    console.log(data);
                    window.location.href = '{{ route('frontend.home') }}'
                }
            });
        }

    </script>

@endsection
