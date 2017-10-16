@if(session()->has('message'))
<div class="alert alert-dismissible alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{{session()->get('message')}}
</div>
@endif