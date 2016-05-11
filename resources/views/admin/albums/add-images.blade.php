@extends('admin.main')

@section('title', $album->name)

@section('content')
    
	<div class="header">
		<div class="pull-left">
			<h2>{{ $album->name }}</h2>
		</div>
	</div>

	<div class="content">
		<form method="POST" action="{{ url('admin/albums/'.$album->id.'/add-images') }}" enctype="multipart/form-data">
			{!! csrf_field() !!}

		  	<div class="form-group">
		    	<label>Cover Image</label>
		    	<input type="file" name="images[]" multiple>
		    	<p class="help-block">Maximum file size is 8MB.</p>
		    	<p class="help-block">Select images you want to upload.</p>
		  	</div>
		  	<button type="submit" class="btn btn-lg btn-primary">Add</button>
		</form>
	</div>

@endsection