@extends('admin.main')

@section('title', 'Edit Album')

@section('content')
    
	<div class="header">
		<div class="pull-left">
			<h2>Edit Album</h2>
		</div>
	</div>

	<div class="content">
		<form method="POST" action="{{ url('admin/albums/'.$album->id.'/edit') }}" enctype="multipart/form-data">
			{!! csrf_field() !!}

		  	<div class="form-group">
		    	<label>Name</label>
		    	<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $album->name }}">
		  	</div>
		  	<div class="form-group">
		    	<label>Description</label>
		    	<textarea class="form-control" name="description" placeholder="Description">{{ $album->description }}</textarea>
		  	</div>
		  	<div class="form-group">
		    	<label>Cover Image</label>
		    	<input type="file" name="image">
		    	<p class="help-block">Maximum file size is 8MB.</p>
		  	</div>
		  	<button type="submit" class="btn btn-lg btn-primary">Save</button>
		</form>
	</div>

@endsection