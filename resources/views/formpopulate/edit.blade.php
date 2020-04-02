@extends('layouts.app')
@section('script')
@endsection
@section('content')
<form id="partybillForm" method="POST" action="http://localhost:8000/formpopulate" target="">
	<input type="hidden" name="_token" value="T9Sq1Xks4XeZmHEKJp1oFXyQsw9Fk683Y6F9exXZ">
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">Form Populate Master</div>
		<div class="card-body">	
			<div class="row">
																						<div class="col-sm-6">
					<div class="form-group">
		                <label for="header">Header</label>
		                		                <input type="text" class="form-control " id="header" name="header">
		                					</div>
				</div>
																			<div class="col-sm-6">
					<div class="form-group">
		                <label for="table_name">Table Name</label>
		                		                <input type="text" class="form-control " id="table_name" name="table_name">
		                					</div>
				</div>
																			<div class="col-sm-6">
					<div class="form-group">
		                <label for="model">Model</label>
		                		                <input type="text" class="form-control " id="model" name="model">
		                					</div>
				</div>
																			<div class="col-sm-6">
					<div class="form-group">
		                <label for="route">Route</label>
		                		                <input type="text" class="form-control " id="route" name="route">
		                					</div>
				</div>
																			<div class="col-sm-6">
					<div class="form-group">
		                <label for="role">Role</label>
		                		                <select type="text" class="form-control" id="role" name="role">
		                			                		<option value="ADM">ADMIN</option>
		                			                		<option value="STG">File Storage</option>
		                			                </select>
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
@endsection