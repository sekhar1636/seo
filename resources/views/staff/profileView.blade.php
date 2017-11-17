@extends('common.layout')

@section('title', 'Staff Profile')

@section('style')
    <link href="{{asset('assets/pages/css/profile-2.min.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .portlet {
            box-shadow: 0 2px 3px 2px rgba(0, 0, 0, 0);
        }
    </style>
@endsection

@section('js')

@endsection
@section('content')
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="page-content-inner">
        <div class="profile">
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Profile </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1_1">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-unstyled profile-nav">
                                    <li>
                                        <img src="{{isset($staff->staff->photo_url) ? ($staff->staff->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive pic-bordered" alt="" />

                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-7 profile-info">
                                        <h1 class="font-green sbold uppercase">{{$staff->name}}</h1>
                                        </p>
                                        <a href="mailto:{{$staff->email}}">{{$staff->email}} </a>
                                        </p>

                                        </p>

                                        <p>
                                        <b>Primary Sought : </b>
                                        {{ \App\Misc::$primary_sought[$staff->staff->primary_sought] }}
                                        </p>
                                        <p>
                                        <b>Secondary Sought : </b>
                                        {{\App\Misc::$secondary_sought[$staff->staff->secondary_sought]}}

                                        </p>



                                    </div>
                                    <!--end col-md-8-->
                                    <div class="col-md-5">
                                        <div class="portlet sale-summary">
                                            <div class="portlet-title">
                                                <div class="caption font-red sbold"> Job Info </div>
                                                <div class="tools">
                                                    <a class="reload" href="javascript:;"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <ul class="list-unstyled">

                                                    <li>
                                                        <span class="sale-info"> Availability</span>
                                                        <span class="sale-num"> {{$staff->staff->from}} to {{$staff->staff->to}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-md-4-->
                                </div>
                                <div class="row">
                                    <div class="col-md-7 profile-info">
                                        <h1 class="font-green sbold uppercase">Resume</h1>
                                        <p><a href="{{ URL::to('/') }}/files/{{$staff->resume_path}}">{{ $staff->name }}'s Resume</a></p>
                                        <p><a href="tel:{{ $staff->phone_number }}">{{$staff->phone_number}}</a></p>
                                    </div>
                                </div>
                                <!--end row-->

                                <div class="tabbable-line tabbable-custom-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_11" data-toggle="tab"> Latest Experience </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-briefcase"></i> Role </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-question"></i> Show </th>
                                                        <th>
                                                            <i class="fa fa-home"></i> Theater </th>
                                                        <th>
                                                            <i class="fa fa-user"></i> Dir/Choreo/Other </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($roles as $val)
                                                        <tr>
                                                            <td>
                                                                {{ $val['roles_chosen'] }}
                                                            </td>
                                                            <td class="hidden-xs">  {{ $val['show'] }} </td>
                                                            <td> {{ $val['theater'] }}

                                                            </td>
                                                            <td>
                                                                {{ $val['dir_chor'] }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--tab-pane-->

                                    </div>
                                    <div class="col-md-7">
                                        <label><h2>PORTFOLIO</h2></label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="body">
                                            @if(@$staff->staff->portfolio != "")
                                            {!! $staff->staff->portfolio !!}
                                            @else
                                                <h3 style="color:red">{{ "Coming Soon!" }}</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!--tab-pane-->

                    </div>

                    <!--tab_1_2-->


                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
@endsection