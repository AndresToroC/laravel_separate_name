<div class="form-group">
    {{ Form::label($name, trans('validation.attributes.'.$name), ['class' => 'control-label']) }}
    {{ Form::file($name, array_merge(['class' => 'form-control-file'], $attributes)) }}
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>