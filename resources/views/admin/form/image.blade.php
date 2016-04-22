<label for="data_{{ $name }}" class="@if (isset($required) && $required) required @endif">{{ $label }}</label>

<div class="input-group">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
        <a href="" target="_blank">
            <img data-base-url="{{ url('media') }}" src="" alt="" style="display: none">
        </a>
    </span>
    <input type="file" class="js-image-input form-control @if (isset($required) && $required) required @endif" name="{{ $name }}" id="data_{{ $name }}" />
    @if (isset($tip) && $tip)
        <p class="help-block">{{ $tip }}</p>
    @endif
</div>

@if (!isset($required) || !$required)
    <div class="checkbox">
        <label><input type="checkbox" class="js-file-reset" name="{{ $name }}" value="">Remove</label>
    </div>
@endif