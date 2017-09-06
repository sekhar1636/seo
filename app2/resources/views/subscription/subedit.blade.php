@extends('admin.layout')

@section('title', 'Edit')


@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection



@section('js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editor').summernote({
                code : "{{ $errors->first('answer', ':message') }}",
                height:200,
            });
        });
    </script>

@endsection

@section('content')

    <!-- BEGIN PAGE CONTENT INNER -->

    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span> {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!} </span> </div>

                <!-- BEGIN CONTENT -->

                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <ul class="nav nav-tabs">

                                        <li class="active"> <a href="#tab_1_2" data-toggle="tab">{{ "Edit" }}</a> </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!--TAB -->

                                        @if(\Auth::user()->role!="admin")
                                            <div class="tab-pane active" id="tab_1_2">
                                                {{ "Sorry! You're Not Authorised User to Process this." }}
                                            </div>
                                        @else
                                            <div class="tab-pane active" id="tab_1_2">

                                            {{ Form::model($edit,['method' => 'POST','url' => ['admin/subscription/'.$edit['id']], 'class' => 'form-horizontal']) }}

                                            <!-- input Area -->
                                                <div class="form-group{{ $errors->has('subscription_name') ? ' has-error' : '' }}">
                                                    {{ Form::label('name_lab', 'Title', ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('subscription_name', $edit['subscription_name'], ['class' => 'form-control', 'placeholder' => 'Enter Subscription Name','required'=>'required']) }}
                                                        <p class="help-block">{{ $errors->first('subscription_name', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                    {{ Form::label('price_lab', 'Price', ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('price', $edit['price'], ['class' => 'form-control', 'placeholder' => 'Enter Price','required'=>'required']) }}
                                                        <p class="help-block">{{ $errors->first('price', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <!-- Text Area -->
                                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                    {{ Form::label('description_lab', 'Description', ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::textarea('description', $edit['description'], ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Description', 'required'=>'required']) }}
                                                        <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                                                    </div>
                                                </div>


                                                <!-- Select With One Default -->
                                                <div class="form-group {{ $errors->has('number_days') ? ' has-error' : '' }}">
                                                    {{ Form::label('days_lab', 'Number Of Days', ['class' => 'col-lg-2 control-label'] )  }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('number_days', $edit['number_days'], ['class' => 'form-control', 'placeholder' => 'Enter number of Days','required'=>'required']) }}
                                                        <p class="help-block">{{ $errors->first('number_days', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                                    {{ Form::label('type_lab', 'type', ['class' => 'col-lg-2 control-label'] )  }}
                                                    <div class="col-lg-10">
                                                        {{  Form::select('type', ['Actor'=>'Actor', 'Theater'=>'Theater', 'Staff' => 'Staff'], $edit['type'], array('class' => 'form-control', 'required'=>'required')) }}
                                                        <p class="help-block">{{ $errors->first('type', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                    {{ Form::label('stats_lab', 'Status', ['class' => 'col-lg-2 control-label'] )  }}
                                                    <div class="col-lg-10">
                                                        {{  Form::select('status', ['Active'=>'Active', 'Inactive'=>'Inactive'], $edit['status'], array('class' => 'form-control', 'required'=>'required')) }}
                                                        <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="form-group">
                                                    <div class="col-lg-10 col-lg-offset-2">
                                                        {{ Form::submit('SUBMIT', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                                                    </div>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                    @endif



                                    <!-- END TAB -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END CONTENT -->

            </div>
        </div>
    </div>

    <!-- END PAGE CONTENT INNER -->

@endsection