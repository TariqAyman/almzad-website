@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.transactions'))
@section('page-heading', trans('app.transactions'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.transactions')</h4>
                </div>
                <div class="card-body p-0">
                    <div class="card-datatable table-responsive">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('app.user_name')</th>
                                <th>@lang('app.auction')</th>
                                <th>@lang('app.amount')</th>
                                <th>@lang('app.note')</th>
                                <th>@lang('app.payment_id')</th>
                                <th>@lang('app.Created at')</th>
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
                ajax: '{!! route('admin.transaction.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'auction', name: 'auction'},
                    {data: 'amount', name: 'amount'},
                    {data: 'note', name: 'note'},
                    {data: 'payment_id', name: 'out'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                ]
            });
        });
    </script>
@endsection
