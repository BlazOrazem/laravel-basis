@extends('admin::layout')

@section('title')
    @lang('admin::dictionary.title')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="content-box">
                <div class="head base-bg clearfix">
                    <h5 class="content-title pull-left">@lang('admin::dictionary.title')</h5>
                    <div class="functions-btns pull-right">
                        <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                        <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                    </div>
                </div>

                <div class="content">
                    <div class="m-b-20">
                        <ul class="nav nav-tabs">
                            @foreach($tree as $locale => $localeGroups)
                                <li @if ($loop->first) class="active" @endif>
                                    <a href="#dictionary-{{ $locale }}" data-toggle="tab">
                                        {{ $locale }}
                                    </a>
                                </li>
                            @endforeach
                            <li><a href="#dictionary-add" data-toggle="tab">@lang('admin::dictionary.add')</a></li>
                        </ul>
                        <div class="tab-content">
                            @foreach($tree as $locale => $localeGroups)
                            <div class="tab-pane fade @if ($loop->first) in active @endif" id="dictionary-{{ $locale }}">
                                <div class="panel-group">
                                    <div class="controls m-b-10">
                                        <button class="btn btn-info open-all-panels" type="button">
                                            @lang('admin::forms.open_all')
                                        </button>
                                        <button class="btn btn-info close-all-panels" type="button">
                                            @lang('admin::forms.close_all')
                                        </button>
                                    </div>
                                    @foreach($localeGroups as $title => $group)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse-{{ $locale }}-{{ $loop->iteration }}">{{ $title }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapse-{{ $locale }}-{{ $loop->iteration }}" class="panel-collapse collapse">
                                            <table class="table panel-table middle-align">
                                                @foreach($group as $dictionary)
                                                <tr>
                                                    <td class="f-12" width="20%">{{ $dictionary->key }}</td>
                                                    <td>
                                                        <a href="#"
                                                           class="editable"
                                                           data-pk="{{ $dictionary->id }}"
                                                           data-url="{{ route('dictionary.update') }}"
                                                           data-title="{{ $dictionary->key }}"
                                                            >{!! $dictionary->value !!}</a>
                                                    </td>
                                                    <td class="text-right" width="50">
                                                        @include('admin::components.button.delete', [
                                                            'action' => route('dictionary.destroy', compact('dictionary')),
                                                            'noAjax' => true
                                                        ])
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            <div class="tab-pane fade" id="dictionary-add">
                                <form method="POST" action="{{ route('dictionary.store') }}" class="form-horizontal form-validate">
                                    {{ csrf_field() }}
                                    @include('admin::components.form.select', [
                                        'label' => trans('admin::dictionary.group'),
                                        'field' => 'group',
                                        'params' => ['code', 'title'],
                                        'data' => $groups,
                                        'required' => true,
                                    ])
                                    @include('admin::components.form.text', [
                                        'label' => trans('admin::forms.key'),
                                        'field' => 'key',
                                        'placeholder' => trans('admin::dictionary.placeholder.key'),
                                        'class' => 'snake-slug',
                                        'required' => true,
                                    ])
                                    @foreach(config('app.locales') as $locale)
                                        @include('admin::components.form.text', [
                                            'label' => strtoupper($locale) . ' ' . strtolower(trans('admin::forms.value')),
                                            'field' => 'value_' . $locale,
                                            'placeholder' => trans('admin::dictionary.placeholder.value', ['lang' => strtoupper($locale)]),
                                        ])
                                    @endforeach
                                    @include('admin::components.form.submit', [
                                        'button' => trans('admin::dictionary.create')
                                    ])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.fn.editable.defaults.mode = 'inline';

            $.fn.editable.defaults.params = function (params)
            {
                params._token = $('meta[name="_token"]').attr('content');
                return params;
            };

            $('.editable').editable({
                showbuttons: 'right',
                placement: 'top',
                onblur: 'ignore',
                type: 'wysihtml5',
                send:'always',
                wysihtml5: {
                    toolbar: {
                        "font-styles": true, // Font styling, e.g. h1, h2, etc. Default true
                        "emphasis": true,    // Italics, bold, etc. Default true
                        "lists": true,       // (Un)ordered lists, e.g. Bullets, Numbers. Default true
                        "link": true,        // Button to insert a link. Default true
                        "html": true,        // Button which allows you to edit the generated HTML. Default false
                        "image": false,      // Button to insert an image. Default true,
                        "color": false       // Button to change color of font
                    }
                },
                ajaxOptions: {
                    dataType: 'json',
                    type: 'patch'
                }
            });
        });
    </script>
@endsection