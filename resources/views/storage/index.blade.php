@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	@foreach($storageList as $item)
	<img src= "{{asset($item->uri) }}" alt="Card image cap">
	@endforeach
</div>
@endsection