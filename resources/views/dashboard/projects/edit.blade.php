@extends('dashboard.layout')

@section('content')
	<div class="dashboardWrapper projectWrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form method="POST" action="/dashboard/projects/{{ $project->id }}">
						{{ method_field('PATCH') }}
						{{ csrf_field() }}

						<div id="projectFormHeader">
							<div class="row">
								<div class="col-md-8">
									<h4 class="projectHeading">Create Project</h4>
								</div>

								<div class="col-md-4">
									<button type="button" id="triggerProjectImages" class="btn btn-default">Upload Photos</button>
									<button type="submit" id="publishProject" class="btn btn-primary">Publish</button>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}">
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
						</div>

						<div class="form-group">
							<input type="file" name="projectImages[]" id="projectImages" multiple="multiple">
						</div>

						<div class="form-group">
							<select id="role" class="form-control" name="role[]" class="js-example-basic-multiple" multiple="multiple">
								@foreach ($project->projectRoles as $projectRole)
									@if (in_array($projectRole->role, $projectRoles))
										@php $selected = "selected" @endphp
									@else 
										@php $selected = "" @endphp
									@endif

									<option value="{{ $projectRole->id }}" {{ $selected }}>{{ $projectRole->role }}</option>
								@endforeach
							</select>
						</div>
					</form>

					@if (count($errors))
						{{ flash()->error('Error', $errors->all()) }}
					@endif
				</div>
			</div>
		</div>	
	</div>

	
@stop

@section('scripts')
	<script type="text/javascript">
		$("#role").select2({
			tags: true,
			tokenSeparators: [","],
			createTag: function(role) {
		        return {
		            id: role.term,
		            text: role.term
		        };
		    }
		});

		$('#triggerProjectImages').click(function() {
			$('#projectImages').trigger('click');
		});

		$("#projectImages").filer({
	        showThumbs: true,
	        theme: "dragdropbox",
	        templates: {
	            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
	            item: '<li class="jFiler-item" style="width:49%">\
	                        <div class="jFiler-item-container">\
	                            <div class="jFiler-item-inner">\
	                                <div class="jFiler-item-thumb">\
	                                    <div class="jFiler-item-status"></div>\
	                                    <div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="%%fi-name%%">%%fi-name%%</b></span>\
													<span class="jFiler-item-others">%%fi-size2%%</span>\
												</div>\
											</div>\
										</div>\
	                                    %%fi-image%%\
	                                </div>\
	                                <div class="jFiler-item-assets jFiler-row">\
	                                    <ul class="list-inline pull-left">\
	                                        <li>%%fi-progressBar%%</li>\
	                                    </ul>\
	                                    <ul class="list-inline pull-right">\
	                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
	                                    </ul>\
	                                </div>\
	                            </div>\
	                        </div>\
	                    </li>',
	            itemAppend: '<li class="jFiler-item" style="width:49%">\
	                            <div class="jFiler-item-container">\
	                                <div class="jFiler-item-inner">\
	                                    <div class="jFiler-item-thumb">\
	                                        <div class="jFiler-item-status"></div>\
	                                        <div class="jFiler-item-thumb-overlay">\
	    										<div class="jFiler-item-info">\
	    											<div style="display:table-cell;vertical-align: middle;">\
	    												<span class="jFiler-item-title"><b title="%%fi-name%%">%%fi-name%%</b></span>\
	    												<span class="jFiler-item-others">%%fi-size2%%</span>\
	    											</div>\
	    										</div>\
	    									</div>\
	                                        %%fi-image%%\
	                                    </div>\
	                                    <div class="jFiler-item-assets jFiler-row">\
	                                        <ul class="list-inline pull-left">\
	                                            <li><span class="jFiler-item-others">%%fi-icon%%</span></li>\
	                                        </ul>\
	                                        <ul class="list-inline pull-right">\
	                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
	                                        </ul>\
	                                    </div>\
	                                </div>\
	                            </div>\
	                        </li>',
	            progressBar: '<div class="bar"></div>',
				itemAppendToEnd: false,
				canvasImage: false,
				removeConfirmation: true,
				_selectors: {
					list: '.jFiler-items-list',
					item: '.jFiler-item',
					progressBar: '.bar',
					remove: '.jFiler-item-trash-action'
				}
	        },
	       files: images(),

	        addMore: true
		});

		function images() {
			var images = [];

        	inp = '{"name": "photo-1468536029150-d16666b345a1%20(1).jpg","size": 5453,"type": "image/jpg","file": "http://vhinmanansala.dev/uploads/projects/photo-1468536029150-d16666b345a1%20(1).jpg"}';
			var img = $.parseJSON(inp);
			images.push(img);
			console.log(images);
			return images;
		}
	</script>
@stop

/*@foreach ($project->media as $media)
	{
		name: "{{ $media->filename }}.{{$media->extension }}",
		size: "{{ $media->size }}",
        type: "{{ $media->mime_type }}",
        file: "{{ $_SERVER['SERVER_NAME'] }}/{{ $media->disk }}/{{ $media->directory }}/{{ $media->filename }}.{{ $media->extension }}",
        url:  "{{ $_SERVER['SERVER_NAME'] }}/{{ $media->disk }}/{{ $media->directory }}/{{ $media->filename }}.{{ $media->extension }}",
	},
@endforeach*/