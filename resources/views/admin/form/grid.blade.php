<label for="data_{{ $name }}">{{ $label }}</label>

<input type="hidden" id="data_{{$name}}" name="{{ $name }}">
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover js-datatable"
           data-api-url="{{ url("api/{$model}") }}"
           data-fields="{{ json_encode(config("admin.model.$model.grid")) }}"
           data-only-view="true"
           data-input="data_{{$name}}"
            >
        <thead>
            <tr>
                @foreach (config("admin.model.$model.grid") as $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
    </table>
</div>

@if (isset($tip) && $tip)
    <p class="help-block">{{ $tip }}</p>
@endif