@extends ('properties.layouts.master')


@section ('content')
<div class="col-sm-8 blog-main">
	<form method="POST" action="/laravel/properties/public/properties">
	   {{ csrf_field() }}  
	  <div class="form-group">
		<label for="title">Address 1</label>
		<input type="text" class="form-control" id="address_line_1" name="address_line_1">
	  </div>
	  
	  <div class="form-group">
		<label for="title">Address 2</label>
		<input type="text" class="form-control" id="address_line_2" name="address_line_2">
	  </div>
	  
	  <div class="form-group">
		<label for="title">City</label>
		<input type="text" class="form-control" id="city" name="city">
	  </div>
	  
	  <div class="form-group">
		<label for="title">Postcode</label>
		<input type="text" class="form-control" id="postcode" name="postcode">
	  </div>
	  
	 
	  <div class="form-group">
		<button type="submit" class="btn btn-primary">Add property</button>
	  </div>

	  @include('properties.layouts.error')
	</form>


</div>  
@endsection