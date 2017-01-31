@extends('dashboard.layout')

@section('content')
	<div class="dashboardWrapper projectWrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form method="POST" action="/dashboard/projects" id="projectsForm" enctype="multipart/form-data">
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
							<input form="projectsForm" type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
						</div>

						<div class="form-group">
							<textarea form="projectsForm" name="description" id="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
						</div>

						<div class="form-group">
							<input type="text" name="url" id="url" class="form-control" placeholder="Project URL" value="{{ old('url') }}">
						</div>

						<div class="form-group">
							<select id="role" class="form-control" name="role[]" class="js-example-basic-multiple" multiple="multiple">
							
								@foreach ($projectRoles as $id => $role)
									<option value="{{ $id }}">{{ $role }}</option>
								@endforeach

							</select>
						</div>

						<div class="form-group">
							<input type="file" name="projectImages[]" id="projectImages" multiple="multiple">
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
	<!--<script type="text/javascript" src="/js/multifileuploader.js"></script> -->

	<script type="text/javascript">
		$('#role').select2({
			tags: true,
			tokenSeparators: [","],
			placeholder: "Select a role",
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
			changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-folder"></i></div><div class="jFiler-input-text"><h3>Click on this box to add images</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn btn-custom blue-light">Browse Files</a></div></div>',
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
	        addMore: true
		});
	</script>
@stop