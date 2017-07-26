@extends('common.layout')

@section('title', 'Actor Profile')

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
                                    <img src="{{isset($actor->actor->photo_url) ? $actor->actor->photo_url : asset('images/photos/default-medium.jpg')}}" class="img-responsive pic-bordered" alt="" />
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-7 profile-info">
                                    <h1 class="font-green sbold uppercase">{{$actor->actor->first_name}} {{$actor->actor->last_name}}</h1>
                                    </p>
                                        <a href="mailto:{{$actor->email}}">{{$actor->email}} </a>
                                    </p>
                                    </p>
                                        <b>Age : </b>
                                        <span class="label label-success label-sm"> {{$actor->actor->age}} </span>
                                      
                                    </p>

                                     </p>
                                        <b>Eyes : </b>
                                        {{$actor->actor->eyes}} 
                                        <b>Hair : </b>
                                        {{$actor->actor->hair}} 
                                      
                                    </p>
                                   
                                    </p>
                                        <b>Height : </b>
                                        {{$actor->actor->feet}}'{{$actor->actor->feet}}"
                                        <b>Weight : </b>
                                        {{$actor->actor->weight}} lbs
                                      
                                    </p>
                                    </p>
                                        <b>Role Type : </b>
                                        {{$actor->actor->ethnicity}} 
                                        <b>Vocal Range : </b>
                                        {{$actor->actor->vocalRange}} 
                                    </p>
                                     
                                     </p>
                                        <b>Dance : </b>
                                        {{$actor->actor->dance}} 

                                        <b>Instruments : </b>
                                        {{$actor->actor->instrument}} 
                                    </p>
                                
                                     </p>
                                        <b>Technical Skills : </b>
                                        {{$actor->actor->technical}} 
                                          <b>Other Skills :  </b>
                                        {{$actor->actor->misc}} 
                                    </p>
                                
                                    </p>
                                        <b>School : </b>
                                        <span class="label label-success label-sm"> {{$actor->actor->school}} </span>
                                      
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
                                                    <span class="sale-info"> Applied For
                                                        <i class="fa fa-img-up"></i>
                                                    </span>
                                                    <span class="sale-num"> {{$actor->actor->auditionType}} </span>
                                                </li>
                                                <li>
                                                    <span class="sale-info">Will Consider
                                                        <i class="fa fa-img-down"></i>
                                                    </span>
                                                    <span class="sale-num"> {{$actor->actor->jobType}} </span>
                                                </li>
                                                <li>
                                                    <span class="sale-info"> Availibity</span>
                                                    <span class="sale-num"> {{$actor->actor->from}} to {{$actor->actor->to}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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