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
                            <form class="form-horizontal" action="{{ route('phone_verify.post') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="tel" style="direction: ltr;text-align: left;" class="form-control" name="phone_number" id="phone_number" placeholder="@lang('app.phone_number')" required
                                           pattern="[0-9]" value="{{ old('phone_number') ?? auth('user')->user()->phone_number }}" title="@lang('app.phone_number')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>

                                <div class="form-group">
                                    <div id="recaptcha-container"></div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-info w-100" onclick="sendOTP()">ارسال الكود</button>
                                </div>
                                <div class="form-group">
                                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                                    <input type="text" id="verification" class="form-control" placeholder="Verification code">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                    <br>
                                    <button type="button" class="btn btn-info w-100" onclick="verify()">تاكيد الكود</button>
                                </div>
                                <button type="submit" class="btn btn-show w-100">تسجيل دخول</button>
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
            apiKey: "AIzaSyBUkibXUBAbz00a1H8YVmtuFb5m9fnY5oE",
            authDomain: "mdrastk-com.firebaseapp.com",
            databaseURL: "https://mdrastk-com.firebaseio.com",
            projectId: "mdrastk-com",
            storageBucket: "mdrastk-com.appspot.com",
            messagingSenderId: "371911299365",
            appId: "1:371911299365:web:f685130953260182ec4acc",
            measurementId: "G-8G26F1H21J"
        };
        firebase.initializeApp(firebaseConfig);

        window.onload = function () {



            render();
        };

        function render() {
            firebase.auth().languageCode = '{{ app()->getLocale() }}';
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            // window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            //     'size': 'invisible',
            //     'callback': (response) => {
            //         // reCAPTCHA solved, allow signInWithPhoneNumber.
            //         onSignInSubmit();
            //     }
            // });
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#phone_number").val();
            console.log(number);
            console.log(window.recaptchaVerifier);
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            var number = $("#phone_number").val();

            coderesult.confirm(code).then(function (result) {
                var  user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#successOtpAuth").text(error.message);
                $("#successOtpAuth").show();
            });

            var user = firebase.auth().currentUser;
console.log(user);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{ route('phone_verify.post') }}",
                data: {phoneNumber: number},
                success: function (data) {
                    console.log(data);
                }
            });
        }
    </script>

@endsection
