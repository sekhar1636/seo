@extends('common.layout')

@section('title', 'Theater Profile')

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
                                        <img src="{{isset($theater->theater->photo_url) ? ($theater->theater->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive pic-bordered" alt="" />

                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-7 profile-info">
                                        <h1 class="font-green sbold uppercase">{{$theater->name}}</h1>
                                        </p>
                                        <a href="mailto:{{$theater->email}}">{{$theater->email}} </a>
                                        </p>

                                        </p>

                                        <p>
                                            <b>Non Musical Performer? </b>
                                            {{ \App\Misc::$view_musical_performers[$theater->theater->non_musical_yes] }}
                                        </p>
                                        <p>
                                            <b>Casting Dancer? </b>
                                            {{\App\Misc::$view_casting_dancers[$theater->theater->dancer_yes]}}

                                        </p>



                                    </div>
                                    <!--end col-md-8-->

                                    <!--end col-md-4-->
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

                                                    <tr>
                                                        <td>
                                                            Let's Rock!
                                                        </td>
                                                        <td class="hidden-xs">  Band Girl </td>
                                                        <td> RWS & Associates @ Idlewild Park

                                                        </td>
                                                        <td>
                                                            Amy Cannon
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            American Beat
                                                        </td>
                                                        <td class="hidden-xs"> Band Girl</td>
                                                        <td> Soloist RWS & Associates @ Idlewild Park
                                                        </td>
                                                        <td>
                                                            Amy Cannon
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--tab-pane-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab_1_2-->


                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
@endsection