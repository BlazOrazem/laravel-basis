@extends('admin::layout')

@section('title')
    {{ trans('admin::plugins.title') }}
@stop

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class="data-table data-info content-box">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">{{ trans('admin::plugins.types') }}</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>
                <table class="display datatable middle-align datatable-striped table" data-order='[[ 2, "asc" ]]'>
                    <thead>
                    <tr>
                        <th>{{ trans('admin::tables.title') }}</th>
                        <th>{{ trans('admin::tables.description') }}</th>
                        <th>{{ trans('admin::tables.action') }}</th>
                        <th>{{ trans('admin::tables.order') }}</th>
                        @if ($admin->can('edit_plugins'))
                            <th class="no-sort text-center">{{ trans('admin::tables.edit') }}</th>
                        @endif
                        @if ($admin->can('delete_plugins'))
                            <th class="no-sort text-center">{{ trans('admin::tables.delete') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($plugins as $plugin)
                        <tr>
                            <td>{{ $plugin->title }}</td>
                            <td>{{ $plugin->description }}</td>
                            <td>{{ $plugin->action }}</td>
                            <td class="text-right">
                                <span class="badge badge-info">
                                    {{ $plugin->sort_order }}
                                </span>
                            </td>
                            @if ($admin->can('edit_plugins'))
                                <td class="text-center">
                                    @include ('admin::components.button.edit', [
                                        'action' => route('plugins.edit', compact('plugin')),
                                    ])
                                </td>
                            @endif
                            @if ($admin->can('delete_plugins'))
                                <td class="text-center">
                                    @include ('admin::components.button.delete', [
                                        'action' => route('plugins.destroy', compact('plugin'))
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
                <div class="head success-bg clearfix">
                    <h5 class="content-title pull-left">{{ trans('admin::plugins.create') }}</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                        <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('plugins.store') }}" class="form-horizontal form-validate">
                        {{ csrf_field() }}
                        @include ('admin::components.form.text', [
                            'label' => trans('admin::forms.title'),
                            'field' => 'title',
                            'placeholder' => trans('admin::plugins.placeholder.title'),
                        ])
                        @include ('admin::components.form.text', [
                            'label' => trans('admin::forms.description'),
                            'field' => 'description',
                            'placeholder' => trans('admin::plugins.placeholder.description'),
                        ])
                        @include ('admin::components.form.text', [
                            'label' => trans('admin::forms.action'),
                            'field' => 'action',
                            'placeholder' => trans('admin::plugins.placeholder.action'),
                        ])
                        @include ('admin::components.form.order', [
                            'sortOrder' => $plugins->pluck('sort_order')->last() + 10,
                        ])
                        @include ('admin::components.form.checkbox', [
                            'label' => 'Is hidden?',
                            'field' => 'is_hidden',
                            'type' => 'success',
                        ])
                        @include ('admin::components.form.submit', [
                            'button' => trans('admin::plugins.create'),
                        ])
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop