
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
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-doc font-green"></i>
                            <span class="caption-subject bold font-green uppercase">Pending Tasks</span>

                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="col-md-7">

                            <div class="timeline">
                                <!-- TIMELINE ITEM -->
                                @if(@$verify == 0)
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <div class="timeline-icon">
                                                <i class="icon-question font-red"></i>
                                            </div>
                                        </div>
                                        <div class="timeline-body inactiveBox">
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <span class="timeline-body-alerttitle font-red">Verify Email Address</span>
                                                </div>
                                                <form method="POST" action="{{ route('actor::actorProfileTrigger') }}">
                                                    {{ csrf_field() }}
                                                    <div class="timeline-body-head-actions">
                                                        <button type="submit" class="btn red">Resend Email</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="timeline-body-content">
                                            <span class="font-grey-cascade">If you do not receive an email within the next 15 minutes, resend the verification
                                            </span>
                                            </div>
                                        </div>
                                        @endif
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
                                                            <a href="{{route('actor::getEditProfile')}}" class="btn green">Update</a>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Profile Information Updated

                                            </span>
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

                                        @endif
                                    <!-- END TIMELINE ITEM -->
                                        <!-- TIMELINE ITEM -->

                                        <!-- END TIMELINE ITEM -->
                                        <!-- TIMELINE ITEM -->
                                        @if(\Auth::user()->payment_status == 1)
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <div class="timeline-icon">
                                                        <i class="icon-credit-card font-green"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-body activeBox">

                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <span class="timeline-body-alerttitle font-green">Payment</span>

                                                        </div>
                                                        <div class="timeline-body-head-actions">
                                                            <a href="javascript:;" class="btn btn-success">Done</a>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Payment Completed

                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                    @if(@$hardcopy == 0)
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <div class="timeline-icon">
                                                <i class="icon-picture font-red"></i>
                                            </div>
                                        </div>
                                        <div class="timeline-body inactiveBox">

                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <span class="timeline-body-alerttitle font-red">Photo And Resume</span>

                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Send in a check and a Hard Copy of your Resume & Photo
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(@$hardcopy==1)
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <div class="timeline-icon">
                                                    <i class="icon-picture font-red"></i>
                                                </div>
                                            </div>
                                            <div class="timeline-body inactiveBox">

                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <span class="timeline-body-alerttitle font-red">Incomplete</span>

                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Issue with your paperwork, a StrawHat representative will be reaching out to you shortly
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
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
                                                    <a href="{{route('actor::getActorPayment')}}" class="btn btn-danger">Pay Now</a>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Payment Pending

                                            </span>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            <!-- END TIMELINE ITEM -->

                            @endif
                                        @if(\Auth::user()->payment_status == 1 && $verify==1 && $hardcopy==2 && $audition_status==1)
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <div class="timeline-icon">
                                                        <i class="icon-credit-card font-green"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-body activeBox">

                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <span class="timeline-body-alerttitle font-green">Audition</span>

                                                        </div>

                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Selected For Audition

                                            </span>
                                                    </div>
                                                </div>
                                            </div>

                                        @elseif(\Auth::user()->payment_status == 1 && $verify==1 && $hardcopy==2 && $audition_status==2)

                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <div class="timeline-icon">
                                                        <i class="icon-credit-card font-red"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-body inactiveBox">

                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <span class="timeline-body-alerttitle font-red-intense">Audition</span>

                                                        </div>

                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Come for next year audition

                                            </span>
                                                    </div>
                                                </div>
                                            </div>

                                        @elseif(\Auth::user()->payment_status == 1 && $verify==1 && $hardcopy==2 && $audition_status==0)

                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <div class="timeline-icon">
                                                        <i class="icon-credit-card font-red"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-body inactiveBox">

                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <span class="timeline-body-alerttitle font-red-intense">Audition</span>

                                                        </div>

                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Your Audition Status is Pending Now. Once Confirmed you will get this information shortly.

                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                        </div>

                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection