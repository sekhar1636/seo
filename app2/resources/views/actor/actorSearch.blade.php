

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strawhat Auditions | Advanced Search</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('search/main.css')}}">
    <link rel="stylesheet" href="{{asset('search/actorSearch.css')}}">

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
	<div class="col-md-4">
		<form class="controls">

		    <div class="filter-group" style="margin-bottom:10px;">
			    <span class="filter-group-label">Actor Details</span>  
			    <fieldset data-filter-group="gender" class="control-group">
			        <label class="control-group-label control-text">Gender</label>
				    <button type="button" class="control control-gender control-text" data-filter="all">All</button>
				    @foreach(\App\Misc::$genders as $key=>$genders)
				    <button type="button" class="control control-gender control-text" data-filter=".{{$genders}}">{{$genders}}</button>
				   @endforeach
			    </fieldset><br/> 
			    
				<fieldset data-filter-group="height-group" class="control-group">
				    <label class="control-group-label control-text">Height</label>
	                <select>
	                    <option value="">--Height--</option>
	                    <option value="[data-height-group=under5]">Under 5ft</option>
	                    <option value="[data-height-group=bet5and56]">Between 5ft & 5ft 6inch</option>
	                    <option value="[data-height-group=bet56and6]">Between 5ft 6inch & 6ft</option>
	                    <option value="[data-height-group=bet6and66]">Between 6ft & 6ft 6inch</option>
	                    <option value="[data-height-group=over66]">Over 6ft 6inch</option>
	                </select>
	            </fieldset><br/>
	
			    <fieldset data-filter-group="audition-type" class="control-group">
				    <label class="control-group-label control-text">Audition Type</label>
	                <select>
	                    <option value="">--Audition Type--</option>
	                    @foreach(\App\Misc::$auditionType as $key=>$at)
	                    <option value="[data-audition-type={{preg_replace('/\s+/', '', $at)}}]">{{$at}}</option>
	                 
	                    @endforeach
	                </select>
			    </fieldset><br/>

				<fieldset data-filter-group="skills-vocal" class="control-group">
				    <label class="control-group-label control-text">Vocal Range</label>
	                <select>
	                    <option value="">--Vocal Range--</option>
	                    @foreach(\App\Misc::$vocalRange as $key=>$vc)
	                    <option value="[data-skill-vocal={{preg_replace('/\s+/', '', $vc)}}]">{{$vc}}</option>
	                    @endforeach
	                </select>
	            </fieldset><br/>
			 
	            <fieldset data-filter-group="first-name" class="text-input-wrapper">
				    <label class="control-group-label control-text">First Name</label>
	                <input type="text" data-search-attribute="data-first-name" placeholder="Type first name here"/>
	            </fieldset><br/>
	            <fieldset data-filter-group="last-name" class="text-input-wrapper">
				    <label class="control-group-label control-text">Last Name</label>
	                <input type="text" data-search-attribute="data-last-name" placeholder="Type last name here"/>
	            </fieldset>
		    </div>
		  

			<fieldset data-filter-group="ethnicity" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Ethnicity</label>
				@foreach(\App\Misc::$ethnicity as $key=>$e)
					<div class="checkbox">
						<label class="checkbox-label">{{$e}}</label>
						<input type="checkbox" value=".{{preg_replace('/\s+/', '', $e)}}"/>
					</div>
	            @endforeach	
			</fieldset>
			
			<fieldset data-filter-group="dance" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Dance</label>
				<div class="checkbox">
					@foreach(\App\Misc::$dance as $key=>$d)
						<div class="checkbox">
							<label class="checkbox-label">{{$d}}</label>
							<input type="checkbox" value=".{{preg_replace('/\s+/', '', $d)}}"/>
						</div>
		            @endforeach	
				</div>	
			</fieldset>

			<fieldset data-filter-group="instrument" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Instrument</label>
				@foreach(\App\Misc::$instrument as $key=>$i)
						<div class="checkbox">
							<label class="checkbox-label">{{$i}}</label>
							<input type="checkbox" value=".{{preg_replace('/\s+/', '', $i)}}"/>
						</div>
		        @endforeach	
			</fieldset>

			<fieldset data-filter-group="tech" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Technical</label>
				@foreach(\App\Misc::$technical as $key=>$t)
						<div class="checkbox">
							<label class="checkbox-label">{{$t}}</label>
							<input type="checkbox" value=".{{preg_replace('/\s+/', '', $t)}}"/>
						</div>
		        @endforeach	
		    </fieldset>

			<fieldset data-filter-group="misc" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Misc</label>
				@foreach(\App\Misc::$misc as $key=>$m)
						<div class="checkbox">
							<label class="checkbox-label">{{$m}}</label>
							<input type="checkbox" value=".{{preg_replace('/\s+/', '', $m)}}"/>
						</div>
		        @endforeach	
			</fieldset>

		    <button type="reset" class="btn btn-warning btn-block">Reset Filters</button>
		</form>
	</div>
	<div class="col-md-8">
		<div class="actorContainer">
			{!!$actorList!!}

			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
		</div>
		
		<div class="controls-pagination">
		    <div class="mixitup-page-list"></div>
		    <div class="mixitup-page-stats"></div>
		</div>
	</div>
</div>

    <script src="{{asset('search/mixitup.min.js')}}"></script>
    <script src="{{asset('search/mixitup-pagination.min.js')}}"></script>
    <script src="{{asset('search/mixitup-multifilter.min.js')}}"></script>
    <script src="{{asset('search/main.js')}}"></script>
  </body>
</html>