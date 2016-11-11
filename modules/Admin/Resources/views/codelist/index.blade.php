@extends('admin::layout')

@section('title')
    Codelist
@stop

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class="data-table data-info content-box" data-id="codelist-groups">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">Codelist groups</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>
                <table class="display datatable middle-align datatable-striped table" data-order='[[ 1, "asc" ]]'>
                    <thead>
                    <tr>
                        <th>{{ trans('admin::tables.title') }}</th>
                        <th>{{ trans('admin::tables.order') }}</th>
                        @if ($admin->can('edit_managers'))
                            <th class="no-sort text-center">{{ trans('admin::tables.manage') }}</th>
                        @endif
                        @if ($admin->can('delete_managers'))
                            <th class="no-sort text-center">{{ trans('admin::tables.delete') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($codelistGroups as $group)
                        <tr>
                            <td>{{ $group->title }}</td>
                            <td class="text-right">{{ $group->sort_order }}</td>
                            @if ($admin->can('edit_managers'))
                                <td class="text-center">
                                    @include ('admin::components.button.edit', [
                                        'action' => route('codelist.edit', compact('group')),
                                        'icon' => 'zmdi-collection-text'
                                    ])
                                </td>
                            @endif
                            @if ($admin->can('delete_managers'))
                                <td class="text-center">
                                    @if (!$group->items->count())
                                        @include ('admin::components.button.delete', [
                                            'action' => route('codelist.destroy', compact('group'))
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

        <div class="col-lg-6">
            <div class="content-box">
                <div class="head success-bg clearfix">
                    <h5 class="content-title pull-left">Create new codelist group</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                        <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('codelist.store') }}" class="form-horizontal form-validate">
                        {{ csrf_field() }}
                        @include ('admin::components.form.text', [
                            'label' => 'Title',
                            'field' => 'title',
                            'placeholder' => 'Enter group title',
                        ])
                        @include ('admin::components.form.order', [
                            'errors' => $errors->roleErrors,
                            'next' => $codelistGroups->pluck('sort_order')->last() + 10
                        ])
                        @include ('admin::components.form.submit', [
                            'button' => trans('admin::messages.codelist.group_create'),
                        ])
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop