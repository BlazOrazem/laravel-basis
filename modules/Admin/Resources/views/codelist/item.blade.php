@extends('admin::layout')

@section('title')
    Codelist
@stop

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class="data-info" data-id="codelist-items">
                <table data-title="{{ $codelistGroup->title }} items" class="display datatable middle-align datatable-striped table" data-order='[[ 2, "asc" ]]'>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Code</th>
                        <th class="text-right">Order</th>
                        @if ($admin->can('edit_managers'))
                            <th class="no-sort text-center">Edit</th>
                        @endif
                        @if ($admin->can('delete_managers'))
                            <th class="no-sort text-center">Delete</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($codelistGroup->items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->code }}</td>
                            <td class="text-right">{{ $item->sort_order }}</td>
                            @if ($admin->can('edit_managers'))
                                <td class="text-center">
                                    @include ('admin::components.edit', [
                                        'action' => route('codelist.item.edit', compact('item'))
                                    ])
                                </td>
                            @endif
                            @if ($admin->can('delete_managers'))
                                <td class="text-center">
                                    @include ('admin::components.delete', [
                                        'action' => route('codelist.item.destroy', compact('item'))
                                    ])
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="content-box">
                <div class="head warning-bg clearfix">
                    <h5 class="content-title pull-left">Edit {{ $codelistItem->title }}</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                        <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('codelist.item.update', [$codelistItem]) }}" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="itemUpdateTitle" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" value="{{ old('title', $codelistItem->title) }}" class="form-control" id="itemUpdateTitle" placeholder="Enter title" required>
                                <p class="help-block">{{ $errors->first('title', ':message') }}</p>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="itemUpdateCode" class="col-sm-2 control-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" value="{{ old('code', $codelistItem->code) }}" class="form-control" id="itemUpdateCode" placeholder="Enter code" required>
                                <p class="help-block">{{ $errors->first('code', ':message') }}</p>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sort_order') ? ' has-error' : '' }}">
                            <label for="itemUpdateOrder" class="col-sm-2 control-label">Order</label>
                            <div class="col-sm-10">
                                <input type="text" name="sort_order" value="{{ old('sort_order', $codelistItem->sort_order) }}" class="form-control" id="itemUpdateOrder" placeholder="Set order" required>
                                <p class="help-block">{{ $errors->first('sort_order', ':message') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-info">{{ trans('admin::messages.codelist.item_update') }}</button>
                                    <a class="btn btn-default btn-link pull-right" href="{{ route('codelist.edit', $codelistGroup) }}">{{ trans('admin::messages.codelist.index_group') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop