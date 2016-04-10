@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ config("admin.menu.$model.label") }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{--<button type="button" class="btn btn-sm btn-primary navbar-btn js-new">New</button>--}}
            {{--<button type="button" class="btn btn-sm btn-default navbar-btn js-refresh">Refresh</button>--}}

            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover js-datatable datatable-actionable"
                       data-url="{{ url("api/{$model}") }}"
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