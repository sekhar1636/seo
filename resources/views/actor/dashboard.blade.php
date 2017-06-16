
@extends('common.layout')

@section('title', 'Actor Dashboard')

@section('style')
<style type="text/css">
    .activeBox{
        border:1px solid rgba(68,182,174,1);
    }
    .inactiveBox{
        border:1px solid rgb(234, 190, 189);
    }
</style>
@endsection

@section('js')
<script src="{{asset('assets/apps/scripts/timeline.min.js')}}" type="text/javascript"></script>

@endsection
@section('content')
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-doc font-green"></i>
                        <span class="caption-subject bold font-green uppercase">Pending Tasks</span>
                        
                    </div>
                   
                </div>
                <div class="portlet-body">
                    <div class="col-md-7">
                    <form action="/your-server-side-code" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_DhPf707EvWL3bXNGuINEMmWl"
    data-amount="999"
    data-name="Demo Site"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
                        <div class="timeline">
                            <!-- TIMELINE ITEM -->
                            @if(\Auth::user()->actor)
                                <div class="timeline-item">
                                    <div class="timeline-badge">
                                        <div class="timeline-icon">
                                            <i class="icon-user-following font-green"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-body activeBox">
                                        <div class="timeline-body-head">
                                            <div class="timeline-body-head-caption">
                                                <span class="timeline-body-alerttitle font-green">Profile Information</span>
                                            </div>
                                            <div class="timeline-body-head-actions">
                                                <a href="javascript:;" class="btn green">Done</a>
                                            </div>
                                        </div>
                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Profile Information Updated
                                               
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="timeline-item">
                                    <div class="timeline-badge">
                                        <div class="timeline-icon">
                                            <i class="icon-user-following font-red"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-body inactiveBox">
                                     
                                        <div class="timeline-body-head">
                                            <div class="timeline-body-head-caption">
                                                <span class="timeline-body-alerttitle font-red-intense">Profile Information</span>
                                                
                                            </div>
                                            <div class="timeline-body-head-actions">
                                                <a href="{{route('actor::getEditProfile')}}" class="btn btn-danger">Update</a>
                                            </div>
                                        </div>
                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Update profile information
                                               
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- END TIMELINE ITEM -->
                            <!-- TIMELINE ITEM -->
                         
                            <!-- END TIMELINE ITEM -->
                            <!-- TIMELINE ITEM -->
                            <div class="timeline-item">
                                <div class="timeline-badge">
                                    <div class="timeline-icon">
                                        <i class="icon-credit-card font-red"></i>
                                    </div>
                                </div>
                                <div class="timeline-body inactiveBox">
                                 
                                    <div class="timeline-body-head">
                                        <div class="timeline-body-head-caption">
                                            <span class="timeline-body-alerttitle font-red-intense">Payment</span>
                                            
                                        </div>
                                        <div class="timeline-body-head-actions">
                                            <a href="" class="btn btn-danger">Pay Now</a>
                                        </div>
                                    </div>
                                    <div class="timeline-body-content">
                                        <span class="font-grey-cascade"> Payment Pending
                                           
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END TIMELINE ITEM -->
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection