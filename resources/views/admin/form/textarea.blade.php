<label for="data_{{ $name }}">{{ $label }}</label>
<textarea class="form-control" name="{{ $name }}" id="data_{{ $name }}" rows="3"></textarea>
@if ($tip)
    <p class="help-block">{{ $tip }}</p>
@endif