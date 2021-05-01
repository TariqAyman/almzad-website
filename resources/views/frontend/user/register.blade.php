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
                            <form class="form-horizontal" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="الاسم الأول" required value="{{ old('first_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="الاسم الأخير" required value="{{ old('last_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required value="{{ old('username') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="tel" style="direction: ltr;text-align: left;" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="رقم الجوال" required id="phone_number">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                    <br>
                                    <button type="button" class="btn btn-info w-100" onclick="sendOTP()">ارسال الكود</button>
                                </div>
                                <div class="form-group">
                                    <div id="recaptcha-container"></div>
                                </div>
                                <div class="form-group">
                                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                                    <input type="text" id="verification" class="form-control" placeholder="Verification code">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                    <br>
                                    <button type="button" class="btn btn-info w-100" onclick="verify()">تاكيد الكود</button>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required value="{{ old('email') }}">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input name="tos" type="checkbox" value="1">
                                    <label>@lang('app.toc')</label>
                                </div>
                                <button type="submit" class="btn btn-show w-100">@lang('app.register_now')</button>
                                <div class="form-group text-center">
                                    <a href="{{ route('login') }}" class="forget-pass">@lang('app.login')</a>
                                    <a href="{{ route('password.request') }}" class="forget-pass">@lang('app.forget_password')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="endrequest" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/done-re.png') }}">
                            <h4>تم اكمال الطلب بنجاح</h4>
                            <h4>يرجي الانتظار لحين تايد الطلب من الادارة</h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>

@endsection
