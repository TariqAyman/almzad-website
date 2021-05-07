@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.contactus'))
@section('page-heading', trans('app.contactus'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.contactus')</h4>
                </div>
                <div class="card-body p-0">
                    <div class="card-datatable table-responsive">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('app.full_name')</th>
                                <th>@lang('app.subject')</th>
                                <th>@lang('app.email')</th>
                                <th>@lang('app.phone')</th>
                                <th>@lang('app.message_contactus')</th>
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
                ajax: '{!! route('admin.contactus.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'subject', name: 'subject'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'message', name: 'message'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                ]
            });
        });
    </script>
@endsection
