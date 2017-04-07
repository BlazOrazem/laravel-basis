@php($inline = isset($inline))
@php($fieldId = camel_case($field) . '-' . str_random(10))

<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">

    @if(isset($label))
        <label for="{{ $fieldId }}" class="control-label{{ !$inline ? ' col-sm-3' : '' }}">
            {{ $label }}
        </label>
    @endif

    @if(!$inline)
        <div class="col-sm-9">
    @endif

        <textarea name="{{ $field }}"
               class="form-control{{ isset($class) ? ' ' . $class : '' }}"
               id="{{ $fieldId }}"
               placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
               rows="{{ isset($rows) ? $rows : '4' }}"
                >{{ old($field, (isset($entity) ? $entity->$field : '')) }}</textarea>

        <span class="help-block">
            {!! isset($help) ? $help . '</br>' : '' !!}
            {{ $errors->first($field, ':message') }}
        </span>

    @if(!$inline)
        </div>
    @endif

</div>