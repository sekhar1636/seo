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
                                        <img src="{{ $theater->theater->photo_url ? asset($theater->theater->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive pic-bordered" alt="" />
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 profile-info">
                                        <h1 class="font-green sbold uppercase">{{$theater->name}}</h1>
                                        <p>{{ $theater->theater->company_description  ? $theater->theater->company_description : "Not Given" }}</p>

                                        <p>
                                            <a href="mailto:{{$theater->theater->email_videos ? $theater->theater->email_videos : $theater->email}}">{{$theater->theater->email_videos ? $theater->theater->email_videos : $theater->email}}</a>
                                        </p>

                                        <p>
                                            <b>Are you casting non-musical performers? </b>
                                            {{\App\Misc::$view_musical_performers[$theater->theater->non_musical_yes ? $theater->theater->non_musical_yes : ""] }}

                                        </p>
                                        <p>
                                            <b>Are You Casting Dancers this Season?</b>
                                            {{\App\Misc::$view_casting_dancers[$theater->theater->dancers_yes ? $theater->theater->dancers_yes : ""]}}
                                        </p>

                                        <p>
                                            <b>Days Plan to attend:</b>
                                            @if($theater->theater->friday || $theater->theater->saturday || $theater->theater->sunday)
                                            {{ $theater->theater->friday == 1 ? 'Friday ' : ''}}
                                            {{ $theater->theater->saturday == 1 ? 'Saturday ' : ''}}
                                            {{ $theater->theater->sunday == 1 ? 'Sunday' : '' }}
                                                @else
                                                <span>Not Selected!</span>
                                                @endif
                                        </p>

                                        <p>
                                            <b>Accept video Auditions?</b>
                                            @if($theater->theater->dancers_no)
                                            {{ $theater->theater->dancers_no == 1 ? 'Yes' : ''}}
                                            {{ $theater->theater->dancers_no==2 ? 'No' : ''  }}
                                                @else
                                                <span>Not Selected yet</span>
                                                @endif
                                        </p>

                                        <p>
                                            <b>On AEA Contract?</b>
                                            @if($theater->theater->non_musical_no)
                                            {{ $theater->theater->non_musical_no == 1 ? 'Yes' : ''}}
                                            {{ $theater->theater->non_musical_no==2 ? 'No' : ''   }}
                                            @else
                                                <span>Not Selected yet</span>
                                            @endif
                                        </p>

                                        <p>
                                            <b>Offering EMC Points?</b>
                                            @if($theater->theater->non_musical_not_certain)
                                            {{ $theater->theater->non_musical_not_certain == 1 ? 'Yes' : '' }}
                                            {{ $theater->theater->non_musical_not_certain == 2 ? 'No' : '' }}@else
                                                <span>Not Selected yet</span>
                                            @endif
                                        </p>

                                        <p>
                                            <b>AEA Contract</b>
                                            {{ \App\Misc::$aea[$theater->theater->aea_contract ? $theater->theater->aea_contract : 'None'] }}
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
                                        <li>
                                            <a href="#tab_1_12" data-toggle="tab">Representatives</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="row">
                                                <div class="col-md-4">
                                                   <div class="row">{{ $theater->theater->accompanist ? ($theater->theater->accompanist == 1 ? 'Accompanist' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->administration ? ($theater->theater->administration == 2 ? 'Administration' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->box_office ? ($theater->theater->box_office == 3 ? 'Box Office' : '') : ""}}</div>
                                                   <div class="row">{{ $theater->theater->carpentry ? ($theater->theater->carpentry == 4 ? 'Carpentry' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->choreographer ? ($theater->theater->choreographer == 5 ? 'Choreographer' : '') : ""}}</div>
                                                   <div class="row">{{ $theater->theater->costume_design ? ($theater->theater->costume_design == 6 ? 'Costume Design' : '') : ""}}</div>
                                                   <div class="row">{{ $theater->theater->director ? ($theater->theater->director == 7 ? 'Director' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->electrics ? ($theater->theater->electrics == 8 ? 'Electrics' : '' ) : ""}}</div>
                                                   <div class="row">{{ $theater->theater->graphics ? ($theater->theater->graphics == 9 ? 'Graphics' : '' ) : ""}}</div>
                                                   <div class="row">{{ $theater->theater->house ? ($theater->theater->house == 10 ? 'House' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->light_ops ? ($theater->theater->light_ops == 11 ? 'Light Ops' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->makeup_wig_design ? ($theater->theater->makeup_wig_design == 12 ? 'Make UP and Wig Design' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->music_director ? ($theater->theater->music_director == 13 ? 'Music Director' : '') : "" }}</div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="row">{{ $theater->theater->paint_charge ? ($theater->theater->paint_charge == 14 ? 'Paint Charge' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->photography ? ($theater->theater->photography == 15 ? 'Photography' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->pit_musician ? ($theater->theater->pit_musician == 16 ? 'Pit Musician' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->properties ? ($theater->theater->properties == 17 ? 'Properties' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->publicity ? ($theater->theater->publicity == 18 ? 'Publicity' : '' ) : ""}}</div>
                                                   <div class="row">{{ $theater->theater->running_crew ? ($theater->theater->running_crew == 19 ? 'Running Crew' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->scenic_artist ? ($theater->theater->scenic_artist == 20 ? 'Scenic Artist' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->set_design ? ($theater->theater->set_design == 21 ? 'Set Design' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->sewing_wardrobe ? ($theater->theater->sewing_wardrobe == 22 ? 'Sewing Wardrobe' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->sound ? ($theater->theater->sound == 23 ? 'Sound' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->state_management ? ($theater->theater->state_management == 24 ? 'State Management' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->technical_direction ? ($theater->theater->technical_direction == 25 ? 'Technical Direction' : '') : "" }}</div>
                                                   <div class="row">{{ $theater->theater->video ? ($theater->theater->video == 26 ? 'Video' : '') : "" }}</div>
                                               </div>
                                           </div>
                                       </div>
                                       <!--tab-pane-->
                                        <div class="tab-pane" id="tab_1_12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <table>
                                                        <th>
                                                            <tr>
                                                                <td>
                                                                    <strong>Name</strong></td><td><strong>Title</strong></td>
                                                            </tr>
                                                        </th>
                                                        <tr>
                                                            <td>{{ $theater->theater->name_table_1 ? $theater->theater->name_table_1 : "Not entered yet"}}</td><td>{{ $theater->theater->title_table_1 ? $theater->theater->title_table_1 : "Not entered yet" }}</td></tr><tr>
                                                            <td>{{ $theater->theater->name_table_2 ? $theater->theater->name_table_2 : "" }}</td><td>{{ $theater->theater->title_table_1 ? $theater->theater->title_table_1 : "" }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--tab pane-->
                                   </div>
                               </div>
                            </div>

	                       <div class="col-md-3">
	                           <div class="portlet sale-summary">
		                            <div class="portlet-title">
		                                <div class="caption font-red sbold"> Contact Info </div>
		                            </div>
		                            <div class="portlet-body">
		                                <ul class="list-unstyled">
		                                    <li>
		                                        <span class="sale-info">Website</span>
		                                        @if($theater->theater->website)
                                                <span class="sale-num"><a href="https://{{ $theater->theater->website }}" target="_blank">{{ $theater->theater->website }}</a> </span>
                                                    @else
                                                    <span class="sale-num">NA</span>
                                                @endif
		                                    </li>
			                                <li>
		                                        <span class="sale-info">Contact Email<i class="fa fa-envelope-o"></i></span>
		                                        <span class="sale-num" style="font-size:15px;">
		                                        	 <a href="mailto:{{$theater->email}}">{{$theater->email}} </a>
		                                        </span>
		                                    </li>
		                                    <li>
		                                        <span class="sale-info">Contact Number<i class="fa fa-phone"></i></span>
		                                        <span class="sale-num">
		                                        	<a href="tel:{{ $theater->theater->contact_number ? $theater->theater->contact_number : "" }}">{{ $theater->theater->contact_number ? $theater->theater->contact_number : "Number not given!" }}</a>
		                                        </span>
		                                    </li>
		                                    <li>
		                                        <span class="sale-info">Telephone<i class="fa fa-phone"></i></span>
		                                        <span class="sale-num"><a href="tel:{{ $theater->theater->telephone ? $theater->theater->telephone : "" }}">{{ $theater->theater->telephone ? $theater->theater->telephone : "Telephone not given" }}</a> </span>
		                                    </li>
		                                   <li>
		                                       <span class="sale-info">Fax<i class="fa fa-img-up"></i></span>
		                                       <span class="sale-num">
		                                           <a href="#">{{ $theater->theater->fax ? $theater->theater->fax : "Not given" }}</a>
		                                       </span>
		                                    </li>
		                                    <li>
		                                        <span class="sale-info">Mailing<i class="fa fa-map-marker"></i></span>
                                                @if($theater->theater->mailing && $theater->theater->zipcode)
		                                        <span class="sale-num" style="font-size:15px;">
		                                        	{{ @$theater->theater->mailing.' - '.@$theater->theater->zipcode }}
		                                        </span>
                                                    @else
                                                    <span>Zipcode and mailing address is missing!</span>
                                                @endif
		                                    </li>
		                                </ul>
		                            </div>
		                        </div>
	                        </div>
                        
                        
                        </div><!--END .row-->
                    </div><!--END .tab-pane active" id="tab_1_1"-->
                    
                    <!--tab_1_2-->
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
@endsection