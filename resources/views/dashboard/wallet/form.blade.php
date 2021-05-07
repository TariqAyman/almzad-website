@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.add_wallet'))
@section('page-heading', trans('app.add_wallet'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">

                    {!! Form::open(['route' => 'admin.wallet.store', 'files' => true, 'id' => 'category-form']) !!}

                    <h6 class="heading-small text-muted mb-4">@lang('app.wallet information')</h6>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.users')</label>
                        <div class="col-sm-10">
                            {{ Form::select('user_id', $users, old('user_id'), [ 'class'=> 'select2 form-control form-control-lg', 'placeholder' => 'اختار مستخدم']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.wallet_type')</label>
                        <div class="col-sm-10">
                            {{ Form::select('type', ['in' => 'ايداع','out'=>'سحب'], old('type') , [ 'class'=> 'selectpicker form-control']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.amount')</label>
                        <div class="col-sm-10">
                            {{ Form::number('amount', old('amount'), ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.note')</label>
                        <div class="col-sm-10">
                            {{ Form::textarea('note', old('note'), ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            @can('update-category')
                                {{ Form::submit(trans('app.submit'), ['class'=> 'mt-5 btn btn-primary']) }}
                            @endcan
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('dashboard/vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
    <script>

        $(document).ready(function () {
            var select = $('.select2');

            select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    // the following code is used to disable x-scrollbar when click in select input and
                    // take 100% width in responsive also
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });
        });
    </script>
@endsection
