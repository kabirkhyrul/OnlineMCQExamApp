@extends('layout')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card shadow">
			<div class="card-header">
				<h4 class="m-0 font-weight-bold text-primary text-center">
					{{ $title }}
					<span class="position-fixed badge badge-warning" id="timer"></span>	
				</h4>
								
			</div>
			<div class="card-content">
				<div class="card-body">
					<form id="ansSheet">
						@csrf
						@foreach($question as $key=>$q)
						<fieldset class="form-group">
							<legend>
								<span class="float-left text-info">{{++$key}}. </span>  
								{!! $q->question !!}
							</legend>

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="{{'q-'.$q->id}}1" name="{{'q-'.$q->id}}" class="custom-control-input" value="{{$q->option_a}}">
								<label class="custom-control-label" for="{{'q-'.$q->id}}1">{{$q->option_a}}</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="{{'q-'.$q->id}}2" name="{{'q-'.$q->id}}" class="custom-control-input" value="{{$q->option_b}}">
								<label class="custom-control-label" for="{{'q-'.$q->id}}2">{{$q->option_b}}</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="{{'q-'.$q->id}}3" name="{{'q-'.$q->id}}" class="custom-control-input" value="{{$q->option_c}}">
								<label class="custom-control-label" for="{{'q-'.$q->id}}3">{{$q->option_c}}</label>
							</div>							
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="{{'q-'.$q->id}}4" name="{{'q-'.$q->id}}" class="custom-control-input" value="{{$q->option_d}}">
								<label class="custom-control-label" for="{{'q-'.$q->id}}4">{{$q->option_d}}</label>
							</div>
						</fieldset>


						@endforeach
						<button type="button" onclick="getResult()" class="btn btn-success">Submit</button>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	//define your time in second
		var c={{$time}};
        var t;
        timedCount();

        function timedCount()
		{

        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
        	$('#timer').html(result);
            if(c == 0 )
			{
            	getResult();
			}
            c = c - 1;
            t = setTimeout(function()
			{
			 timedCount()
			},
			1000);
        }
</script>
@endsection