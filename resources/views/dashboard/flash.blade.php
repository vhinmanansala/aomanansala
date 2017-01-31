@if (session()->has('flash_message'))
	<?php 
		$message = is_array(session('flash_message.message')) ? getErrorMessage(session('flash_message.message')) : session('flash_message.message');
	?>

	<script type="text/javascript">
		swal({
			title: "{{ session('flash_message.title' )}}",   
			text: "{!! $message !!}",   
			type: "{{ session('flash_message.level' )}}",   
			timer: 2000,
			showConfirmButton: false,
			html: true
		});
	</script>
@endif