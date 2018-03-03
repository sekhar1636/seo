<style>
    hr{
        border-top: 1px solid black;
        background-color: black;
    }
    .page-break{
        page-break-after: always;
    }
    td.bor-bottom{
        border-bottom: 1px solid dimgrey;
    }
</style>
@if(count($standbyactor))
    @foreach($standbyactor as $actor)
        <table>
            <tr>
                <td><img src="{{ asset('assets/images/listlogo.jpg') }}"/></td><td colspan="2"><h2 style="text-align: center;">{{$actor['first_name'].' '.$actor['last_name']}}</h2></td>
                <?php $standby = substr($actor['adminAudition_standby'],0,3);
                if($standby=="fri"){
                    $stand = str_replace("fri","Friday",$actor['adminAudition_standby']);
                }
                if($standby=="sat"){
                    $stand = str_replace("sat","Saturday",$actor['adminAudition_standby']);
                }
                if($standby=="sun"){
                    $stand = str_replace("sun","Sunday",$actor['adminAudition_standby']);
                }
                ?>
                <td><p style="text-align: center;">{{$actor['adminAudition_day'].' '.$stand!="" ? $stand.' StandBy' : "" }}</p></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table>
                        <tr>
                            <td><span><strong>Hair:</strong> {{$actor['hair']}}</span></td>
                            <td><span><strong>Eyes:</strong>{{ $actor['eyes'] }}</span></td>
                            <td><span><strong>Ht:</strong> {{$actor['feet']."'".$actor['inch']}}</span></td>
                            <td><span><strong>Wt:</strong> {{$actor['weight'].' lbs'}}</span></td>
                        </tr>
                        <tr>
                            <td style="width:100px;" colspan="4"><span><strong>Ethnicity:</strong> {{$actor['ethnicity']}}</span></td>
                        </tr>
                        <tr><td class="bor-bottom" colspan="4"></td></tr>
                        <tr>
                            <td style=""><strong>Phone:</strong></td>
                            <td colspan="2"><strong>E-mail:</strong></td><td><strong>Available:</strong></td></tr><tr><td>{{$actor['phone_number']}}</td>
                            <td colspan="2"><a href="mailTo:{{$email[$actor['user_id']][0]['email']}}">{{$email[$actor['user_id']][0]['email']}}</a></td>
                            <td>{{$actor['from'].' to'.$actor['to']}}</td>
                        </tr>
                        <tr>
                            <td><strong>Instrument:</strong></td>
                            <td colspan="2"><strong>Will Consider:</strong></td>
                            <td><strong>Gender</strong></td>
                        </tr>
                        <tr>
                            <td>{{$actor['instrument']}}</td>
                            <td colspan="2">{{$actor['jobType']}}</td>
                            <td>{{$actor['gender']}}</td>
                        </tr>
                        <tr>
                            <td><strong>Range:</strong></td>
                            <td colspan="2"><strong>Websites:</strong></td>
                            <td><strong>Misc</strong></td>
                        </tr>
                        <tr>
                            <td><p>{{$actor['vocalRange']}}</p></td>
                            <td colspan="2"><p>{{$actor['website_url']}}</p></td>
                            <td><p>{{$actor['misc']}}</p></td>
                        </tr>
                    </table>
                </td>
                <td><img src="{{asset($actor['photo_path'])}}" height="277px" width="185px"/></td>
            </tr>
            <tr><td class="bor-bottom" colspan="4"></td></tr>
            <tr>
                <td style="width: 50px;"><strong>Role</strong></td>
                <td style="width: 50px;"><strong>Show</strong></td>
                <td style="width: 50px;"><strong>Theatre</strong></td>
                <td style="width: 50px;"><strong>Dir/Choreo/Other</strong></td>
            </tr>
            @foreach(@$roles[$actor['user_id']] as $role)
                <tr>
                    <td style="width: 50px;">{{$role['roles_chosen']}}</td><td style="width: 50px;">{{$role['show']}}</td><td style="width: 50px;">{{$role['theater']}}</td><td style="width: 50px;">{{$role['dir_chor']}}</td>
                </tr>
            @endforeach
            <tr><td class="bor-bottom" colspan="4"></td></tr>
            <tr><td><strong>Dance:</strong></td><td colspan="3">{{$actor['dance']}}</td></tr>
            <tr><td><strong>Technical skills:</strong></td><td colspan="3">{{$actor['technical']}}</td></tr>
            <tr><td><strong>Schools:</strong></td><td colspan="3">{{$actor['school']}}</td></tr>
            <tr><td><strong>Audition Type:</strong></td><td colspan="3">{{$actor['auditionType']}}</td></tr>
        </table>
        </hr>
        <div class="page-break"></div>
    @endforeach
@endif