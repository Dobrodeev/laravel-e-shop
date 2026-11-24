@php($type ??= 'text')
@php($required ??= true)
<div class="input_custom {{ $class ?? '' }}">
	<span>{{ $label }}@if ($required)<b>*</b>@endif</span>
	<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" placeholder="{{ $placeholder ?? '' }}"
		@required($required) @class(['is-invalid' => $errors->has($name)])>
	@error($name)<small class="field-error">{{ $message }}</small>@enderror
</div>
