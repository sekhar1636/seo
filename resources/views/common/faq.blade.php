@extends('common.layout')

@section('title', 'FAQ')

@section('style')
	<link href="{{asset('assets/pages/css/faq.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="faq-page faq-content-1">
        
        <div class="faq-content-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="faq-section ">
                        <h2 class="faq-title uppercase font-blue">Application Questions</h2>
                        <div class="panel-group accordion faq-content" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> What is the deadline for actor applications?</a>
                                    </h4>
                                </div>
                                <div id="collapse_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Application deadline is February 1st. This means that ALL materials – email and hard copy – must be delivered to our office by NOON of that day. If you are using a courier, be sure they can confirm delivery on that day. Better yet, apply early!
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> Do you accept purchase orders?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq-section ">
                        <h2 class="faq-title uppercase font-blue">Members Area Questions</h2>
                        <div class="panel-group accordion faq-content" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> How do I vote or respond to a poll?</a>
                                    </h4>
                                </div>
                                <div id="collapse_3_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> Do you accept purchase orders?</a>
                                    </h4>
                                </div>
                                <div id="collapse_3_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-section ">
                        <h2 class="faq-title uppercase font-blue">Selection Questions</h2>
                        <div class="panel-group accordion faq-content" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_1"> How much does it cost?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2"> Do you accept purchase orders?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_3"> What is the K-12 classroom size promise?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq-section ">
                        <h2 class="faq-title uppercase font-blue">Audition Questions</h2>
                        <div class="panel-group accordion faq-content" id="accordion4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_1"> How do I vote or respond to a poll?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_2"> Do you accept purchase orders?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt laborum eiusmod. </p>
                                    </div>
                                </div>
                            </div>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->
                               
@endsection