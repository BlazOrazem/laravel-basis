@extends('admin::layout')

@section('title')
    @lang('admin::permissions.title')
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class="data-table data-info content-box">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">@lang('admin::permissions.permissions')</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>
                <table class="display datatable middle-align datatable-striped table" data-order='[[ 2, "asc" ]]'>
                    <thead>
                    <tr>
                        <th>@lang('admin::tables.name')</th>
                        <th>@lang('admin::tables.label')</th>
                        <th>@lang('admin::tables.order')</th>
                        <th class="no-sort text-center">@lang('admin::tables.edit')</th>
                        <th class="no-sort text-center">@lang('admin::tables.delete')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->label }}</td>
                            <td class="text-right">
                                <span class="badge badge-info">
                                    {{ $item->sort_order }}
                                </span>
                            </td>
                            <td class="text-center">
                                @include ('admin::components.button.edit', [
                                    'action' => route('permissions.edit', compact('item'))
                                ])
                            </td>
                            <td class="text-center">
                                @include ('admin::components.button.delete', [
                                    'action' => route('permissions.destroy', compact('item'))
                                ])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="content-box">
                <div class="head success-bg clearfix">
                    <h5 class="content-title pull-left">@lang('admin::permissions.create')</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                        <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('permissions.store') }}" class="form-horizontal form-validate">
                        {{ csrf_field() }}
                        @include ('admin::components.form.text', [
                            'label' => trans('admin::forms.name'),
                            'field' => 'name',
                            'placeholder' => trans('admin::permissions.placeholder.name'),
                            'class' => 'snake-slug',
                        ])
                        @include ('admin::components.form.text', [
                            'label' => trans('admin::forms.label'),
                            'field' => 'label',
                            'placeholder' => trans('admin::permissions.placeholder.label'),
                        ])
                        @include ('admin::components.form.order', [
                            'sortOrder' => $permissions->max('sort_order') + 10,
                        ])
                        @include ('admin::components.form.checkbox', [
                            'label' => 'Is admin?',
                            'field' => 'is_admin',
                        ])
                        @include ('admin::components.form.submit', [
                            'button' => trans('admin::permissions.create'),
                        ])
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection