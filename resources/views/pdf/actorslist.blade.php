<style>
    .bvody{width: 750px;}
    .table-all{width: 100%;}
    .table-all td{text-align: left;vertical-align:top;}
    td.pad2{padding: 0 4px; 0 0;}
    td.border-bottom{border-bottom: 2px solid black;}
    td.border-top{border-top: 2px solid black;}
    .page-break{page-break-after: always;}
    .table-all table{
        margin: 0;
        padding: 0;
    }
    .table-all table td{
        margin: 0;
        padding: 0;
    }
</style>
@if(count($actorDay))
@foreach($actorDay as $actor)
    <div class="bvody page-break">
        <table class="table-all" border="0">
            <tr>
                <td colspan="4" class="border-bottom">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 25%"><img width="122px" height="93x" src="{{ asset('assets/images/listlogo.jpg') }}"/></td>
                            <td style="text-align: center; text-transform: uppercase; font-weight: bold; width: 40%">{{$actor['first_name'].' '.$actor['last_name']}}</td>
                            <?php $time = \Carbon\Carbon::parse($actor['adminAudition_time']);
                            $now = $time->format('g:i A');
                            ?>
                            <td style="text-align: center; width: 35%">{{$actor['adminAudition_day'].' '.$now}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table style="width: 100%">
                        <tr>
                            <td class="border-bottom">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 25%" class="pad2"><strong>Hair:</strong> {{$actor['hair']}}</td>
                                        <td style="width: 25%" class="pad2"><strong>Eyes:</strong>{{ $actor['eyes'] }}</td>
                                        <td style="width: 25%" class="pad2"><strong>Ht:</strong> {{$actor['feet']."'".$actor['inch']}}</td>
                                        <td style="width: 25%" class="pad2"><strong>Wt:</strong> {{$actor['weight'].' lbs'}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Ethnicity:</strong> {{$actor['ethnicity']}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 33%"><strong>Phone:</strong></td>
                                        <td style="width: 33%"><strong>E-mail:</strong></td>
                                        <td style="width: 33%"><strong>Available:</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 33%">{{$actor['phone_number']}}</td>
                                        <td style="width: 33%"><a href="mailTo:{{ $email[$actor['user_id']][0]['email'] }}">{{ $email[$actor['user_id']][0]['email'] }}</a></td>
                                        <?php $start_date = \Carbon\Carbon::parse($actor['from']);
                                        $from = $start_date->format('m/d/Y');
                                        $end_date = \Carbon\Carbon::parse($actor['to']);
                                        $to = $end_date->format('m/d/Y');
                                        ?>
                                        <td style="width: 33%">{{$from.' to'.$to}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 33%"><strong>Instrument:</strong></td>
                                        <td style="width: 33%"><strong>Will Consider:</strong></td>
                                        <td style="width: 33%"><strong>Gender</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 33%">{{preg_replace("(,)",", ",$actor['instrument'])}}</td>
                                        <td style="width: 33%">{{preg_replace("(,)",", ",$actor['jobType'])}}</td>
                                        <td style="width: 33%">{{$actor['gender']}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 33%"><strong>Range:</strong></td>
                                        <td style="width: 33%"><strong>Websites:</strong></td>
                                        <td style="width: 33%"><strong>Misc</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 33%">{{$actor['vocalRange']}}</td>
                                        <td style="width: 33%"><a href="http://{{$actor['website_url']}}">{{strlen($actor['website_url']) > 21 ? substr($actor['website_url'], 0, 15) . '...' : $actor['website_url']}}</a></td>
                                        <td style="width: 33%">{{preg_replace("(,)",", ",$actor['misc'])}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <img width="200px" height="200px" src="{{asset($actor['photo_path'])}}"/>
                </td>
            </tr>
            <tr>
                <td colspan="4"  class="border-top border-bottom">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 25%"><strong>Role</strong></td>
                            <td style="width: 25%"><strong>Show</strong></td>
                            <td style="width: 25%"><strong>Theatre</strong></td>
                            <td style="width: 25%"><strong>Dir/Choreo/Other</strong></td>
                        </tr>
                        @foreach(@$roles[$actor['user_id']] as $role)
                            <tr>
                                <td style="width: 25%">{{strlen($role['roles_chosen']) > 31 ? substr($role['roles_chosen'], 0, 25) . '...' : $role['roles_chosen']}}</td>
                                <td style="width: 25%">{{strlen($role['show']) > 31 ? substr($role['show'], 0, 25) . '...' :$role['show']}}</td>
                                <td style="width: 25%">{{strlen($role['theater']) > 31 ? substr($role['theater'], 0, 25) . '...' : $role['theater']}}</td>
                                <td style="width: 25%">{{strlen($role['dir_chor']) > 31 ? substr($role['dir_chor'], 0, 25) . '...' : $role['dir_chor']}}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 25%"><strong>Dance:</strong></td>
                            <td style="width: 75%">{{preg_replace("(,)",", ",$actor['dance'])}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%"><strong>Technical skills:</strong></td>
                            <td style="width: 75%">{{preg_replace("(,)",", ",$actor['technical'])}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%"><strong>Schools:</strong></td>
                            <td style="width: 75%">{{$actor['school']}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%"><strong>Audition Type:</strong></td>
                            <td style="width: 75%">{{$actor['auditionType']}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endforeach
@endif
