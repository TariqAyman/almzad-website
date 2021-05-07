@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.wallets'))
@section('page-heading', trans('app.wallets'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.category')</h4>
                    <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                        <div class="ag-btns d-flex flex-wrap">
                            <div class="btn-export">
                                <a class="btn btn-primary ag-grid-export-btn waves-effect waves-float waves-light" href="{{ route('admin.wallet.create') }}">@lang('app.create_new')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="card-datatable table-responsive">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('app.name')</th>
                                <th>@lang('app.phone')</th>
                                <th>@lang('app.in_wallet')</th>
                                <th>@lang('app.hold')</th>
                                <th>@lang('app.out')</th>
                                <th>@lang('app.balance')</th>
                                <th>@lang('app.Updated at')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    @parent
    @include('dashboard.panels.datatable')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('admin.wallet.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'in', name: 'in'},
                    {data: 'hold', name: 'hold'},
                    {data: 'out', name: 'out'},
                    {data: 'balance', name: 'balance'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                ]
            });
        });
    </script>
@endsection
