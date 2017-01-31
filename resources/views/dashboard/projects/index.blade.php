@extends('dashboard.layout')

@section('content')
	<div class="dashboardWrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">

					<div class="panel panel-default">
						<table class="table">
							<tr>
								<th>Project Name</th>
								<th>&nbsp;</th>
							</tr>

							@foreach ($projects as $project)
								<tr>
									<td><strong><a href="/project/{{ $project->slug }}">{{ $project->title }}</a></strong></td>
									<td>
										<a class="btn btn-primary" href="/dashboard/projects/{{ $project->slug }}/edit">Edit</a>
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
	</div>
@stop