@if(count($dayactor))
@foreach($dayactor as $actor)
<STYLE type="text/css">

    body {margin-top: 0px;margin-left: 0px;}

    #page_1 {position:relative; overflow: hidden;margin: 63px 0px 75px 147px;padding: 0px;border: none;width: 669px;}
    #page_1 #id_1 {border:none;margin: 0px 0px 0px 128px;padding: 0px;border:none;width: 541px;overflow: hidden;}
    #page_1 #id_1 #id_1_1 {float:left;border:none;margin: 36px 0px 0px 0px;padding: 0px;border:none;width: 292px;overflow: hidden;}
    #page_1 #id_1 #id_1_2 {float:left;border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 249px;overflow: hidden;}
    #page_1 #id_2 {border:none;margin: 37px 0px 0px 1px;padding: 0px;border:none;width: 668px;overflow: hidden;}

    #page_1 #p1dimg1 {position:absolute;top:4px;left:0px;z-index:-1;width:522px;height:767px;}
    #page_1 #p1dimg1 #p1img1 {width:522px;height:767px;}




    .ft0{font: bold 23px 'Arial';text-decoration: underline;line-height: 27px;}
    .ft1{font: bold 17px 'Arial';line-height: 19px;}
    .ft2{font: italic bold 13px 'Arial';line-height: 16px;}
    .ft3{font: italic 13px 'Arial';line-height: 16px;}
    .ft4{font: bold 14px 'Arial';line-height: 16px;}
    .ft5{font: 1px 'Arial';line-height: 1px;}
    .ft6{font: 14px 'Arial';line-height: 16px;}
    .ft7{font: 14px 'Arial';text-decoration: underline;line-height: 16px;}
    .ft8{font: 14px 'Arial';text-decoration: underline;color: #0066cc;line-height: 16px;}
    .ft9{font: italic 14px 'Arial';text-decoration: underline;line-height: 16px;}
    .ft10{font: italic 14px 'Arial';line-height: 16px;}
    .ft11{font: 13px 'Arial';line-height: 16px;}
    .ft12{font: 10px 'Arial';line-height: 11px;}
    .ft13{font: 1px 'Arial';line-height: 11px;}
    .ft14{font: 10px 'Arial';line-height: 12px;}
    .ft15{font: 1px 'Arial';line-height: 12px;}

    .p0{text-align: left;margin-top: 0px;margin-bottom: 0px;}
    .p1{text-align: right;padding-right: 149px;margin-top: 5px;margin-bottom: 0px;}
    .p2{text-align: left;padding-left: 14px;margin-top: 0px;margin-bottom: 0px;}
    .p3{text-align: left;padding-left: 121px;margin-top: 2px;margin-bottom: 0px;}
    .p4{text-align: left;padding-left: 119px;margin-top: 4px;margin-bottom: 0px;}
    .p5{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
    .p6{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
    .p7{text-align: left;padding-left: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
    .p8{text-align: left;padding-left: 26px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}

    .td0{padding: 0px;margin: 0px;width: 80px;vertical-align: bottom;}
    .td1{padding: 0px;margin: 0px;width: 59px;vertical-align: bottom;}
    .td2{padding: 0px;margin: 0px;width: 107px;vertical-align: bottom;}
    .td3{padding: 0px;margin: 0px;width: 145px;vertical-align: bottom;}
    .td4{padding: 0px;margin: 0px;width: 127px;vertical-align: bottom;}
    .td5{padding: 0px;margin: 0px;width: 311px;vertical-align: bottom;}
    .td6{padding: 0px;margin: 0px;width: 166px;vertical-align: bottom;}
    .td7{padding: 0px;margin: 0px;width: 246px;vertical-align: bottom;}
    .td8{padding: 0px;margin: 0px;width: 139px;vertical-align: bottom;}
    .td9{padding: 0px;margin: 0px;width: 391px;vertical-align: bottom;}

    .tr0{height: 23px;}
    .tr1{height: 16px;}
    .tr2{height: 18px;}
    .tr3{height: 20px;}
    .tr4{height: 21px;}
    .tr5{height: 46px;}
    .tr6{height: 17px;}
    .tr7{height: 27px;}
    .tr8{height: 11px;}
    .tr9{height: 12px;}
    .tr10{height: 19px;}

    .t0{width: 518px;margin-top: 6px;font: 14px 'Arial';}

</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
    <DIV id="p1dimg1">
        <IMG src="" alt=""></DIV>


    <DIV id="id_1">
        <DIV id="id_1_1">
            <P class="p0 ft0">{{$actor['first_name'].' '.$actor['last_name']}}</P>
        </DIV>
        <DIV id="id_1_2">
            <P class="p0 ft1">{{$actor['adminAudition_day'].' '.$actor['adminAudition_time']}}</P>
            <P class="p1 ft1">{{$actor['auditionType']}}</P>
        </DIV>
    </DIV>
    <DIV id="id_2">
        <P class="p2 ft3"><SPAN class="ft2">Hair: </SPAN>{{ $actor['hair'] }} * <SPAN class="ft2">Eyes: </SPAN>{{ $actor['eyes'] }} * <SPAN class="ft2">Ht: </SPAN>{{ $actor['feet'].' feet, '.$actor['inch'].' inches' }} * <SPAN class="ft2">Wt: </SPAN>{{ $actor['weight'] }}lbs *</P>
        <P class="p3 ft2">Age: <NOBR><SPAN class="ft3">{{$actor['age']}}</SPAN></NOBR></P>
        <P class="p4 ft2">Ethnicity: <SPAN class="ft3">{{$actor['ethnicity']}} *</SPAN></P>
        <TABLE cellpadding=0 cellspacing=0 class="t0">
            <TR>
                <TD class="tr0 td0"><P class="p5 ft4">Phone:</P></TD>
                <TD class="tr0 td1"><P class="p6 ft4"><NOBR>E-mail:</NOBR></P></TD>
                <TD class="tr0 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr0 td3"><P class="p7 ft4">Available:</P></TD>
                <TD class="tr0 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr1 td0"><P class="p5 ft6"><NOBR>{{$actor['phone_number']}}</NOBR></P></TD>
                <TD colspan=3 class="tr1 td5"><P class="p6 ft8">{{$actor->user['email']}} <NOBR><SPAN class="ft7">{{$actor['from']}}</SPAN></NOBR><SPAN class="ft7"> to</SPAN></P></TD>
                <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p5 ft6">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p7 ft7"><NOBR>{{$actor['to']}}</NOBR></P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr3 td0"><P class="p5 ft4">Applied</P></TD>
                <TD colspan=2 class="tr3 td6"><P class="p6 ft4">Will consider:</P></TD>
                <TD class="tr3 td3"><P class="p7 ft8">CLICK HERE</P></TD>
                <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr1 td0"><P class="p5 ft4">as:</P></TD>
                <TD class="tr1 td1"><P class="p6 ft6">{{$actor->user['role']}}</P></TD>
                <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td3"><P class="p7 ft8">FOR FULL</P></TD>
                <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr1 td0"><P class="p5 ft6">{{$actor['audition_type']}}</P></TD>
                <TD class="tr1 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td3"><P class="p7 ft8">RESUME</P></TD>
                <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p5 ft6">Audition</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr3 td0"><P class="p5 ft4">Range:</P></TD>
                <TD class="tr3 td1"><P class="p6 ft4">Unions:</P></TD>
                <TD class="tr3 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr3 td3"><P class="p7 ft4">Websites:</P></TD>
                <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p5 ft6">{{$actor['vocalRange']}}</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD colspan=3 class="tr4 td7"><P class="p5 ft10"><SPAN class="ft4">Location: </SPAN><SPAN class="ft9">New York City, Northeast</SPAN></P></TD>
                <TD class="tr4 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr4 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td0"><P class="p6 ft4">Role</P></TD>
                <TD class="tr5 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr5 td2"><P class="p6 ft4">Show</P></TD>
                <TD class="tr5 td3"><P class="p6 ft4">Theatre</P></TD>
                <TD class="tr5 td4"><P class="p6 ft4">Dir/Choreo/Other</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Gaston</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Beauty and the</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Frank</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Beast</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Sansone</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Young</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">A Christmas</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">National Tour</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD colspan=2 class="tr1 td8"><P class="p6 ft6">Scrooge/Wiggins</P></TD>
                <TD class="tr1 td2"><P class="p6 ft6">Carol</P></TD>
                <TD class="tr1 td3"><P class="p6 ft6">(PerSeverance</P></TD>
                <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Productions)</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Roger</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">A New Brain</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">New York City Center</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Dir: James Lapine</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6"><NOBR>(Pre-Production)</NOBR></P></TD>
                <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr6 td0"><P class="p6 ft6">Nazi Officer</P></TD>
                <TD class="tr6 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr6 td2"><P class="p6 ft6">Letters to Sala</P></TD>
                <TD class="tr6 td3"><P class="p6 ft6">The Barrow Group</P></TD>
                <TD class="tr6 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6"><NOBR>(Off-Broadway,</NOBR> NYC)</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Menelaus</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Iphigenia 2.0</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Rita Morgenthau</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Dir: Megan Campisi</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Theater, NYC</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Lt.</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Guys and Dolls</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Andrew</P></TD>
            </TR>
            <TR>
                <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Brannigan/Ensemble</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Parker</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">U.S. Lewis/</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Pippin</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Randy</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Ensemble</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                <TD class="tr2 td4"><P class="p6 ft6">Conti</P></TD>
            </TR>
            <TR>
                <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Diggory Venn</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Unturning (A</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Hudson Guild Theater,</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">New Musical)</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">NYC</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Chorus/2nd Athenian</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Lysistrata</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">13th Street Rep</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">Theater, NYC</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft6">Dan Hatcher</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Sweet Bird of</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">The Gallery Players,</P></TD>
                <TD class="tr2 td4"><P class="p6 ft11">Dir: Jesse Marchese</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr2 td2"><P class="p6 ft6">Youth</P></TD>
                <TD class="tr2 td3"><P class="p6 ft6">NYC</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr7 td0"><P class="p6 ft4">Dance:<SPAN class="ft6">(yrs)</SPAN></P></TD>
                <TD colspan=3 class="tr7 td5"><P class="p8 ft6">Musical Theatre(1), Jazz(2),</P></TD>
                <TD class="tr7 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td0"><P class="p6 ft4">Technical</P></TD>
                <TD colspan=3 class="tr2 td5"><P class="p8 ft6">Set Construction(2), Stage Management(1),</P></TD>
                <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr1 td0"><P class="p6 ft4">Skills:</P></TD>
                <TD class="tr1 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD colspan=2 class="tr8 td8"><P class="p6 ft12">Levels: Beginning (1),</P></TD>
                <TD class="tr8 td2"><P class="p6 ft13">&nbsp;</P></TD>
                <TD class="tr8 td3"><P class="p6 ft13">&nbsp;</P></TD>
                <TD class="tr8 td4"><P class="p6 ft13">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr8 td0"><P class="p6 ft12">Good(2),</P></TD>
                <TD class="tr8 td1"><P class="p6 ft13">&nbsp;</P></TD>
                <TD class="tr8 td2"><P class="p6 ft13">&nbsp;</P></TD>
                <TD class="tr8 td3"><P class="p6 ft13">&nbsp;</P></TD>
                <TD class="tr8 td4"><P class="p6 ft13">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr9 td0"><P class="p6 ft14">Excellent(3)</P></TD>
                <TD class="tr9 td1"><P class="p6 ft15">&nbsp;</P></TD>
                <TD class="tr9 td2"><P class="p6 ft15">&nbsp;</P></TD>
                <TD class="tr9 td3"><P class="p6 ft15">&nbsp;</P></TD>
                <TD class="tr9 td4"><P class="p6 ft15">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD colspan=4 class="tr10 td9"><P class="p6 ft6"><SPAN class="ft4">Other Skills: </SPAN>Stage Combat, Shakespeare, Improv,</P></TD>
                <TD class="tr10 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr6 td0"><P class="p6 ft6">(proficient)</P></TD>
                <TD class="tr6 td1"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr6 td2"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr6 td3"><P class="p6 ft5">&nbsp;</P></TD>
                <TD class="tr6 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr3 td0"><P class="p6 ft4">Schools:</P></TD>
                <TD colspan=3 class="tr3 td5"><P class="p8 ft6">The Neighborhood Playhouse</P></TD>
                <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
            </TR>
        </TABLE>
    </DIV>
</DIV>
</BODY>
@endforeach
@endif
@if(count($standbyactor)>0)
@foreach($standbyactor as $actor)
    <STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}

        #page_1 {position:relative; overflow: hidden;margin: 63px 0px 75px 147px;padding: 0px;border: none;width: 669px;}
        #page_1 #id_1 {border:none;margin: 0px 0px 0px 128px;padding: 0px;border:none;width: 541px;overflow: hidden;}
        #page_1 #id_1 #id_1_1 {float:left;border:none;margin: 36px 0px 0px 0px;padding: 0px;border:none;width: 292px;overflow: hidden;}
        #page_1 #id_1 #id_1_2 {float:left;border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 249px;overflow: hidden;}
        #page_1 #id_2 {border:none;margin: 37px 0px 0px 1px;padding: 0px;border:none;width: 668px;overflow: hidden;}

        #page_1 #p1dimg1 {position:absolute;top:4px;left:0px;z-index:-1;width:522px;height:767px;}
        #page_1 #p1dimg1 #p1img1 {width:522px;height:767px;}




        .ft0{font: bold 23px 'Arial';text-decoration: underline;line-height: 27px;}
        .ft1{font: bold 17px 'Arial';line-height: 19px;}
        .ft2{font: italic bold 13px 'Arial';line-height: 16px;}
        .ft3{font: italic 13px 'Arial';line-height: 16px;}
        .ft4{font: bold 14px 'Arial';line-height: 16px;}
        .ft5{font: 1px 'Arial';line-height: 1px;}
        .ft6{font: 14px 'Arial';line-height: 16px;}
        .ft7{font: 14px 'Arial';text-decoration: underline;line-height: 16px;}
        .ft8{font: 14px 'Arial';text-decoration: underline;color: #0066cc;line-height: 16px;}
        .ft9{font: italic 14px 'Arial';text-decoration: underline;line-height: 16px;}
        .ft10{font: italic 14px 'Arial';line-height: 16px;}
        .ft11{font: 13px 'Arial';line-height: 16px;}
        .ft12{font: 10px 'Arial';line-height: 11px;}
        .ft13{font: 1px 'Arial';line-height: 11px;}
        .ft14{font: 10px 'Arial';line-height: 12px;}
        .ft15{font: 1px 'Arial';line-height: 12px;}

        .p0{text-align: left;margin-top: 0px;margin-bottom: 0px;}
        .p1{text-align: right;padding-right: 149px;margin-top: 5px;margin-bottom: 0px;}
        .p2{text-align: left;padding-left: 14px;margin-top: 0px;margin-bottom: 0px;}
        .p3{text-align: left;padding-left: 121px;margin-top: 2px;margin-bottom: 0px;}
        .p4{text-align: left;padding-left: 119px;margin-top: 4px;margin-bottom: 0px;}
        .p5{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p6{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p7{text-align: left;padding-left: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p8{text-align: left;padding-left: 26px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}

        .td0{padding: 0px;margin: 0px;width: 80px;vertical-align: bottom;}
        .td1{padding: 0px;margin: 0px;width: 59px;vertical-align: bottom;}
        .td2{padding: 0px;margin: 0px;width: 107px;vertical-align: bottom;}
        .td3{padding: 0px;margin: 0px;width: 145px;vertical-align: bottom;}
        .td4{padding: 0px;margin: 0px;width: 127px;vertical-align: bottom;}
        .td5{padding: 0px;margin: 0px;width: 311px;vertical-align: bottom;}
        .td6{padding: 0px;margin: 0px;width: 166px;vertical-align: bottom;}
        .td7{padding: 0px;margin: 0px;width: 246px;vertical-align: bottom;}
        .td8{padding: 0px;margin: 0px;width: 139px;vertical-align: bottom;}
        .td9{padding: 0px;margin: 0px;width: 391px;vertical-align: bottom;}

        .tr0{height: 23px;}
        .tr1{height: 16px;}
        .tr2{height: 18px;}
        .tr3{height: 20px;}
        .tr4{height: 21px;}
        .tr5{height: 46px;}
        .tr6{height: 17px;}
        .tr7{height: 27px;}
        .tr8{height: 11px;}
        .tr9{height: 12px;}
        .tr10{height: 19px;}

        .t0{width: 518px;margin-top: 6px;font: 14px 'Arial';}

    </STYLE>
    </HEAD>

    <BODY>
    <DIV id="page_1">
        <DIV id="p1dimg1">
            <IMG src="" alt=""></DIV>


        <DIV id="id_1">
            <DIV id="id_1_1">
                <P class="p0 ft0">Thanos Skouteris</P>
            </DIV>
            <DIV id="id_1_2">
                <P class="p0 ft1">Friday 10:00</P>
                <P class="p1 ft1">Singer</P>
            </DIV>
        </DIV>
        <DIV id="id_2">
            <P class="p2 ft3"><SPAN class="ft2">Hair: </SPAN>Dark Brown * <SPAN class="ft2">Eyes: </SPAN>Hazel * <SPAN class="ft2">Ht: </SPAN>6, 0 * <SPAN class="ft2">Wt: </SPAN>175 lbs *</P>
            <P class="p3 ft2">Age Range: <NOBR><SPAN class="ft3">21-25</SPAN></NOBR></P>
            <P class="p4 ft2">Role Type: <SPAN class="ft3">White *</SPAN></P>
            <TABLE cellpadding=0 cellspacing=0 class="t0">
                <TR>
                    <TD class="tr0 td0"><P class="p5 ft4">Phone:</P></TD>
                    <TD class="tr0 td1"><P class="p6 ft4"><NOBR>E-mail:</NOBR></P></TD>
                    <TD class="tr0 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr0 td3"><P class="p7 ft4">Available:</P></TD>
                    <TD class="tr0 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr1 td0"><P class="p5 ft6"><NOBR>678-850-</NOBR></P></TD>
                    <TD colspan=3 class="tr1 td5"><P class="p6 ft8">thanoskouteris@gmail.com <NOBR><SPAN class="ft7">2017-01-01</SPAN></NOBR><SPAN class="ft7"> to</SPAN></P></TD>
                    <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p5 ft6">8869</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p7 ft7"><NOBR>2018-12-31</NOBR></P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr3 td0"><P class="p5 ft4">Applied</P></TD>
                    <TD colspan=2 class="tr3 td6"><P class="p6 ft4">Will consider:</P></TD>
                    <TD class="tr3 td3"><P class="p7 ft8">CLICK HERE</P></TD>
                    <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr1 td0"><P class="p5 ft4">as:</P></TD>
                    <TD class="tr1 td1"><P class="p6 ft6">None</P></TD>
                    <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td3"><P class="p7 ft8">FOR FULL</P></TD>
                    <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr1 td0"><P class="p5 ft6">Singing</P></TD>
                    <TD class="tr1 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td3"><P class="p7 ft8">RESUME</P></TD>
                    <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p5 ft6">Audition</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr3 td0"><P class="p5 ft4">Range:</P></TD>
                    <TD class="tr3 td1"><P class="p6 ft4">Unions:</P></TD>
                    <TD class="tr3 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr3 td3"><P class="p7 ft4">Websites:</P></TD>
                    <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p5 ft6">Baritone</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD colspan=3 class="tr4 td7"><P class="p5 ft10"><SPAN class="ft4">Location: </SPAN><SPAN class="ft9">New York City, Northeast</SPAN></P></TD>
                    <TD class="tr4 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr4 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr5 td0"><P class="p6 ft4">Role</P></TD>
                    <TD class="tr5 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr5 td2"><P class="p6 ft4">Show</P></TD>
                    <TD class="tr5 td3"><P class="p6 ft4">Theatre</P></TD>
                    <TD class="tr5 td4"><P class="p6 ft4">Dir/Choreo/Other</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Gaston</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Beauty and the</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Frank</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Beast</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Sansone</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Young</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">A Christmas</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">National Tour</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD colspan=2 class="tr1 td8"><P class="p6 ft6">Scrooge/Wiggins</P></TD>
                    <TD class="tr1 td2"><P class="p6 ft6">Carol</P></TD>
                    <TD class="tr1 td3"><P class="p6 ft6">(PerSeverance</P></TD>
                    <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Productions)</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Roger</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">A New Brain</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">New York City Center</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Dir: James Lapine</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6"><NOBR>(Pre-Production)</NOBR></P></TD>
                    <TD class="tr2 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr6 td0"><P class="p6 ft6">Nazi Officer</P></TD>
                    <TD class="tr6 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr6 td2"><P class="p6 ft6">Letters to Sala</P></TD>
                    <TD class="tr6 td3"><P class="p6 ft6">The Barrow Group</P></TD>
                    <TD class="tr6 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6"><NOBR>(Off-Broadway,</NOBR> NYC)</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Menelaus</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Iphigenia 2.0</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Rita Morgenthau</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Dir: Megan Campisi</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Theater, NYC</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Lt.</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Guys and Dolls</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Andrew</P></TD>
                </TR>
                <TR>
                    <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Brannigan/Ensemble</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Parker</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">U.S. Lewis/</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Pippin</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">The Woodstock</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Dir/Choreo: Randy</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Ensemble</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Playhouse</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft6">Conti</P></TD>
                </TR>
                <TR>
                    <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Diggory Venn</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Unturning (A</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Hudson Guild Theater,</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">New Musical)</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">NYC</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD colspan=2 class="tr2 td8"><P class="p6 ft6">Chorus/2nd Athenian</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Lysistrata</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">13th Street Rep</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">Theater, NYC</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft6">Dan Hatcher</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Sweet Bird of</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">The Gallery Players,</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft11">Dir: Jesse Marchese</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr2 td2"><P class="p6 ft6">Youth</P></TD>
                    <TD class="tr2 td3"><P class="p6 ft6">NYC</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr7 td0"><P class="p6 ft4">Dance:<SPAN class="ft6">(yrs)</SPAN></P></TD>
                    <TD colspan=3 class="tr7 td5"><P class="p8 ft6">Musical Theatre(1), Jazz(2),</P></TD>
                    <TD class="tr7 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr2 td0"><P class="p6 ft4">Technical</P></TD>
                    <TD colspan=3 class="tr2 td5"><P class="p8 ft6">Set Construction(2), Stage Management(1),</P></TD>
                    <TD class="tr2 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr1 td0"><P class="p6 ft4">Skills:</P></TD>
                    <TD class="tr1 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr1 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD colspan=2 class="tr8 td8"><P class="p6 ft12">Levels: Beginning (1),</P></TD>
                    <TD class="tr8 td2"><P class="p6 ft13">&nbsp;</P></TD>
                    <TD class="tr8 td3"><P class="p6 ft13">&nbsp;</P></TD>
                    <TD class="tr8 td4"><P class="p6 ft13">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr8 td0"><P class="p6 ft12">Good(2),</P></TD>
                    <TD class="tr8 td1"><P class="p6 ft13">&nbsp;</P></TD>
                    <TD class="tr8 td2"><P class="p6 ft13">&nbsp;</P></TD>
                    <TD class="tr8 td3"><P class="p6 ft13">&nbsp;</P></TD>
                    <TD class="tr8 td4"><P class="p6 ft13">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr9 td0"><P class="p6 ft14">Excellent(3)</P></TD>
                    <TD class="tr9 td1"><P class="p6 ft15">&nbsp;</P></TD>
                    <TD class="tr9 td2"><P class="p6 ft15">&nbsp;</P></TD>
                    <TD class="tr9 td3"><P class="p6 ft15">&nbsp;</P></TD>
                    <TD class="tr9 td4"><P class="p6 ft15">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD colspan=4 class="tr10 td9"><P class="p6 ft6"><SPAN class="ft4">Other Skills: </SPAN>Stage Combat, Shakespeare, Improv,</P></TD>
                    <TD class="tr10 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr6 td0"><P class="p6 ft6">(proficient)</P></TD>
                    <TD class="tr6 td1"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr6 td2"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr6 td3"><P class="p6 ft5">&nbsp;</P></TD>
                    <TD class="tr6 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
                <TR>
                    <TD class="tr3 td0"><P class="p6 ft4">Schools:</P></TD>
                    <TD colspan=3 class="tr3 td5"><P class="p8 ft6">The Neighborhood Playhouse</P></TD>
                    <TD class="tr3 td4"><P class="p6 ft5">&nbsp;</P></TD>
                </TR>
            </TABLE>
        </DIV>
    </DIV>
    </BODY>
@endforeach
@endif