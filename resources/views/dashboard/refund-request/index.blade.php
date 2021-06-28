@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.refund-request'))
@section('page-heading', trans('app.refund-request'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.refund-request')</h4>
                    <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="card-datatable table-responsive">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('app.users')</th>
                                <th>@lang('app.note')</th>
                                <th>@lang('app.amount')</th>
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
                ajax: '{!! route('admin.refund-request.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'user', name: 'user'},
                    {data: 'note', name: 'note'},
                    {data: 'amount', name: 'amount'},
                    {data: 'updated_at', name: 'updated_at', orderable: false,},
                ]
            });
        });
    </script>
@endsection
