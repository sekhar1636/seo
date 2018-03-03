@extends('common.layout')
@section('title', 'Actor Audition Pdfs')
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
        <div class="col-md-4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Pdf Status- {{$day}} </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                        <br/>

                                <label>{{$day}} Pdf's to download:</label>
                                <!--<select name="pdfselect">-->
                                    <?php $i = 1; ?>
                                    @foreach(@$b as $actor)
                                        <div class="row">
                                            <div class="col-md-3">
                                    <form method="post" action="{{ url('admin/dompdf/'.$day) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$i}}">
                                        <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                        <button class="btn btn-sm btn-primary" type="submit">{{"$day Part $i"}}</button>
                                    </form>
                                            <?php $i++; ?>

                                            </div>
                                        </div>
                                        <br/>
                                @endforeach
                        @if(count($standbys)>50)
                            <label>{{$day}} Standby Pdf's to download:</label>
                            <!--<select name="pdfselect">-->
                            <?php $i = 1; ?>
                            @foreach(@$standbys as $actor)
                                <div class="row">
                                    <div class="col-md-3">
                                        <form method="post" action="{{ url('admin/domstandbypdf/'.$day) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$i}}">
                                            <input type="hidden" name="actor" value="{{$actor->toJson()}}">
                                            <button class="btn btn-sm btn-primary" type="submit">{{"$day StandBy $i"}}</button>
                                        </form>
                                        <?php $i++; ?>
                                    </div>
                                </div>
                                <br/>
                            @endforeach
                        @else
                            <div class="row">
                            <div class="col-md-3">
                                <form method="post" action="{{ url('admin/domstandbypdf/'.$day) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="actor" value="{{$standbys->toJson()}}">
                                    <button class="btn btn-xs btn-primary" type="submit">{{"$day Standby"}}</button>
                                </form>
                            </div>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection