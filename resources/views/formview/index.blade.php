@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-info">{{$model->header}}</div>
		<div class="card-body">	
		<table class="table table-bordered">
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
			            <td>{{ $item1-> $item}}</td>
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