@extends('admin.main')

@section('title', 'Albums')

@section('content')
    
	<div class="header">
		<div class="pull-left">
			<h2>Albums</h2>
		</div>
		<a href="{{ url('admin/albums/add') }}" class="btn btn-lg btn-primary pull-right">
			Add Album
		</a>
	</div>

	<div class="content albums">
		@if (session('success'))
		    <div class="alert alert-success">
		        Album saved.
		    </div>
		@endif

		<table class="table table-striped">
			<tbody>
				@foreach ($albums as $a)
				    <tr>
				    	<td>
				    		<a href="{{ url('admin/albums/'.$a->id.'/images') }}">
					    		<img src="{{ $a->getCoverURL() }}" alt="">
					    		<span class="name">{{ $a->name }}</span>
				    		</a>
				    	</td>
				    	<td>
				    		<div class="btn-group pull-right">
					    		<a class="btn btn-lg btn-default" href="{{ url('admin/albums/'.$a->id.'/edit') }}">Edit</a>
					    		<a class="delete-item btn btn-lg btn-danger" href="{{ url('admin/albums/'.$a->id.'/delete') }}">Delete</a>
				    		</div>
				    	</td>
				    </tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection