@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	@foreach($storageList as $item)
	  {{$item->uri}}
	@endforeach
</div>
@endsection