<label for="data_{{ $name }}" class="@if (isset($required) && $required) required @endif">{{ $label }}</label>
<textarea class="form-control @if (isset($required) && $required) required @endif @if(isset($validation)) {{ $validation }} @endif"
          name="{{ $name }}" id="data_{{ $name }}" rows="3"></textarea>
@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif