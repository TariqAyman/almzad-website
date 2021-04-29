@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.permissions'))
@section('page-heading', trans('app.permissions'))

@section('content')
    {!! Form::open(['route' => 'admin.permissions.save']) !!}
    <div class="card mb-5">
        <div class="card-header border-bottom">
            <h4 class="card-title">@lang('app.permissions')</h4>
            @can('create-permissions')
            <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                <div class="ag-btns d-flex flex-wrap">
                    <div class="btn-export">
                        <a class="btn btn-primary ag-grid-export-btn waves-effect waves-float waves-light" href="{{ route('admin.permissions.create') }}">@lang('app.add_permission')</a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="permissionsTable">
                <thead>
                <tr>
                    <th class="min-width-200">@lang('app.display_name')</th>
                    <th class="min-width-200">@lang('app.name')</th>
                    @foreach ($roles as $role)
                        <th class="text-center min-width-100">{{ $role->name }}</th>
                    @endforeach
                    <th class="min-width-200">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                @if ($permissions->count() > 0)
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{  $permission->name }}</td>
                            @foreach ($roles as $role)
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        {!!
                                            Form::checkbox(
                                                "roles[{$role->id}][]",
                                                $permission->id,
                                                $role->hasPermissionTo($permission->name),
                                                [
                                                    'class' => 'custom-control-input',
                                                    'id' => "cb-{$role->id}-{$permission->id}"
                                                ]
                                            )
                                        !!}
                                        <label class="custom-control-label d-inline" for="cb-{{ $role->id }}-{{ $permission->id }}"></label>
                                    </div>
                                </td>
                            @endforeach
                            <td class="text-center">
                                <a href="{{ route('admin.permissions.edit', $role->id) }}" type="button" class="btn btn-sm btn-info">@lang('app.edit_permission')</a>
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
    @if ($permissions->count() > 0)
        <div class="row">
            <div class="col-md-3 ml-auto">
                <button type="submit" class="btn btn-primary">
                    @lang('app.save_permissions')
                </button>
            </div>
        </div>
    @endif
    {!! Form::close() !!}
@endsection
