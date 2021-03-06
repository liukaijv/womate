@extends('backend.layouts.main')
@section('title')
    招聘管理
@endsection
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：招聘管理</strong>
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
                                    <h3>招聘新增</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open(['method'=>'POST','url'=>route('recruit.store'),'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}

                        @include('backend.recruits.form')

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection