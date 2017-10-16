@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Home blog</h1>
	@include('blog.message')
	<div class="text-right">
		<a href="/blog/create" class="btn btn-primary">Create</a>
	</div>

	<div>
		<table class="table table-striped table-hover ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Content short</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $item)
				<tr>
					<td>{{$item->title}}</td>
					<td>{{$item->short_content}}</td>
					<td>{{ \Carbon\Carbon::createFromTimestampUTC(strtotime($item->posted_at))->diffForHumans()}}</td>
					<td>
						<a href="/blog/{{$item->id}}/edit"><i class="fa fa-edit"></i></a>
						<a href="/blog/{{$item->id}}"
							onclick="event.preventDefault();
							document.getElementById('delete-post').submit();"><i class="fa fa-trash"></i></a>
							<form id="delete-post" action="/blog/{{$item->id}}" method="POST" style="display: none;">
								{{ csrf_field() }}
								{{method_field('DELETE')}}
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div>
				{{ $posts->links() }}
			</div>
		</div>
	</div>

	@endsection