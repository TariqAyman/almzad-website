<div class="container p-5">
    @if ($message = Session::get('success'))
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12">
                <div class="alert alert-success fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">success</h4>
                    <p>
                        <strong>{{ $message }}</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12">
                <div class="alert alert-error fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">error</h4>
                    <p>
                        <strong>{{ $message }}</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12">
                <div class="alert alert-warning fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">warning</h4>
                    <p>
                        <strong>{{ $message }}</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12">
                <div class="alert alert-info fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">info</h4>
                    <p>
                        <strong>{{ $message }}</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        @foreach($errors->getMessages() as $key => $messages)
            @foreach($messages as $message)
                <div class="row no-gutters">
                    <div class="col-lg-5 col-md-12">
                        <div class="alert alert-danger fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="alert-heading">{{ $key }}</h4>
                            <p>
                                <strong>{{ $message }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endif
</div>
