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
                            <div class="col-md-6">
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
                                            <a href="#tab_1_11" data-toggle="tab"> Job Listings</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="row">
                                                <div class="col-md-4">
                                                   {{ @$theater->theater->accompanist == 1 ? 'Accompanist' : '' }}<br>
                                                   {{ @$theater->theater->administration == 2 ? 'Administration' : '' }}<br>
                                                   {{ @$theater->theater->box_office == 3 ? 'Box Office' : ''}}<br>
                                                   {{ @$theater->theater->carpentry == 4 ? 'Carpentry' : '' }}<br>
                                                   {{ @$theater->theater->choreographer == 5 ? 'Choreographer' : ''}}<br>
                                                   {{ @$theater->theater->costume_design == 6 ? 'Costume Design' : ''}}<br>
                                                   {{ @$theater->theater->director == 7 ? 'Director' : '' }}<br>
                                                   {{ @$theater->theater->electrics == 8 ? 'Electrics' : '' }}<br>
                                                   {{ @$theater->theater->graphics == 9 ? 'Graphics' : '' }}<br>
                                                   {{ @$theater->theater->house == 10 ? 'House' : '' }}<br>
                                                   {{ @$theater->theater->light_ops == 11 ? 'Light Ops' : '' }}<br>
                                                   {{ @$theater->theater->makeup_wig_design == 12 ? 'Make UP and Wig Design' : '' }}<br>
                                                   {{ @$theater->theater->music_director == 13 ? 'Music Director' : '' }}<br>
                                               </div>
                                               <div class="col-md-4">
                                                   {{ @$theater->theater->paint_charge == 14 ? 'Paint Charge' : '' }}<br>
                                                   {{ @$theater->theater->photography == 15 ? 'Photography' : '' }}<br>
                                                   {{ @$theater->theater->pit_musician == 16 ? 'Pit Musician' : '' }}<br>
                                                   {{ @$theater->theater->properties == 17 ? 'Properties' : '' }}<br>
                                                   {{ @$theater->theater->publicity == 18 ? 'Publicity' : '' }}<br>
                                                   {{ @$theater->theater->running_crew == 19 ? 'Running Crew' : '' }}<br>
                                                   {{ @$theater->theater->scenic_artist == 20 ? 'Scenic Artist' : '' }}<br>
                                                   {{ @$theater->theater->set_design == 21 ? 'Set Design' : '' }}<br>
                                                   {{ @$theater->theater->sewing_wardrobe == 22 ? 'Sewing Wardrobe' : '' }}<br>
                                                   {{ @$theater->theater->sound == 23 ? 'Sound' : '' }}<br>
                                                   {{ @$theater->theater->state_management == 24 ? 'State Management' : '' }}<br>
                                                   {{ @$theater->theater->technical_direction == 25 ? 'Technical Direction' : '' }}<br>
                                                   {{ @$theater->theater->video == 26 ? 'Video' : '' }}<br>
                                               </div>
                                           </div>
                                       </div>
                                       <!--tab-pane-->

                                   </div>
                               </div>
                           </div>
                       <div class="col-md-3">
                           <div class="portlet sale-summary">
                           <div class="portlet-title">
                               <div class="caption font-red sbold"> Personal Info </div>



                           </div>

                           <div class="portlet-body">
                               <ul class="list-unstyled">
                                   <li>
                                                   <span class="sale-info">Fax
                                                       <i class="fa fa-img-up"></i>
                                                   </span>
                                       <span class="sale-num">
                                                               <a href="#">{{ $theater->theater->fax }}</a>
                                                            </span>
                                    </li>
                                    <li>
                                        <span class="sale-info">Website</span>
                                        <span class="sale-num"><a href="http://{{ $theater->theater->website }}" target="_blank">{{ $theater->name }}'s Website</a> </span>
                                    </li>
                                </ul>
                            </div>
                                <div class="portlet-title">
                                    <div class="caption font-red sbold"> Contact Info </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-unstyled">
                                        <li>
                                                    <span class="sale-info">Contact Number
                                                        <i class="fa fa-img-up"></i>
                                                    </span>
                                            <span class="sale-num">
                                                                <a href="tel:{{ $theater->theater->contact_number }}">{{ $theater->theater->contact_number }}</a>
                                                            </span>
                                        </li>
                                        <li>
                                            <span class="sale-info">Telephone</span>
                                            <span class="sale-num"><a href="tel:{{ $theater->theater->telephone }}">{{ $theater->theater->telephone }}</a> </span>
                                        </li>
                                    </ul>
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