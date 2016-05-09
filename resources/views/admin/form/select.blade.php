<label for="data_{{ $name }}" class="@if (isset($required) && $required) required @endif">{{ $label }}</label>
<select name="{{ $name }}" id="data_{{ $name }}"
        @if (isset($parent) && $parent) data-parent="data_{{ $parent }}" data-url="{{ url("api/$model/query") }}"
            data-option="{{ $option }}" @endif
        class="@if (isset($required) && $required) required @endif form-control js-select">
    <option value="">&nbsp;</option>
    @if (!isset($parent) || !$parent)
        @foreach ($model::lists($option, 'id') as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    @endif
</select>
@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif