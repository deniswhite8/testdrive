<label for="data_{{ $name }}" class="@if (isset($required) && $required) required @endif">{{ $label }}</label>
<select name="{{ $name }}" id="data_{{ $name }}" class="@if (isset($required) && $required) required @endif form-control js-select">
    <option value="">&nbsp;</option>
    @foreach($model::lists($option, 'id') as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif