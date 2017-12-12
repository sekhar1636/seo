
        <h2 style="text-align: center;"><img src="{{ asset('assets/images/straw99.gif') }}" style="width:8%; height: 8%;"/> STRAWHAT AUDITIONS APPLICATION PRINT-OUT</h2>
<p style="font-weight: bold;">Mail To: StrawHat Auditions, 1771 Post Road East #315, Westport, CT 06880</p>
        <p style="font-weight: bold;">Application Deadline: February 1st All Materials Must Be Received by Our Office as of Noon on This Date !</p>
<hr/>
<table>

    <tr><td><h4 style="font-weight: bold; text-decoration: underline;">Contact Information</h4></td><td colspan="2"></td></tr>
    <tr><td colspan="1"><p>First Name:{{ $actor[0]['first_name'] }} Last Name: {{ $actor[0]['last_name'] }}</p></td><td colspan="2"><p>AUDITION AVAILABILITY:{{ $ae[0]['friday_m']==1 ? 'Friday Morning' : null.''.$ae[0]['friday_af']==1 ? 'Friday Afternoon' : null.''.$ae[0]['saturday_m']==1 ? 'Saturday Morning' : null.''.$ae[0]['saturday_af'] ? 'Saturday Afternoon' : null.''.$ae[0]['sunday_m'] ? 'Sunday Morning' : null.''.$ae[0]['sunday_af'] ? 'Sunday Afternoon' : null }}</p></td></tr>
    <tr><td colspan="1"><p>Phone:{{ $actor[0]['phone_number'] }}</p></td><td colspan="2"><p>WOULD YOU ACCEPT A STAND-BY APPOINTMENT? {{ $ae[0]['standby_appointment']==1 ? 'Yes' : 'No' }}</p></td></tr>
    <tr><td colspan="1"><p>Email:</p></td><td colspan="2"><p>WOULD YOU CONSIDER an unpaid Apprentice position? {{ $ae[0]['unpaid_apprentice']==1 ? 'Yes' : 'No' }} </p></td></tr>
    <tr><td colspan="1"><p>DID YOU </p></td><td colspan="2"><p>An Internship Involving Crew work and performing? {{ $ae[0]['internship']==1 ? 'Yes' : 'No' }}</p></td></tr>
    <tr><td colspan="1"><p>Audition at StrawHat Last Year? {{ $ae[0]['last_audition_year']==1 ? 'Yes' : 'No' }} </p></td><td colspan="2"><p>AUDITION TYPE: {{ $actor[0]['auditionType']=='Song-n-Monologue' ? 'Song & Monologue' : $actor[0]['auditionType'] }}</p></td></tr>
    <tr><td colspan="1"><p>Apply For an Audition Last Year? {{$ae[0]['audition_last_apply']==1 ? 'Yes' : 'No' }}</p></td><td colspan="2"><p>EMPLOYMENT AVAILABILITY: {{$actor[0]['from'] }} to {{ $actor[0]['to']  }}</p></td></tr>
    <tr><td colspan="1"><p>2 Years Ago? {{ $ae[0]['last_audition_two']==1 ? 'Yes' : 'No' }}</p></td><td colspan="2"></td></tr>
    <tr><td colspan="1"><p>Last Audition Year: {{ $ae[0]['last_year_year'] != '' ? $ae[0]['last_year_year'] : null }}</p></td><td></td></tr>
    <tr><td colspan="1"><p>Do Summer Stock Last Year? {{ $ae[0]['summer_stock_last_year']==1 ? 'Yes' : 'No' }}</p></td></tr>
    <tr><td><p style="text-decoration: underline; font-weight: bold;">PERSONAL DETAILS</p></td><td colspan="3"><p style="font-weight: bold; text-decoration: underline;">SKILLS</p></td></tr>
    <tr><td colspan="1"><table><tr><td><p>Gender: {{$actor[0]['gender'] }}</p></td><td><p>Age: {{ $actor[0]['age'] }}</p></td></tr></table></td><td colspan="2"><p>Voice Range: {{ $actor[0]['vocalRange'] }}</p></td></tr>
    <tr><td colspan="1"><table><tr><td><p>Height: {{ $actor[0]['feet']  }}'ft {{ $actor[0]['inch'] }}'inches</p></td><td><p>Weight:{{ $actor[0]['weight']  }}</p></td></tr></table></td><td colspan="2"><p>Dance: {{ $actor[0]['dance'] }}</p></td></tr>
    <tr><td colspan="1"><table><tr><td><p>Hair:{{ $actor[0]['hair'] }}</p></td><td><p>Eyes: {{ $actor[0]['eyes'] }}</p></td></tr></table><td colspan="2"><p>Instruments: {{ $actor[0]['instrument'] }}</p></td></tr>
    <tr><td colspan="1"><p>Ethnicity: {{ $actor[0]['ethnicity'] }}</p></td><td colspan="2"><p>Technical: {{ $actor[0]['technical'] }}</p></td></tr>
    <tr><td colspan="1"></td><td colspan="2"><p>Misc.other skills: {{ $actor[0]['misc'] }}</p></td></tr>
    <tr><td colspan="3"><p>MAIL THIS FORM TO THE ADDRESS ABOVE ALONG WITH THE FOLLOWING ITEMS:</p></td></tr>
    <tr><td colspan="3"><ul>
                <li>One copy of your 8x10 Picture & Resume stapled back to back</li>
                <li>Your Audition Fee ($60) check or money order ONLY – do not send cash! (Don’t forget to sign it!)</li>
                <li>2 Self-Addressed Business Envelopes with postage (Forever Stamps recommended)</li>
            </ul>
            <p>I certify that I have read the StrawHat Auditions application instructions fully and that the information I have provided is truthful and correct. I understand that the registration/subscription fee I paid online is non-refundable, but that the audition fee submitted with this form will be returned to me if I am not selected for an audition appointment. I understand that StrawHat Auditions is not to be held responsible for any errors or omissions in the publication or reproduction of the materials I have supplied, nor are they liable for any damages arising out of or connected to the use or inability to use their website, www.strawhat-auditions.com. I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it engaged in any way in the operation of a talent or employment agency. I do not expect StrawHat to obtain employment for me, but only to make the physical arrangements to facilitate my audition for potential theatrical employers. Any employment transactions are solely between me and a theatrical employer with no commission or management fee due or payable to StrawHat Auditions.</p></td></tr>
    <tr><td colspan="3"><p>SIGN AND DATE BELOW:</p></td></tr>
    <tr><td colspan="3"><p>Date: ______________</p></td></tr>
    <tr><td colspan="3"><p>Signed and Acknowledged by: ________________________________________________________</p></td></tr>
</table>
@if(@$but != 'hidden')
    <br><br>
<form method="get" action="{{ route('actor::actorPdf')}}">
<button type="submit" class="btn btn-primary">Print Application</button>
    <a href="{{ route('actor::actorProfile') }}" class="btn btn-danger">Back</a>
</form>

@endif
