@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-square-o fa-fw fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ \App\Models\Order::count() }}</div>
                            <div>Orders</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/order') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Show More</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-map-marker fa-fw fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ \App\Models\Salon::count() }}</div>
                            <div>Salons</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/salon') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Show More</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-car fa-fw fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ App\Models\Auto::count() }}</div>
                            <div>Autos</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/auto') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Show More</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building fa-fw fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ \App\Models\Dealer::count() }}</div>
                            <div>Dealers</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/dealer') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Show More</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection