@extends('backend.layouts.main')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：广告管理</strong>
                </li>
                <li>
                    广告位管理
                </li>
            </ol>
        </div>
    </div>

    <div class=" wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="ibox-title-info">
                                    <h3>广告位修改</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open(['method'=>'PATCH','url'=>route('ad_position.update',[$ad_position]),'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}

                        @include('backend.ad_positions.form')

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
