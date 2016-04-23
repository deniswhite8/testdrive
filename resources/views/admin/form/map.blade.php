<label class="@if (isset($required) && $required) required @endif">{{ $label }}</label>
<input type="text" name="{{ $name[0] }}" class="@if (isset($required) && $required) required @endif hidden-input js-latitude">
<input type="hidden" name="{{ $name[1] }}" class="js-longitude">
<div class="js-map" style="width: 600px; height: 400px"></div>
@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif