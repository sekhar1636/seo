
@extends('common.layout')

@section('title', 'Update Profile')

@section('style')
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')

<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/additional-methods.min.js')}}"></script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
@endsection
@section('content')

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-user font-green"></i>
            <span class="caption-subject font-green bold uppercase">Update Profile Info</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form method="POST" class="form-horizontal form-validate-auto">
        {{csrf_field()}}
            <div class="form-body">
                <h3 class="form-section">Person Info</h3>
                <div class="row">
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                  
                            <button class="close" data-close="alert"></button>
                            <span>
                                {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
                            </span>
                        </div>
                        <div class="alert alert-success {{{ Session::has('recover_message') ? '' : 'display-hide' }}}">
                            <button class="close" data-close="alert"></button>
                            <span>
                                {!! Session::has('recover_message') ? Session::pull('recover_message') : 'Please correct your fields.' !!}
                            </span>
                        </div>
                    <div class="col-md-6">
                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                <div class="fileinput {{ @$slider->photo_url ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <img src="{{ isset($slider->photo_url) ? $slider->photo_url : asset('/images/photos/default-medium.jpg') }}" alt="{{ @$slider->name }}" />
                                    
                                    </div>
                                    <div class="fileinput-buttons">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-new">Select image </span>
                                        <span class="fileinput-exists">Change </span>
                                        <input type="hidden" value="" name="...">
                                        <input type="file" name="photo" />
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists hidden" data-dismiss="fileinput">
                                        Remove </a>
                                        <div class="help-block"> {{ $errors->first("photo") }} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("name") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-9">
                                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => ' Fullname', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'40']) !!}
                                <span class="help-block"> {{ $errors->first("name") }} </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("age") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Age</label>
                                <div class="col-md-9">
                                {!! Form::text('age', '', ['class' => 'form-control', 'placeholder' => ' Age', 'required'=>'required', 'digits'=>'true' , 'range'=>'[10,100]','maxlength'=>'3']) !!}
                                <span class="help-block"> {{ $errors->first("age") }} </span>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("gender") ? "has-error":"" }}'>
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                               {!! Form::select('gender',['' => 'Select Gender'] +App\Misc::$genders, '', ['in' => 'App\Misc::$genders',  'required' => 'required', 'maxlength' => '7', 'class' => 'form-control  account-type-select']) !!}
                                <span class="help-block"> {{ $errors->first("gender") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                     <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("height") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Height</label>
                                <div class="col-md-9">
                                {!! Form::text('height', '', ['class' => 'form-control', 'placeholder' => '5.45', 'required'=>'required', 'maxlength'=>'4']) !!}
                                <span class="help-block"> {{ $errors->first("height") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("hair") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Hair</label>
                                <div class="col-md-9">
                                {!! Form::text('hair', '', ['class' => 'form-control', 'placeholder' => 'i.e Blonde', 'required'=>'required','maxlength'=>'20']) !!}
                                <span class="help-block"> {{ $errors->first("Hair") }} </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("eyes") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Eyes</label>
                                <div class="col-md-9">
                                {!! Form::text('eyes', '', ['class' => 'form-control', 'placeholder' => 'Black', 'required'=>'required','maxlength'=>'20']) !!}
                                <span class="help-block"> {{ $errors->first("eyes") }} </span>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                   
                   <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("weight") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">Weight</label>
                                <div class="col-md-9">
                                {!! Form::text('weight', '', ['class' => 'form-control', 'placeholder' => '135 lbs', 'required'=>'required', 'digits'=>'true' , 'range'=>'[10,1000]','maxlength'=>'4']) !!}
                                <span class="help-block"> {{ $errors->first("weight") }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" {{ $errors->has("school") ? "has-error":"" }}'>
                                <label class="control-label col-md-3">School</label>
                                <div class="col-md-9">
                                {!! Form::text('school', '', ['class' => 'form-control', 'placeholder' => 'School', 'required'=>'required','maxlength'=>'150', 'minlength'=>'3']) !!}
                                <span class="help-block"> {{ $errors->first("school") }} </span>
                            </div>
                        </div>
                    </div>
                   
                </div>
        
                <h3 class="form-section">Other Info</h3>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("auditionType") ? "has-error":"" }}'>
                            <label class="control-label col-md-3">Audition Type</label>
                            <div class="col-md-9">
                               {!! Form::select('auditionType',['' => 'Select Audition Type'] +App\Misc::$auditionType, '', ['in' => 'App\Misc::$auditionType',  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
                                <span class="help-block"> {{ $errors->first("auditionType") }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("vocalRange") ? "has-error":"" }}'>
                            <label class="control-label col-md-3">Vocal Range</label>
                            <div class="col-md-9">
                               {!! Form::select('vocalRange',['' => 'Select Vocal Range'] +App\Misc::$vocalRange, '', ['in' => 'App\Misc::$vocalRange',  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
                                <span class="help-block"> {{ $errors->first("vocalRange") }} </span>
                            </div>
                        </div>
                    </div>

                   
                   
                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("jobType") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3" >Job Types</label>
                            <div class="col-md-9">
                                {!! Form::select('jobType[]',App\Misc::$jobTypes, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("jobType") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                     <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("dance") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3">Dances</label>
                            <div class="col-md-9">
                                {!! Form::select('dance[]',App\Misc::$dance, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("dance") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("technical") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3" >Technicals</label>
                            <div class="col-md-9">
                                {!! Form::select('technical[]',App\Misc::$technical, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("technical") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                     <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("ethnicity") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3">Ethnicity</label>
                            <div class="col-md-9">
                                {!! Form::select('ethnicity[]',App\Misc::$ethnicity, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("ethnicity") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("instrument") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3" >Instruments</label>
                            <div class="col-md-9">
                                {!! Form::select('instrument[]',App\Misc::$instrument, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("instrument") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                     <div class="col-md-6">
                         <div class="form-group" {{ $errors->has("misc") ? "has-error":"" }}'>
                            <label for="multiple" class="control-label col-md-3">Misc</label>
                            <div class="col-md-9">
                                {!! Form::select('misc[]',App\Misc::$misc, '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}
                                <span class="help-block"> {{ $errors->first("misc") }} </span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
               
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"> </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>


@endsection