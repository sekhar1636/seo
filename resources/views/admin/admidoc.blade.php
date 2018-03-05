@extends('common.layout')
@section('title', 'Actor Audition PDF\'s')
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
    <div class="row">
        @if(count($b)!=0)
        <div class="col-md-4">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Friday PDF's</div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:400px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                        <br/>

                                <label>Friday Main PDF(s):</label>
                                <!--<select name="pdfselect">-->
                                    <?php $i = 1; ?>
                                    @foreach(@$b as $actor)
                                        <div class="row">
                                            <div class="col-md-3">
                                    <form method="post" action="{{ url('admin/dompdf/Friday') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$i}}">
                                        <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                        <button class="btn btn-sm btn-primary" type="submit">{{"Friday Part $i"}}</button>
                                    </form>
                                            <?php $i++; ?>

                                            </div>
                                        </div>
                                        <br/>
                                @endforeach
                            <label>Friday Standby PDF(s):</label>
                            <!--<select name="pdfselect">-->
                            <?php $i = 1; ?>
                            @foreach(@$standbys as $actor)
                                <div class="row">
                                    <div class="col-md-3">
                                        <form method="post" action="{{ url('admin/domstandbypdf/Friday') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$i}}">
                                            <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                            <button class="btn btn-sm btn-primary" type="submit">Friday StandBy{{$i>1 ? $i : ""}}</button>
                                        </form>
                                        <?php $i++; ?>
                                    </div>
                                </div>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Saturday PDF's</div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:400px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                        <br/>

                                <label>Saturday Main PDF(s):</label>
                                <!--<select name="pdfselect">-->
                                    <?php $i = 1; ?>
                                    @foreach(@$c as $actor)
                                        <div class="row">
                                            <div class="col-md-3">
                                    <form method="post" action="{{ url('admin/dompdf/Saturday') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$i}}">
                                        <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                        <button class="btn btn-sm btn-primary" type="submit">{{"Saturday Part $i"}}</button>
                                    </form>
                                            <?php $i++; ?>

                                            </div>
                                        </div>
                                        <br/>
                                @endforeach
                        <!--if(count($standbysat)>50)-->
                                <label>Saturday Standby PDF(s):</label>
                            <!--<select name="pdfselect">-->
                            <?php $i = 1; ?>
                            @foreach(@$standbysat as $actor)
                                <div class="row">
                                    <div class="col-md-3">
                                        <form method="post" action="{{ url('admin/domstandbypdf/Saturday') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$i}}">
                                            <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                            <button class="btn btn-sm btn-primary" type="submit">Saturday StandBy {{$i>1 ? "$i" : ""}}</button>
                                        </form>
                                        <?php $i++; ?>
                                    </div>
                                </div>
                                <br/>
                            @endforeach
                        <!--//else
                            <div class="row">
                            <div class="col-md-3">
                                <form method="post" action="// url('admin/domstandbypdf/Saturday') }}">
                                     //csrf_field() }}
                                    <input type="hidden" name="actor" value="//$standbysat->toJson()}}">
                                    <button class="btn btn-xs btn-primary" type="submit">//"Saturday Standby"}}</button>
                                </form>
                            </div>
                            </div>
                        //endif-->
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Sunday PDF's</div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:400px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                        <br/>

                                <label>Sunday Main PDF(s):</label>
                                <!--<select name="pdfselect">-->
                                    <?php $i = 1; ?>
                                    @foreach(@$d as $actor)
                                        <div class="row">
                                            <div class="col-md-3">
                                    <form method="post" action="{{ url('admin/dompdf/Sunday') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$i}}">
                                        <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                        <button class="btn btn-sm btn-primary" type="submit">{{"Sunday Part $i"}}</button>
                                    </form>
                                            <?php $i++; ?>

                                            </div>
                                        </div>
                                        <br/>
                                @endforeach
                                <label>Sunday Standby PDF(s):</label>
                            <!--<select name="pdfselect">-->
                            <?php $i = 1; ?>
                            @foreach(@$standbysun as $actor)
                                <div class="row">
                                    <div class="col-md-3">
                                        <form method="post" action="{{ url('admin/domstandbypdf/Sunday') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$i}}">
                                            <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                            <button class="btn btn-sm btn-primary" type="submit">Sunday StandBy {{ $i>1 ? "Part $i" : " " }}</button>
                                        </form>
                                        <?php $i++; ?>
                                    </div>
                                </div>
                                <br/>
                            @endforeach
                            <!--<div class="row">
                            <div class="col-md-3">
                                <form method="post" action="// url('admin/domstandbypdf/Sunday') }}">
                                    // csrf_field() }}
                                    <input type="hidden" name="actor" value="//}}">
                                    <button class="btn btn-xs btn-primary" type="submit">//"Sunday Standby"}}</button>
                                </form>
                            </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-12">
        <strong>How to combine and merge files into one PDF:</strong>
			<ol>
			<li>Within Acrobat, click on the Tools menu and select Combine Files.</li>
			<li>Click Combine Files, and then click Add Files to select the files you want to include in your PDF.</li>
			<li>Click, drag, and drop to reorder the files and pages. Double-click on a file to expand and rearrange individual pages. Press the Delete key to remove unwanted content.</li>
			<li>When finished arranging files, click Combine Files.</li>
			<li>Click the Save button.</li>
			</ol>
        </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection