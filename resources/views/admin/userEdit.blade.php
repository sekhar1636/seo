 @extends('admin.layout')



@section('title', 'Edit User')



@section('style')

@endsection



@section('js')
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
              <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit User</a> </li>
              </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
              <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                    {{ Form::model($user, ['method' => 'PATCH','route' => ['admin::adminUserUpdate',$user->id], 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Enter Name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                        {{ Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email','required'=>'required','readonly'=>'readonly']) }}
                        <p class="help-block">{{ $errors->first('email', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        {{ Form::label('role', 'Select Role', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('role', ['actor'=>'Actor', 'staff'=>'Staff', 'theater'=>'Theater'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('role', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('payment_status') ? ' has-error' : '' }}">
                        {{ Form::label('payment_status', 'Payment Status', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('payment_status', ['No','Yes'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('payment_status', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{ Form::label('status', 'Account', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('status', ['Block','Active'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="subscription_status" class="col-lg-2 control-label">Subscription Status</label>
                            @if(@$subsciption_expiry)
                             <div class="col-lg-10 {{ $subsciption_expiry > date('Y-m-d')?"text-success":"text-danger" }}">
                                {{ $subsciption_expiry > date('Y-m-d')?"Active":"Expired" }} (Expiry {{$subsciption_expiry}})
                             </div>
                            @else
                             <div class="col-lg-10">
                                Not Subscribed
                             </div>
                            @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Edit User', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                  </div>
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