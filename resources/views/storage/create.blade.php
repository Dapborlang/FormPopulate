@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
	<form method="POST" action="{{ url('/') }}/storage" entype="multipart/form-data">
	{{ csrf_field() }}
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">Storage</div>
		<div class="card-body">	
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="fname">File Name</label>		                
		                <input type="text" class="form-control" id="fname" name="fname">
					</div>
                    <div class="form-group">
		                <label for="detail">File Detail</label>		                
		                <textarea name="detail" id="detail"  class="form-control" cols="10"></textarea>
					</div>
				</div>
                <div class="col-sm-6">
					<div class="form-group">
		                <label for="file">File</label>		                
		                <input type="file" class="form-control" id="file" name="file">
					</div>
                </div>
			</div>
		</div>
		<div class="card-footer">
			<div class="offset-md-5">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection