@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>File Name</th>
				<th>URI</th>
				<th>Thumbnail</th>
			</tr>
		</thead>
		<tbody>
	@foreach($storageList as $item)
			<tr>
				<td class="align-middle">{{$item->filename}}</td>
				<td class="align-middle">{{$item->uri}}</td>
				<td><img src= "{{asset($item->uri) }}" alt="Card image cap" height="60px" width="60px"></td>
			</tr>
	@endforeach
		</tbody>
	</table>
</div>
@endsection