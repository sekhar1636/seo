@extends('common.layout')

@section('title', 'Staff Search')

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
                            <div class="search-label uppercase">Primary Sought</div>
                            <fieldset data-filter-group="primary-sought" class="control-group">

                                <select class="form-control">
                                    <option value="">--Primary Sought--</option>
                                    @foreach(\App\Misc::$primary_sought as $key=>$at)
                                        <option value="[data-primary-sought={{preg_replace('/\s+/', '', $at)}}]">{{$at}}</option>

                                    @endforeach
                                </select>
                            </fieldset>
                            <div class="search-label uppercase">Secondary Sought</div>
                            <fieldset data-filter-group="secondary-sought" class="control-group">

                                <select class="form-control">
                                    <option value="">--Secondary Sought--</option>
                                    @foreach(\App\Misc::$secondary_sought as $key=>$at)
                                        <option value="[data-secondary-sought={{preg_replace('/\s+/', '',  $at)}}]">{{$at}}</option>

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

                            @foreach($staffs as $staff)

                                <div data-primary-sought="{{ preg_replace('/\s+/', '', \App\Misc::$secondary_sought[$staff->primary_sought]) }}" data-secondary-sought="{{ preg_replace('/\s+/', '', \App\Misc::$secondary_sought[$staff->secondary_sought]) }}" class="mix">
                                    <div class="col-md-4">
                                        <div class="tile-container">
                                            <div class="tile-thumbnail">
                                                <a href="javascript:;">
                                                    <img src="{{ $staff->photo_url }}" />
                                                </a>
                                            </div>
                                            <div class="tile-title">
                                                <h3>
                                                    <a href="javascript:;">{{ $staff->name }}</a>
                                                </h3>
                                                <div class="tile-desc">

                                                    <p>
                                                        {{ "Availability:". $staff->from ." to ". $staff->to }}
                                                    </p>
                                                </div>

                                                <a href="{{route('getActorView', $staff->user_id) }}" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> {{ $staff->last_name }} </a>
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