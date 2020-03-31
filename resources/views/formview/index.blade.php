@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-info">{{$model->header}}</div>
		<div class="card-body">	
		<form method="POST" action="{{url('/')}}/{{$model->route}}/{{$model->id}}/index">
			{{csrf_field()}}
			<div class="col-sm-5">
				<table class="table table-striped">
					<td><input type="text" class="form-control form-control-sm" name="search" placeholder="Enter Text To Search"></td>
					<td><button type="submit" class="btn btn-primary btn-sm">Search</button></td>
				</table>
			</div>
		</form>
		<table class="table table-hover">
			<tr>
			@foreach($columns as $item)
				@if(!in_array($item,$exclude))
				@php
				    $title=ucwords(str_replace('_',' ',$item));
				@endphp
		            <th>{{$title}}</th>
				@endif
			@endforeach
				<th>Option</th>
			</tr>
			@foreach($table as $item1)
			<tr>
				@foreach($columns as $item)
					@if(!in_array($item,$exclude))	
						@if(array_key_exists($item, $select))
							@php 
		                		$val=$select[$item][0];
		                		$det=$select[$item][1];
		                	@endphp		
							<td>{{ $item1-> $val-> $det }}</td>
						@else		
			            	<td>{{ $item1-> $item}}</td>	
						@endif
					@endif
				@endforeach
				<td><a class="btn btn-info" href="{{ url('/') }}/frmbuilder/edit/{{$model->id}}/{{$item1->id}}">Edit</a></td>
			</tr>
			@endforeach
		</table>
		</div>
	</div>
</div>
@endsection