@extends('admin.main')

@section('title', $album->name)

@section('content')
    
	<div class="header">
		<div class="pull-left">
			<h2>{{ $album->name }}</h2>
		</div>
		<a href="{{ url('admin/albums/'.$album->id.'/add-images') }}" class="btn btn-lg btn-primary pull-right">
			Add Images
		</a>
	</div>

	<div class="content">
		@if (session('success'))
		    <div class="alert alert-success">
		        Images added.
		    </div>
		@endif

		<div class="images">
			@foreach ($images as $image)
				<div class="image" style="background-image: url('{{ $image->getURL() }}')">
					<a class="delete-item btn btn-lg btn-danger" href="{{ url('admin/albums/'.$album->id.'/delete-image/'.$image->id) }}">Delete</a>
				</div>    
			@endforeach
		</div>
	</div>

@endsection