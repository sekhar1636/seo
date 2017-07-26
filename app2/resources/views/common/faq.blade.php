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
                                        <strong>Application deadline is February 1st.</strong> This means that ALL materials – email and hard copy – must be delivered to our office by <strong>NOON</strong> of that day. If you are using a courier, be sure they can confirm delivery on that day. Better yet, apply early!
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> What theatres/companies have attended the StrawHats in the past?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> StrawHat Auditions have been assisting performers and theatre companies for over 30 years. <a href="{{route('getYounger')}}">Click here for a list of past participating theatres</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> How old do I have to be to audition?</a>
                                    </h4>
                                </div>
                                <div id="collapse_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Applicants must be 18 years or older at the time they start work. <a href="{{route('getYounger')}}">Click Here for some theatre programs for younger actors.</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"> What are the different types of auditions?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> There are 4 types of auditions: Song and Monologue, Monologue Only, Dancers Who Sing, and a set number of Stand-By appointments for each day. <a href="pdf/aud_type.pdf">Click here for AUDITION TYPES.</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">Can I apply for two different types of audition?</a>
                                    </h4>
                                </div>
                                <div id="collapse_5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> No, you should apply for the category where you can present yourself at your best. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6"> What is a self-addressed stamped #10 envelope?</a>
                                    </h4>
                                </div>
                                <div id="collapse_6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> A business-size envelope fits a standard piece of paper folded in thirds and requires only a single USPS Forever Stamp for delivery. These envelopes are used for our correspondence to you, so they do not have to be any larger.  <a href="pdf/envelope.pdf">Click here for an illustration.</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7"> Why should the picture I use be of professional quality? Is it OK to send laser copies?</a>
                                    </h4>
                                </div>
                                <div id="collapse_7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Every actor who registers for StrawHat has an online profile that includes picture and resume. Those profile pages are used to create the audition directories that the producers use during the audition. Your picture is your calling card and it should be of good quality to present you at your best. Plain paper laser copies should only be used as a last resort. Your submission should be as professional as possible. Read our advice on head shots in the Actor Application section. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_8"> What happens if I send you just a picture and resume?</a>
                                    </h4>
                                </div>
                                <div id="collapse_8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Nothing. We only accept complete applications. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_9"> Can I submit my application by email? </a>
                                    </h4>
                                </div>
                                <div id="collapse_9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>There are three steps to a complete application. You must follow all three steps and submit ALL the required materials before the deadline date to be considered for an audition .<a href="pdf/application_structure.pdf">(see APPLICATION INSTRUCTIONS)</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_10"> I forgot my User Name/Password. What do I do?</a>
                                    </h4>
                                </div>
                                <div id="collapse_10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Performers: Go to the actor application page and use the <strong>ACTOR Reset Username/Password link</strong>. 
