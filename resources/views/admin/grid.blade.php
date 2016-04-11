@extends('admin.layout')
@section('title', config("admin.model.$model.title"))
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ config("admin.model.$model.title") }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover js-datatable datatable-actionable"
                       data-url="{{ url("admin/{$model}") }}"
                       data-api-url="{{ url("api/{$model}") }}"
                       data-fields="{{ json_encode(config("admin.model.$model.grid")) }}"
                        >
                    <thead>
                        <tr>
                            @foreach (config("admin.model.$model.grid") as $label)
                                <th>{{ $label }}</th>
                            @endforeach
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection