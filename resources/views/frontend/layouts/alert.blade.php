@if ($message = Session::get('success'))
    <div class="modal fade error-modal" id="error" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/done-re.png') }}">
                            <h4>success</h4>
                            <h4><strong>{{ $message }}</strong></h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="modal fade error-modal" id="error" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/error.png') }}">
                            <h4>error</h4>
                            <h4><strong>{{ $message }}</strong></h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="modal fade error-modal" id="error" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/error.png') }}">
                            <h4>warning</h4>
                            <h4><strong>{{ $message }}</strong></h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="modal fade error-modal" id="error" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/no-mzad.png') }}">
                            <h4>info</h4>
                            <h4><strong>{{ $message }}</strong></h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="modal fade error-modal" id="error" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/error.png') }}">
                            <h4>error</h4>
                        @foreach($errors->getMessages() as $key => $messages)
                            @foreach($messages as $message)
                                    <h4>{{ $message }}</h4>
                                @endforeach
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
