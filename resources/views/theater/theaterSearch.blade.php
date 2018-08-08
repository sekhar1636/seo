@extends('common.layout')
@section('title', 'Theater Search')
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#unav').hide();
        });
    </script>
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
                            <div class="search-label uppercase">Musical Performers</div>
                            <fieldset data-filter-group="musical-performers" class="control-group">

                                <select class="form-control">
                                    <option value="">--Musical performers--</option>
                                    @foreach(\App\Misc::$musical_performers as $key=>$at)
                                        <option value="[data-musical-performers={{preg_replace('/\s+/', '', $at)}}]">{{$at}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <div class="search-label uppercase">Available Positions</div>
                            <fieldset data-filter-group="available_positions" class="checkbox-group" data-logic="and">
                                @foreach(\App\Misc::$available_positions as $key)
                                    <span id="{{$key}}">
                                    <label class="mt-checkbox mt-checkbox-outline"> {{$key}}
                                        <input type="checkbox"  value=".{{preg_replace('/\s+/', '', $key)}}"/>
                                        <span></span>
                                    </label>
</span>
                                @endforeach
                            </fieldset>
                            <div class="search-label uppercase">Casting Dancers</div>
                            <fieldset data-filter-group="casting-dancers" class="control-group">
                                <select class="form-control">
                                    <option value="">--Casting Dancers--</option>
                                    @foreach(\App\Misc::$casting_dancers as $key=>$at)
                                        <option value="[data-casting-dancers={{preg_replace('/\s+/', '',  $at)}}]">{{$at}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <br>
                        </div>
                    </div>
                </form>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="actorContainer">
                            @foreach($theaters as $theater)
                                {{
							$mixClass = \App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->accompanist) ? $theater->accompanist : '']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->administration) ? $theater->administration :'']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->box_office) ? $theater->box_office : '']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->carpentry) ? $theater->carpentry : '']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->choreographer) ? $theater->choreographer : '']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->costume_design) ? $theater->costume_design : '']).' '.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->director) ? $theater->director : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->electrics) ? $theater->electrics : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->graphics) ? $theater->graphics : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->house) ? $theater->house : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->light_ops) ? $theater->light_ops : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->makeup_wig_design) ? $theater->makeup_wig_design : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->music_director) ? $theater->music_director : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->paint_charge) ? $theater->paint_charge : '' ]).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->photography) ? $theater->photography : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->pit_musician) ? $theater->pit_musician : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->properties) ? $theater->properties : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->publicity) ? $theater->publicity : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->running_crew) ? $theater->running_crew : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->scenic_artist) ? $theater->scenic_artist : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->set_design) ? $theater->set_design : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->sewing_wardrobe) ? $theater->sewing_wardrobe : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->sound) ? $theater->sound : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->state_management) ? $theater->state_management : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->technical_direction) ? $theater->technical_direction : '']).''.\App\Http\Controllers\TheaterController::prepareData(\App\Misc::$available_positions[(@$theater->video) ? $theater->video : '']) }}
                                <div data-musical-performers="{{ preg_replace('/\s+/', '', \App\Misc::$musical_performers[$theater->non_musical_yes]) }}" data-casting-dancers="{{ preg_replace('/\s+/', '', \App\Misc::$casting_dancers[$theater->dancers_yes]) }}" class="mix {{ $mixClass }}">
                                    <div class="col-md-4">
                                        <div class="tile-container">
                                            <div class="tile-thumbnail">
                                                <a href="javascript:;">
                                                    <img src="{{ $theater->photo_url ? asset($theater->photo_url) : asset('assets/images/photos/default-user-image.png') }}" />
                                                </a>
                                            </div>
                                            <div class="tile-title">
                                                <h3>
                                                    <a href="javascript:;">{{ $theater->company_name ? (strlen($theater->company_name)>20 ? substr($theater->company_name,0,20)."..." : $theater->company_name) : $theater->name}}</a>
                                                </h3>
                                                <a href="{{route('getTheaterView', $theater->user_id) }}" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> {{ $theater->company_name ? (strlen($theater->company_name)>20 ? substr($theater->company_name,0,20)."..." : $theater->company_name ) : $theater->name }} </a>
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