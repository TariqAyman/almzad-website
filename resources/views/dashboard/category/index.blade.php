@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.category'))
@section('page-heading', trans('app.category'))

@push('pg_btn')
    @can('create-category')
        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-neutral">Create New Category</a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('app.category')</h4>
                    <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                        <div class="ag-btns d-flex flex-wrap">
                            <div class="btn-export">
                                <a class="btn btn-primary ag-grid-export-btn waves-effect waves-float waves-light" href="{{ route('admin.category.create') }}">@lang('app.create_new')</a>
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
                                <th>@lang('app.status')</th>
                                <th>@lang('app.Updated at')</th>
                                <th>@lang('app.Created at')</th>
                                <th>@lang('app.Action')</th>
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
                ajax: '{!! route('admin.category.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'category_name', name: 'category_name'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'updated_at', name: 'updated_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('dashboard.panels.delete-popup',['routeName'=>'admin.category.destroy'])
@endsection
