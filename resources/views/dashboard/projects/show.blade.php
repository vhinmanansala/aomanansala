@extends('dashboard.layout')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<pre>
				{{ print_r($project) }}
			</pre>
		</div>
	</div>
@stop