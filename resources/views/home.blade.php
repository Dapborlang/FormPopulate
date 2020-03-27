@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Links</div>

                <div class="card-body">
                    @foreach(Auth::user()->role as $item)
                        @foreach($item->link as $item1)
                            <a href="{{ url('/') }}/{{$item1->route}}/{{$item1->id}}/create">{{$item1->header}}</a>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
