<!-- created by RDMarwein -->
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
	<form method="POST" action="{{ url('/') }}/formpopulateindex" target="" class="bg-secondary">
		{{ csrf_field() }}
		<div class="card bg-info text-white">
			<div class="card-header bg-secondary">Form Populate Index</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
			                <label for="form_populate_id">Form Populate Id</label>
			                <select class="form-control " id="form_populate_id" name="form_populate_id">
				                @foreach($formPopulate as $item)
				                <option value="{{$item->id}}">{{$item->model}}</option>
				                @endforeach
				            </select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
			                <label for="exclude">Exclude</label>
			                <input type="text" class="form-control " id="exclude" name="exclude">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
			                <label for="notes">Notes</label>
			                <input type="text" class="form-control " id="notes" name="notes">
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="card-footer">

			</div> -->
		</div>
		<div class="card bg-light text-black">
		<div class="card-header bg-secondary text-white">Form Populate Create</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="script">Script</label>
		                <textarea rows="4" class="form-control " id="script" name="script"></textarea>
                    </div>
                    <div class="form-group">
		                <label for="type">Type</label>
		                <textarea class="form-control " id="type" name="type"></textarea>
                    </div>
					<div class="form-group">
		                <label for="class">Class</label>
		                <textarea class="form-control " id="class" name="class"></textarea>
                    </div>
                    <div class="form-group">
		                <label for="master_keys">Master Keys</label>
		                <textarea class="form-control " id="master_keys" name="master_keys"></textarea>
		            </div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="foreign_keys">Foreign Keys</label>
		                <textarea class="form-control " id="foreign_keys" name="foreign_keys"></textarea>
		            </div>
		            <div class="form-group">
		                <label for="attribute">Attributes</label>
		                <textarea class="form-control " id="attribute" name="attribute"></textarea>
		            </div>
					<div class="form-group">
		                <label for="cnotes">Cnotes</label>
		                <textarea class="form-control " id="cnotes" name="cnotes"></textarea>
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
