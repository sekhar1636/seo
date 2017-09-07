@extends('common.layout')

@section('title', 'FAQ')

@section('style')
<link href="{{asset('assets/pages/css/faq.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
.list{
	list-style:none;
}
</style>
@endsection
@section('js') 
<script type="text/javascript">
$(function(){
    //var monkeyList = new List('test-list', { 
//	  valueNames: ['name']
//	});

var args = {
  valueNames: [ 'name' ]
};

var list1 = new List("accordion1", args);
var list2 = new List("accordion2", args);
var list3 = new List("accordion3", args);
var list4 = new List("accordion4", args);

$(".fuzzy-search").keyup(function(){
    list1.search($(this).val());
    list2.search($(this).val());
	list3.search($(this).val());
	list4.search($(this).val());
});

});
</script> 
@endsection

@section('content') 
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
  <div class="faq-page faq-content-1">
    <div class="faq-content-container">
      <div class="row">
        <div class="col-md-12" id="test-list">
          <div class="faq-section">
          <div class="col-md-12">
          <div class="form-group pull-right">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Search" class="form-control fuzzy-search" id="search">
                </div>
            </div>
            </div>
          <h2 class="faq-title uppercase font-blue">Application Questions</h2>
            <div class="panel-group accordion faq-content" id="accordion1">
              <ul class="list">
              @foreach($faq['application'] as $f)
                <li>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <i class="fa fa-circle"></i> <a class="accordion-toggle name" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{$f->id}}"> {{$f->question}}</a> </h4>
                    </div>
                    <div id="collapse_{{$f->id}}" class="panel-collapse collapse">
                      <div class="panel-body">{!!$f->answer!!}</div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="faq-section ">
            <h2 class="faq-title uppercase font-blue">Members Area Questions</h2>
            <div class="panel-group accordion faq-content" id="accordion3">
            <ul class="list">
                @foreach($faq['members'] as $f)
                <li>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <i class="fa fa-circle"></i> <a class="accordion-toggle name" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{$f->id}}"> {{$f->question}}</a> </h4>
                    </div>
                    <div id="collapse_{{$f->id}}" class="panel-collapse collapse">
                      <div class="panel-body">{!!$f->answer!!}</div>
                    </div>
                  </div>
                </li>
                @endforeach
            </ul>
              
              
              
              
              
              
            </div>
          </div>
          <div class="faq-section ">
            <h2 class="faq-title uppercase font-blue">Selection Questions</h2>
            <div class="panel-group accordion faq-content" id="accordion2">
            <ul class="list">
               @foreach($faq['selection'] as $f)
                <li>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <i class="fa fa-circle"></i> <a class="accordion-toggle name" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{$f->id}}"> {{$f->question}}</a> </h4>
                    </div>
                    <div id="collapse_{{$f->id}}" class="panel-collapse collapse">
                      <div class="panel-body">{!!$f->answer!!}</div>
                    </div>
                  </div>
                </li>
                @endforeach
                </ul>
              
              
              
            </div>
          </div>
          <div class="faq-section ">
            <h2 class="faq-title uppercase font-blue">Audition Questions</h2>
            <div class="panel-group accordion faq-content" id="accordion4">
            <ul class="list">
                @foreach($faq['audition'] as $f)
                <li>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <i class="fa fa-circle"></i> <a class="accordion-toggle name" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{$f->id}}"> {{$f->question}}</a> </h4>
                    </div>
                    <div id="collapse_{{$f->id}}" class="panel-collapse collapse">
                      <div class="panel-body">{!!$f->answer!!}</div>
                    </div>
                  </div>
                </li>
                @endforeach
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT INNER --> 

@endsection