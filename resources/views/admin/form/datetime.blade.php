<label for="data_{{ $name }}" class="@if (isset($required) && $required) required @endif">{{ $label }}</label>

<div class="input-group">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
    </span>
    <input class="form-control @if (isset($required) && $required) required @endif js-datetime" name="{{ $name }}" id="data_{{ $name }}" />
    @if (isset($tip) && $tip)
        <p class="help-block">{{ $tip }}</p>
    @endif
</div>