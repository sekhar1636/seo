 @extends('admin.layout')



@section('title', 'Slideshow')



@section('style')
    <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-custom.css')}}">
@endsection



@section('js')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/handlebars.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<script type="text/javascript">
var template = Handlebars.compile($("#details-template").html());
var table =$('#slideshow-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminSlideshowDataTable")}}',
        columns: [
            {data: 'id'},
            {data: 'name'},
			{data: 'status'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
			{
                className:      'details-control',
                orderable: false,
                searchable: false,
                data:           null,
                defaultContent: '<button class="btn btn-primary">View Slides</button>'
            }
        ],
		order: [[1, 'desc']]
    });
// Add event listener for opening and closing details
$('#slideshow-table tbody').on('click', 'td.details-control', function () {
	var tr = $(this).closest('tr');
	var row = table.row(tr);
	var tableId = 'posts-' + row.data().id;

	if (row.child.isShown()) {
		// This row is already open - close it
		$(this).html('<button class="btn btn-primary">View Slides</button>');
		row.child.hide();
		tr.removeClass('shown');
	} else {
		// Open this row
		$(this).html('<button class="btn btn-danger">Hide Slides</button>');
		row.child(template(row.data())).show();
		initTable(tableId, row.data());
		tr.addClass('shown');
		tr.next().find('td').addClass('no-padding bg-gray');
	}
});

function initTable(tableId, data) {
	$('#' + tableId).DataTable({
		processing: true,
		serverSide: true,
		searching: false,
		paging: false,
		bInfo: false,
		ajax: data.details_url,
		columns: [
			{data: 'id'},
			{data: 'slide',"render": function(data, type, row) {return '<img src="'+data+'" class="datatable-slide" />';}
    		},
			{data: 'title'},
            {data: 'description'},
            {data: 'action'}
		]
	})
}
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
      <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
        <button class="close" data-close="alert"></button>
        <span> {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!} </span> </div>
      
      <!-- BEGIN CONTENT -->
      
      <div class="profile-content">
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light ">
              <div class="portlet-title tabbable-line">
                <ul class="nav nav-tabs">
                  <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Slideshow List</a> </li>
                  <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Add New Slideshow</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                  <table id="slideshow-table" class="table">
                  <thead>
                  <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Status</td>
                  <td>Action</td>
                  <td style="background:#FFF !important;">View Slides</td>
                  </tr>
                  </thead>
                  </table>
                  <script id="details-template" type="text/x-handlebars-template">
						<div class="label label-info">Slideshow Slides</div>
						<table class="table details-table" id="posts-@{{id}}">
							<thead>
								<tr>
									<th>Id</th>
									<th>Slide</th>
									<th>Title</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</script>
                   </div>
                  
                  <!-- END TAB --> 
                  
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2"> 
                  	{{ Form::open(['route' => 'admin::adminSlideshowStore', 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter slideshow name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{ Form::label('status', 'status', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('status', ['1'=>'Activate', '0'=>'De-Activate'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                        </div>
                    </div>
                    
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Add Slideshow', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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