@extends('frontend.layout')

@section('pageTitle')
	<title>{{ $project->title }} | Alvin Manansala - Fullstack Developer</title>
@stop

@section('content')
	<div id="projectDetailWrapper" class="pageWrapper">
		<div class="row">
			<div class="large-11 medium-11 columns">
				<div id="projectHeading">
					<div class="row">
						<div class="large-12 columns">
							<h1>{{ $project->title }}</h1>	
						</div>
					</div>
				</div>

				<div id="projectDescription">
					<div class="row">
						<div class="large-6 medium-6 large-offset-2 medium-offset-2 columns">
							<p>{{ $project->description }}</p>

							@if ($project->url)
								<a href="{{ $project->url }}" target="_blank">Visit website</a>
							@endif
						</div>
					</div>
				</div>

				<div id="projectImages">
					@if ($project->media)
						@foreach ($project->media as $media)
							<img src="/{{ $media->disk }}/{{ $media->directory }}/{{ $media->filename }}.{{ $media->extension }}" alt="{{ $project->title }}">
						@endforeach
					@endif
				</div>

				<div id="pagination">
					<div class="row">
						<div id="previousProject" class="large-6 medium-6 columns">
							@if ($previous)
								<span class="highlightText">Previous</span>
								<a href="/project/{{ $previous->slug }}">{{ $previous->title }}</a>
							@endif
						</div>

						<div id="nextProject" class="large-6 medium-6 columns">
							@if ($next)
								<span class="highlightText">Next</span>
								<a href="/project/{{ $next->slug }}">{{ $next->title }}</a>
							@endif
						</div>
					</div>
				</div>

                <div id="callToAction">
                    <div class="row">
                        <div class="large-12 columns">
                            <span class="callToAction highlightText">Have a project? Let's chat</span>
                            <h3><a href="mailto:aomanansala@gmail.com">aomanansala@gmail.com</a></h3>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop