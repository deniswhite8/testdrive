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
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="editForm" role="form"
                          data-url="{{ url("admin/$model") }}"
                          data-model-id="{{ $id }}"
                          data-api-url="{{ url("api/$model") }}">
                        @foreach (config("admin.model.$model.form") as $field)
                            <div class="form-group">
                                @include("admin/form/{$field['type']}", $field)
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">
                            Save <span class="glyphicon glyphicon-ok"></span></button>
                        <button type="reset" class="btn btn-default">
                            Reset <span class="glyphicon glyphicon-remove"></span></button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection