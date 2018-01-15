
@extends('common.layout')

@section('title', 'Actor Dashboard')

@section('style')
   <link rel="stylesheet" href="{{asset('assets/css/active.css')}}">

@endsection

@section('js')
    <!--<script src="//asset('assets/apps/scripts/timeline.min.js')}}" type="text/javascript"></script>-->

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
                                        @if(\Auth::user()->actor->first_name == null)
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <div class="timeline-icon">
                                                        <i class="icon-user-following font-red"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-body inactiveBox">

                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <span class="timeline-body-alerttitle font-red-intense">Start Profile</span>

                                                        </div>
                                                        <div class="timeline-body-head-actions">
                                                            <a href="{{route('actor::getEditProfile',['#tab_1_1'])}}" class="btn btn-danger">Start Profile</a>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Create Your profile and be a star.

                                            </span>
                                                    </div>
                                                </div>

                                                @else
                                        @if(\Auth::user()->actor->first_name != Null && @$resume != '' && @$roles != '')
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
                                                @elseif(@$roles == '')
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <div class="timeline-icon">
                                                                <i class="icon-user-following font-red"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-body inactiveBox">

                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <span class="timeline-body-alerttitle font-red-intense">Update User Roles</span>

                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <a href="{{route('actor::getEditProfile',['#tab_1_4'])}}" class="btn btn-danger">Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Please Update Atleast one Role.

                                            </span>
                                                            </div>
                                                        </div>



                                                    @elseif(@$resume == '')
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <div class="timeline-icon">
                                                                <i class="icon-user-following font-red"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-body inactiveBox">

                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <span class="timeline-body-alerttitle font-red-intense">Please Update Your Resume</span>

                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <a href="{{route('actor::getEditProfile')}}" class="btn btn-danger">Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                            <span class="font-grey-cascade"> Update Your resume information

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
                                            <span class="font-grey-cascade"> Payment is pending

                                            </span>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            <!-- END TIMELINE ITEM -->

                            @endif
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
                                                                            <div class="timeline-body-head-actions">
                                                                                @if(\Auth::user()->payment_status == 1 && @$act->first_name != '' && @$act->last_name != '' && @$act->ethnicity != '' && @$verify == 1 && \Auth::user()->email != '' && @$act->gender != '' && @$act->age != '' && @$act->vocalRange != '' && @$act->feet != '' && @$act->inch != '' && @$act->weight != '' && @$act->hair != '' && @$act->eyes != '' && @$act->from != '' && @$act->to != '' && @$act->auditionType != '')
                                                                                    <a href="{{ route('actor::actorPreview') }}" class="btn btn-primary">Print Application</a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Send in a check and a Hard Copy of your Resume & Photo
                                            </span>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif(@$hardcopy == 2)
                                                                <div class="timeline-item">
                                                                    <div class="timeline-badge">
                                                                        <div class="timeline-icon">
                                                                            <i class="icon-picture font-red"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="timeline-body inactiveBox">

                                                                        <div class="timeline-body-head">
                                                                            <div class="timeline-body-head-caption">
                                                                                <span class="timeline-body-alerttitle font-red">Hardcopy Received</span>
                                                                            </div>

                                                                        </div>
                                                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Hardcopy Received Waiting for Strawhat Panelist to approve.
                                            </span>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif(@$hardcopy == 1)
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
                                                            @elseif(@$hardcopy == 3)
                                                                <div class="timeline-item">
                                                                    <div class="timeline-badge">
                                                                        <div class="timeline-icon">
                                                                            <i class="icon-picture font-green"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="timeline-body activeBox">
                                                                        <span class="timeline-body-alerttitle font-green">Selected</span>
                                                                        <div class="timeline-body-head-actions">
                                                                            @if(\Auth::user()->payment_status == 1 && @$act->first_name != '' && @$act->last_name != '' && @$act->ethnicity != '' && @$verify == 1 && \Auth::user()->email != '' && @$act->gender != '' && @$act->age != '' && @$act->vocalRange != '' && @$act->feet != '' && @$act->inch != '' && @$act->weight != '' && @$act->hair != '' && @$act->eyes != '' && @$act->from != '' && @$act->to != '' && @$act->auditionType != '')
                                                                                <a href="{{ route('actor::actorPreview') }}" class="btn btn-success">Print Application</a>
                                                                            @endif
                                                                        </div>
                                                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Congratulations, You're Selected for Audition.
                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif(@$hardcopy == 4)
                                                                <div class="timeline-item">
                                                                    <div class="timeline-badge">
                                                                        <div class="timeline-icon">
                                                                            <i class="icon-picture font-red"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="timeline-body inactiveBox">

                                                                        <div class="timeline-body-head">
                                                                            <div class="timeline-body-head-caption">
                                                                                <span class="timeline-body-alerttitle font-red">Not Selected</span>

                                                                            </div>
                                                                        </div>
                                                                        <div class="timeline-body-content">
                                            <span class="font-grey-cascade">Sorry! You're Not Selected for Audition.
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
                        <div class="col-md-12">
                            <p style="font-weight:bold">Terms And Conditions</p>
                            <p>By creating a profile on the StrawHat Auditions website, I certify that I have read the registration and application instructions fully and that the information in this application is truthful and correct.<span style="font-weight: bold;"> I understand that payment of the registration fee does not guarantee that I will be scheduled for an audition, only that I will receive consideration for same, and that this registration fee is non-refundable.</span> I understand that StrawHat Auditions is not to be held responsible for any errors of omissions in the publication or reproduction of the materials I have supplied, nor are they liable for any damages arising out of or connected to the use or inability to use their web site, www.strawhat-auditions.com. I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it engaged in any way in the operation of a talent or employment agency. I do not expect StrawHat to obtain employment for me, but only to make the physical arrangements to facilitate my audition for potential theatrical employers. Any employment related transactions are solely between me and a theatrical employer with no commission or management fee due or payable to <i>StrawHat Auditions.</i></p>
                        </div>
    </div>
    </div>
@endsection