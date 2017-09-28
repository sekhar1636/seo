@extends('common.layout')

@section('title', 'Actor Search')

@section('style')
<link href="{{asset('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" href="{{asset('assets/search/main.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('assets/search/actorSearch.css')}}"> -->
    <style type="text/css">
   
        .search-content-3 .tile-container>.tile-title>h3{
            font-size: 14px;
            text-transform: uppercase;
        }

.controls-pagination {
    padding: 1rem;
    font-size: 0.1px;
    text-align: justify;
}

.controls-pagination:after {
    content: '';
    display: inline-block;
    width: 100%;
}

.mixitup-page-list,
.mixitup-page-stats {
    display: inline-block;
    vertical-align: middle;
}

.mixitup-page-list {
    text-align: left;
}

.mixitup-page-stats {
    font-size: .9rem;
    color: #333;
    font-weight: bold;
    font-family: arial, sans-serif;
}

.mixitup-control {
    position: relative;
    display: inline-block;
    text-align: center;
    width: 2.7rem;
    height: 2.7rem;
    background: #fff;
    border-top: 3px solid transparent;
    border-bottom: 3px solid transparent;
    margin-right: 1px;
    cursor: pointer;
    font-size: .9rem;
    color: #333;
    font-weight: bold;
    font-family: 'helvetica', arial, sans-serif;
    transition: color 150ms, border-color 150ms;
    vertical-align: middle;
}

.mixitup-control:first-child {
    border-radius: 3px 0 0 3px;
}

.mixitup-control:last-child {
    border-radius: 0 3px 3px 0;
}

.mixitup-control:not(.mixitup-control-active):hover {
    color: #91e6c7;
}

.mixitup-control-active {
    border-bottom-color: #91e6c7;
    cursor: default;
}

.mixitup-control:disabled {
    background: #eaeaea;
    color: #aaa;
    cursor: default;
}

.mixitup-control-truncation-marker {
    background: transparent;
    pointer-events: none;
    line-height: 2.2em;
}
.search-page .search-filter>.search-label{
    margin-top: 12px;
    </style>

@endsection

@section('js')
<script src="{{asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/search/mixitup.min.js')}}"></script>
<script src="{{asset('assets/search/mixitup-pagination.min.js')}}"></script>
<script src="{{asset('assets/search/mixitup-multifilter.min.js')}}"></script>
<script src="{{asset('assets/search/main.js')}}"></script>
@endsection
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="search-page search-content-3">

        <div class="row">
        <form class="controls">
            <div class="col-lg-4">
                <div class="search-filter ">
                    <div class="row">
                        <button type="reset" class="btn grey bold uppercase btn-block">Reset Filters</button>
                    </div>
                    <div class="search-label uppercase">Gender</div>
                    <fieldset data-filter-group="gender" class="control-group">
                        <a  class="btn btn-default" data-filter="all">All</a>
                        @foreach(\App\Misc::$genders as $key=>$genders)
                        <a  class="btn btn-default" data-filter=".{{$genders}}">{{$genders}}</a>
                       @endforeach
                    </fieldset>

                    <div class="search-label uppercase">Audition Type</div>
                    <fieldset data-filter-group="audition-type" class="control-group">
                        
                        <select class="form-control">
                            <option value="">--Audition Type--</option>
                            @foreach(\App\Misc::$auditionType as $key=>$at)
                            <option value="[data-audition-type={{preg_replace('/\s+/', '', $at)}}]">{{$at}}</option>
                         
                            @endforeach
                        </select>
                    </fieldset>
                    <div class="search-label uppercase">Vocal Range</div>
                    <fieldset data-filter-group="skills-vocal" class="control-group">
                        <select class="form-control">
                            <option value="">--Vocal Range--</option>
                            @foreach(\App\Misc::$vocalRange as $key=>$vc)
                            <option value="[data-skill-vocal={{preg_replace('/\s+/', '', $vc)}}]">{{$vc}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <div class="search-label uppercase">First Name</div>
                    <fieldset data-filter-group="first-name" class="text-input-wrapper">
                    <div class="input-icon right">
                        <i class="icon-magnifier"></i>
                        <input type="text" data-search-attribute="data-first-name" class="form-control" placeholder="Type first name here"/>
                        </div>
                    </fieldset>
                    <div class="search-label uppercase">Last Name</div>
                    <fieldset data-filter-group="last-name" class="text-input-wrapper">
                    <div class="input-icon right">
                        <i class="icon-magnifier"></i>
                        <input type="text" data-search-attribute="data-last-name"  class="form-control" placeholder="Type last name here"/></div>
                    </fieldset>
                     <div class="search-label uppercase">Will Consider</div>
                    <fieldset data-filter-group="jobtype" class="checkbox-group" data-logic="and">
                            @foreach(\App\Misc::$jobTypes as $key=>$j)
                                 <label class="mt-checkbox mt-checkbox-outline"> {{$j}}
                                    <input type="checkbox" value=".{{preg_replace('/\s+/', '', $j)}}"/>
                                    <span></span>
                                </label>
                            @endforeach 
                    </fieldset>

                    <div class="search-label uppercase">Ethnicity</div>
                    <fieldset data-filter-group="ethnicity" class="checkbox-group" data-logic="and">
                        @foreach(\App\Misc::$ethnicity as $key=>$e)
                            <label class="mt-checkbox mt-checkbox-outline"> {{$e}}
                                <input type="checkbox" value=".{{preg_replace('/\s+/', '', $e)}}"/>
                        
                                <span></span>
                            </label>
                        @endforeach 
                    </fieldset>

                    <div class="search-label uppercase">Employee Availability</div>
                    <fieldset data-filter-group="employeeavailability" class="checkbox-group" data-logic="and">
                        @foreach(\App\Misc::$employee_availability as $key=>$e)
                            <label class="mt-checkbox mt-checkbox-outline"> {{$e}}
                                <input type="checkbox" value=".{{preg_replace('/\s+/', '', $e)}}"/>

                                <span></span>
                            </label>
                        @endforeach
                    </fieldset>

                   

                    <div class="search-label uppercase">Dance</div>
                    <fieldset data-filter-group="dance" class="checkbox-group" data-logic="and">
                            @foreach(\App\Misc::$dance as $key=>$d)
                                 <label class="mt-checkbox mt-checkbox-outline"> {{$d}}
                                    <input type="checkbox" value=".{{preg_replace('/\s+/', '', $d)}}"/>
                                    <span></span>
                                </label>
                            @endforeach 
                    </fieldset>


                    <div class="search-label uppercase">Instrument</div>
                    <fieldset data-filter-group="instrument" class="checkbox-group" data-logic="and">
                        @foreach(\App\Misc::$instrument as $key=>$i)
                                <label class="mt-checkbox mt-checkbox-outline"> {{$i}}
                                    <input type="checkbox" value=".{{preg_replace('/\s+/', '', $i)}}"/>
                                    <span></span>
                                </label>
                        @endforeach 
                    </fieldset>

                    <div class="search-label uppercase">Technical</div>
                    <fieldset data-filter-group="tech" class="checkbox-group" data-logic="and">
                        @foreach(\App\Misc::$technical as $key=>$t)
                                <label class="mt-checkbox mt-checkbox-outline"> {{$t}}
                                    <input type="checkbox" value=".{{preg_replace('/\s+/', '', $t)}}"/>
                                    <span></span>
                                </label>
                        @endforeach 
                    </fieldset>

                    <div class="search-label uppercase">Misc</div>
                    <fieldset data-filter-group="misc" class="checkbox-group" data-logic="and">
                        @foreach(\App\Misc::$misc as $key=>$m)
                                 <label class="mt-checkbox mt-checkbox-outline"> {{$m}}
                                    <input type="checkbox" value=".{{preg_replace('/\s+/', '', $m)}}"/>
                                    <span></span>
                                </label>
                        @endforeach 
                    </fieldset>

                </div>
            </div>
            </form>
            <div class="col-lg-8">
                <div class="row">
                    <div class="actorContainer">
					
					@foreach($actorList as $actor)
						{{
							$mixClass = $actor->gender . ' '. \App\Http\Controllers\ActorController::prepareData($actor->ethnicity). ' '. \App\Http\Controllers\ActorController::prepareData($actor->misc). ' '. \App\Http\Controllers\ActorController::prepareData($actor->technical). ' '. \App\Http\Controllers\ActorController::prepareData($actor->dance). ' '. \App\Http\Controllers\ActorController::prepareData($actor->jobType). ' '. \App\Http\Controllers\ActorController::prepareData($actor->instrument) .' '. \App\Http\Controllers\ActorController::getAvailability($actor->from, $actor->to)
						}}
						<div data-first-name="{{ strtolower($actor->first_name) }}" data-last-name="{{ strtolower($actor->last_name) }}" data-audition-type="{{ preg_replace('/\s+/', '', $actor->auditionType) }}" data-skill-vocal="{{ preg_replace('/\s+/', '', $actor->vocalRange) }}" class="mix {{ $mixClass }}">
							<div class="col-md-4">
								<div class="tile-container">
									<div class="tile-thumbnail">
										<a href="javascript:;">
											<img src="{{ $actor->photo_url }}" />
										</a>
									</div>
									<div class="tile-title">
										<h3>
											<a href="javascript:;">{{ $actor->first_name ." ". $actor->last_name }}</a>
										</h3>
										<div class="tile-desc">
											<p>
												{{ $actor->auditionType }}
											</p>
											<p>
												{{ "Employment Availability:". $actor->from ." to ". $actor->to }}
											</p>
										</div>

										<a href="{{route('getActorView', $actor->user_id) }}" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> {{ $actor->last_name }} </a>
									</div>
								</div>
							</div>
						</div>
						{{ $mixClass = "" }}
					@endforeach
                    </div>
                    <div class="clearfix"></div>
                    <div class="controls-pagination">
                        <div class="mixitup-page-list"></div>
                        <div class="mixitup-page-stats"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->
@endsection