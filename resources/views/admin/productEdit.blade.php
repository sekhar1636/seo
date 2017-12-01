 @extends('admin.layout')



@section('title', 'Edit Product')



@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#editor').summernote({
	  code : "{{ $errors->first('description', ':message') }}",
	  height:200,
	});

	var count  = $('.tab_hid').attr('value');
    $('#add_variant').click(function(){
        var id = count;
        $('#varianttable').append('<tr><td>'+ '<input type="text" class="col-lg-8" value="" name="varient['+id+'][name]">' +'</td><td>'+ '<input type="text" class="col-sm-8" value="" name="varient['+id+'][price]">' +'</td><td><input type="button" id="rem['+id+']" value="remove" class="btn btn-xs btn-primary remove"/></td></tr>');
        count++;

    });

    $('#varianttable').on('click','.remove',function(){
        $(this).parents('tr').remove();
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
              <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Product</a> </li>
              </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
              <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                    {{ Form::model($product, ['method' => 'PATCH','route' => ['admin::adminProductUpdate',$product->id], 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Text Area -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('description', $value = null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Answer', 'required'=>'required', 'minlength'=>'20']) }}
                            <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('_type') ? ' has-error' : '' }}">
                        {{ Form::label('status', 'Status', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('status', ['1'=>'Activate', '0'=>'De-Activate'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                        </div>
                    </div>
                        <div class="form-group{{ $errors->has('_type') ? ' has-error' : '' }}">
                            {{ Form::label('prvarent', 'Product Varient', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-7">
                            <table class="table table-bordered" id="varianttable">
                                <thead>
                                <tr>
                                    <th class="col-lg-6">Varient Name</th>
                                    <th class="col-lg-3">Price</th>
                                    <th class=""> <input type="button" value="ADD" class="btn btn-xs btn-primary" id="add_variant"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $init = 0; ?>
                                @foreach($variant as $val)
                                <tr>

                                    <td><input type="text" class="col-lg-8" value="{{ $val['product_variant'] }}" name="varient[{{ $init }}][name]"></td>
                                    <td><input type="text" class="col-sm-8" value="{{ $val['price'] }}" name="varient[{{ $init }}][price]"></td>
                                    <input type="hidden" name="varient[{{ $init }}][id]" value="{{ $val['id'] }}">
                                    <td><input type="button"  value="remove" class="btn btn-xs btn-primary remove" />
                                </tr>
                                <?php $init++; ?>
                                @endforeach
                                </tbody>
                                <input type="hidden" value="{{ $init }}" name="data" class="tab_hid">
                            </table>
                        </div>
                        </div>
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Add Product', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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