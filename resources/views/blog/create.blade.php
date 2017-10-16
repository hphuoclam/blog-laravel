@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Create blog</h1>
	<div class="jumbotron">
		<form class="form-horizontal" action="/blog" method="POST">
			{{csrf_field()}}
			<fieldset>
				<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title" class="col-lg-2 control-label">Title</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('short_content') ? ' has-error' : '' }}">
					<label for="short_content" class="col-lg-2 control-label">Content short</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" name="short_content" placeholder="Content short">{{ old('short_content') }}</textarea>
						@if ($errors->has('short_content'))
						<span class="help-block">
							<strong>{{ $errors->first('short_content') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
					<label for="content" class="col-lg-2 control-label">Content</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="10" name="content" placeholder="Content">{{ old('content') }}</textarea>
						@if ($errors->has('content'))
						<span class="help-block">
							<strong>{{ $errors->first('content') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<a href="/blog" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

@endsection