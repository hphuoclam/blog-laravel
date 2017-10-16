@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>{{$error}}</p>
		</div>
	@endforeach
@endif