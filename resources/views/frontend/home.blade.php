@extends('frontend.layout')

@section('pageTitle')
	<title>Alvin Manansala - Fullstack Developer</title>
@stop

@section('content')
	<div id="homepageWrapper" class="pageWrapper">
		<div id="introductionWrapper">
			<div id="introductionContent">
				<div class="row">
					<div class="large-8 medium-8 large-centered medium-centered columns">
						<h1>
							Yo! I'm Alvin Manansala - a <span class="highlightText">Fullstack Developer</span> & <span class="highlightText">Web Designer</span> from Philippines.
						</h1>
					</div>
				</div>
			</div>
		</div>

		<div id="projectWrapper">
			<div class="row">
				<div class="large-7 medium7 columns">
					<h2>Projects</h2>

					<div id="projects">
						@foreach ($projects as $project)
							<div class="project">
								<h4 class="projectName">
									<a href="/project/{{ $project->slug }} ">{{ $project->title }}</a>
								</h4>

								<p class="projectDescription">
									{{ $project->description }}
								</p>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@stop