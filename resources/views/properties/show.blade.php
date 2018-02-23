@extends ('properties.layouts.master')


@section ('content')
	<div class="col-sm-8 blog-main">
	  <h2 class="blog-post-title">{{ $property->postcode }} </h2>
	  

	  <p>{{  $property->address_line_1  }}, {{  $property->address_line_2  }}, {{  $property->city  }}, {{  $property->postcode  }} </p>
	
	  
	</div>  
@endsection