Staff Tech Design: Go to the Staff Tech application page and use the <strong>STAFF TECH Reset Username/Password link. </strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_11"> Where do I find my User ID Number? </a>
                                    </h4>
                                </div>
                                <div id="collapse_11" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Your User ID Number is located in the last line of the header on your application print out. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_12"> How do I access my application to complete it/make changes? </a>
                                    </h4>
                                </div>
                                <div id="collapse_12" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> On the home page, click on Performers and in the next screen you will see a menu item called Change Actor Application. Follow the prompts to access your page. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_13"> How do I print out the application? </a>
                                    </h4>
                                </div>
                                <div id="collapse_13" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> On the home page, click on Performers and in the next screen you will see a menu item called Change Actor Application. Follow the prompts to access your page. Select Print Application, and use Ctrl+P to print. Staff Tech Design applicants do not have to print out their application. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_14"> How can I be sure StrawHat has received my application materials?</a>
                                    </h4>
                                </div>
                                <div id="collapse_14" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Once we activate your online profile, every time you log into the Members Area you will be greeted with a screen that states your name and your status: i.e. "Your registration was accepted on (date of activation)" and once selected to audition, your greeting screen will tell you that, too. You will also receive a confirmation letter in the mail via the first of the two self-addressed, stamped envelopes you provided with your application, and an email via Mail Chimp</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_15">How long before I hear about my application/audition status?</a>
                                    </h4>
                                </div>
                                <div id="collapse_15" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Typically, it takes 2 to 4 weeks to activate your Member registration and make a determination on your application for an audition. However, with the volume of mail we receive, it can take longer. Every application is given consideration, and there are times when we are unwilling to make an immediate decision either for or against a candidate: in those cases, a second and even third assessment are made.</p>
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
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">I can't access the Members Area. What do I do? </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> You do not have access to the Members Area until we have received your complete application and we activate your account. You will receive notification via email and snail mail to confirm your registration status.<strong> If you are attempting to access your application to complete it or make changes, please refer to the previous FAQ section. </strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> How long does it take for my OnLine profile to be activated? </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> If your emailed picture and resume (Step 1) are already in our inbox when we receive your hardcopy materials, it should take no more than 2 weeks to activate your account, but mail volume can slow processing. </p>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4"> How do I find my profile?  </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Click on Actor Search in the menu at the top of the page, then click on Search Actors by Last Name and follow the prompts.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5"> My picture/resume isn't showing up on my profile page. What do I do? </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>

                                        Email us at <a href="mailto:info@strawhat-auditions.com">info@strawhat-auditions.com</a> and 
                                        resubmit the electronic file. Remember: photos must be .jpg files and resumes must be 
                                        one-page .pdf files. <b>NOTE:</b> Your name and StrawHat ID number must appear in the 
                                        subject line of your email.</p> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_6"> How do I make corrections to my OnLine profile?  </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> On the home page, click on Performers and in the next screen you will see a menu item called Change Actor Application. Follow the prompts to access your page. You can update your page as often as you like, BUT be aware that we use your originally submitted application print out for the audition selection process. </p>
                                    </div>
                                </div>
                            </div>
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_7"> How do I replace my picture/resume on line?  </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>

                                        Email us at <a href="mailto:info@strawhat-auditions.com">info@strawhat-auditions.com</a> and 
                                        submit the new electronic file. Remember: photos must be .jpg files and resumes must be 
                                        one-page .pdf files. The subject line of your email should read: Last Name, First Name, 
                                        ID Number, REPLACEMENT PHOTO (or resume).</p>
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
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_1"> Is StrawHat First Come, First Served? How do you choose performers for the auditions? </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> We have a selection process to insure that theatre and casting representatives are seeing the best group of candidates possible. Click <a href="pdf/criteria.pdf">HERE</a> for Selection Criteria. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2">How long does it take for me to find out if I get an audition? </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> We do or very best to make a determination on all applications within 4 weeks of activating registration. However, sometimes there are delays, usually due to mail volume. Apply early for faster processing. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_3"> How do I find out my audition day and time?</a>
                                    </h4>
                                </div>
                                <div id="collapse_2_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> When you are scheduled for an appointment, we email you a notice and mail you a confirmation sheet with all the pertinent information using the second self-addressed stamped envelope you provided. We also post an alphabetical list of scheduled actors in the Members Area of the web site once the schedule is set. You can use this list to confirm your appointment day and time. </p>
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
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_1"> Can I change my scheduled audition time?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>

                                        Email us at <a href="mailto:info@strawhat-auditions.com">info@strawhat-auditions.com</a> Provide
                                         <b><i>both</i></b> your scheduled day and time and the day you would like to change to. 
                                         <b><i>IF</i></b> we can accommodate you, we will email you the new details. There is a $25 
                                         service fee for appointment changes. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_2"> How do I cancel my audition?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> To cancel your audition, simply email us with your name, ID number and audition day and time. We will confirm receipt of your cancellation by email. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_3">I have to cancel. Can I give my appointment to a friend? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><b> No</b>. All actors that get an audition are pre-screened. Your audition time is yours alone and cannot be transferred to another actor. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_4"> I have to cancel. Can I get a refund? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> If you are not selected to audition, we return your fee, but if you are scheduled for an appointment and choose not to attend, there are no refunds.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_5">How do Standby's work? Can I walk in or stand by on the day of the audition without an appointment?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>For details on Stand-By auditions, please refer to the Application Question What are the different types of auditions? in the first section of these FAQs. There are no walk-ins at StrawHat – all auditioning actors are selected in advance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_6"> How long is the audition day?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> First audition is at 10:00 am every morning, and general auditions end at 6:00. After that is the dance teaching and dance call, then individual theatre callbacks can run as late as 11:00 pm. On the last day of the event only, Dancers Who Sing learn their dance call at 1:00 pm, then their auditions start at 2:00 pm for the hour. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_7"> Do I have to be there for the whole weekend?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Nope! Your whole audition is completed in a single day. If you get a lot of callbacks, it’s a really long day, but it’s all done in a single day. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_8"> If I drive, can I park near the auditions? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> If you are from out of town and you have to drive, okay. But if you can avoid it, do. The auditions are easy to get to by subway, 10 minutes from Mid-town, and city driving is a hassle. If you do drive, we recommend parking in a garage, but be sure to confirm their operating hours, since our nights can go pretty late </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_9">How do I contact StrawHat during the week of the auditions? I lost my directions or have some other emergency!</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>

                                        If you need to reach us the week of the auditions, please use our email address 
                                        <a href="mailto:info@strawhat-auditions.com">info@strawhat-auditions.com</a>.
                                          <i>Please <b>do not</b> contact Pace University for information about auditions or 
                                          accommodations. </i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_10">Why shouldn't we wear black? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We suggest you wear clothes that have some color and show you to your best advantage. For details on full audition preparation, visit Final Prep for Auditioning Actors in the Articles section of the Members Area. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_11"> How do we time your audition? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_11" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We time your audition from the first word of your monologue or the first note of the piano, but you should time your entire presentation (introduction and pieces) to take under 90 seconds. Visit I Got an Audition Now What in the Articles section of the Members Area. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_12"> Why a list of what NOT to do? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_12" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Many of the songs and monologues cited on the Dreaded List (visit the Articles section of the Members Area) are so popular that lots of people do them. The same day, sometimes the same hour. Choosing over-used material puts you at a disadvantage. Take the opportunity to do a little research and come up with material that will be your own. But, we STRONGLY recommend you stay away from obscene or graphic material. We promise you, it’s a turn-off. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_13">Can I sing two songs instead of doing a song and monologue? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_13" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> The jury is out on this, as it affects the reaction of some casting reps and not others. Click <a href="pdf/two_songs.pdf">HERE for the official StrawHat stance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_14"> Should I do a Shakespeare monologue? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_14" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Are you trained in classical theatre? If you are auditioning with two contrasting monologues, you can choose to contrast with classic/contemporary or with comedy/drama. It’s up to you to select pieces that show you at your best. For musical theatre auditions, you can do Shakespeare for your speech but it may be more appropriate for you to do a speech from a contemporary play – chances are that companies doing musicals are more likely to have a Neil Simon play in their season rather than Hamlet. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_15"> Who are the StrawHat accompanists? </a>
                                    </h4>
                                </div>
                                <div id="collapse_4_15" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Our accompanists are professional accompanist/vocal coach/musical directors who specialize in musical theatre. You are in good hands, as long as you come ready to communicate and with your music prepared as suggested in our preparation advice. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_16">Can I bring my own accompanist?</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_16" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> Of course! But save yourself any anxiety and be sure he/she has directions, arrives on time to meet you (meaning well ahead of your scheduled appointment time) and stays with you through the audition. You have enough to think about without worrying if your accompanist is going to show up. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4_17">A thought to make you feel good</a>
                                    </h4>
                                </div>
                                <div id="collapse_4_17" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> <b>If you received an audition time,</b> you were accepted from over a thousand other applications. You'll audition for a whole lot of theaters, make new theater contacts, be called back and perhaps get a job, all in one day! StrawHat is an event that attracts lots of theater producers, directors, casting directors, etc. – and sometimes even a few who are not formally registered. Every one of us watching the auditions is eager to discover exciting new talent for the upcoming season. Have a great audition – we’re glad to have you with us!</p>
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