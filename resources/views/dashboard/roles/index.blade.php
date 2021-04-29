@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.roles'))
@section('page-heading', trans('app.roles'))

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">@lang('app.roles')</h4>
            @can('create-permissions')
                <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                    <div class="ag-btns d-flex flex-wrap">
                        <div class="btn-export">
                            <a class="btn btn-primary ag-grid-export-btn waves-effect waves-float waves-light" href="{{ route('admin.roles.create') }}">@lang('app.add_role')</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="permissionsTable">
                <thead>
                <tr>
                    <th class="min-width-100">@lang('app.display_name')</th>
                    <th class="min-width-100">@lang('app.name')</th>
                    <th class="min-width-150">@lang('app.users_with_this_role')</th>
                    <th class="text-center">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                @if ($roles->count() > 0)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->users->count() }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" type="button" class="btn btn-sm btn-info">@lang('app.edit_role')</a>
                                @if(!($roles->count() == 1))
                                    <button id="deleteButton" data-id="{{ $role->id }}" type="button" class="btn btn-sm btn-danger">@lang('app.delete_role') </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('page-script')
    @parent
    @include('dashboard.panels.delete-popup',['routeName'=>'admin.roles.destroy'])
@stop

