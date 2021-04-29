@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.activity'))
@section('page-heading', trans('app.activity'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.activity')</h4>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="table table-striped table-bordered" id="activityTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('app.log_name')</th>
                            <th>@lang('app.description')</th>
                            <th>@lang('app.subject_id')</th>
                            <th>@lang('app.subject_type')</th>
                            <th>@lang('app.causer_id')</th>
                            <th>@lang('app.causer_type')</th>
                            <th>@lang('app.properties')</th>
                            <th>@lang('app.created_at')</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
            $('#activityTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('admin.activity-log.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'log_name', name: 'log_name', orderable: false,},
                    {data: 'description', name: 'description', orderable: false,},
                    {data: 'subject_id', name: 'subject_id', orderable: false,},
                    {data: 'subject_type', name: 'subject_type', orderable: false,},
                    {data: 'causer_id', name: 'causer_id', orderable: false,},
                    {data: 'causer_type', name: 'causer_type', orderable: false,},
                    {data: 'properties', name: 'properties', orderable: false,},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                ]
            });
        });
    </script>
@endsection
