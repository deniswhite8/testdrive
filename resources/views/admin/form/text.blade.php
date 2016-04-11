<label for="data_{{ $name }}">{{ $label }}</label>
<input class="form-control" name="{{ $name }}" id="data_{{ $name }}" />
@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif