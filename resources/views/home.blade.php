@extends('layouts.app')

@section('content')
    <style>
        /*TESTE*/
        body{
            background: #f1f1f1;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon tar"><i class="fa fa-drivers-license-o"></i></span>
                <div class="mini-stat-info">
                    <span>0</span>
                    Solicitações em aberto
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <div class="user-heading alt wdgt-row terques-bg">
                        <i class="fa fa-drivers-license-o"></i>
                    </div>

                    <div class="panel-body">
                        <div class="wdgt-value">
                            <h1 class="count">0</h1>
                            <p>Solicitações em Aberto</p>
                        </div>
                    </div>

                </section>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js_files')
        
@endsection