@extends('admin::layout')

@section('title')
    Roles and permissions
@stop

@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="content-box">
                <div class="head success-bg clearfix">
                    <h5 class="content-title pull-left">Create a new Role</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('roles.create') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->roleErrors->has('name') ? ' has-error' : '' }}">
                                    <label for="roleNewName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="roleNewName" placeholder="Enter role name">
                                        <span class="help-block">{{ $errors->roleErrors->first('name', ':message') }}</span>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->roleErrors->has('label') ? ' has-error' : '' }}">
                                    <label for="roleNewLabel" class="col-sm-2 control-label">Label</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="label" value="{{ old('label') }}" class="form-control" id="roleNewLabel" placeholder="Enter role label">
                                        <span class="help-block">{{ $errors->roleErrors->first('label', ':message') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->roleErrors->has('sort_order') ? ' has-error' : '' }}">
                                    <label for="itemNewOrder" class="col-sm-2 control-label">Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sort_order" value="{{ old('sort_order', $roles->pluck('sort_order')->last() + 10) }}" class="form-control" id="itemNewOrder" placeholder="Set order">
                                        <p class="help-block">{{ $errors->roleErrors->first('sort_order', ':message') }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-md btn-success">{{ trans('admin::messages.roles.create') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="data-table data-success content-box" data-id="roles">
                <div class="head success-bg clearfix">
                    <h5 class="content-title pull-left">Roles</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>
                <table class="display datatable middle-align datatable-striped table" data-order='[[ 2, "asc" ]]'>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Label</th>
                        <th class="text-right">Order</th>
                        <th>Is admin?</th>
                        @if ($admin->can('edit_managers'))
                            <th class="no-sort text-center">Edit</th>
                        @endif
                        @if ($admin->can('delete_managers'))
                            <th class="no-sort text-center">Delete</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->label }}</td>
                            <td class="text-right">{{ $item->sort_order }}</td>
                            <td>{{ $item->is_admin }}</td>
                            @if ($admin->can('edit_managers'))
                                <td class="text-center">
                                    @include ('admin::components.edit', [
                                        'action' => route('roles.edit', compact('item'))
                                    ])
                                </td>
                            @endif
                            @if ($admin->can('delete_managers'))
                                <td class="text-center">
                                    @if ($item->isDeletable())
                                        @include ('admin::components.delete', [
                                            'action' => route('roles.destroy', compact('item'))
                                        ])
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@stop