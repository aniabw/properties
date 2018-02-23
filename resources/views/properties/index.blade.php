@extends ('properties.layouts.master')

@section ('content')

<div class="col-sm-8 blog-main">
        
       <ul>
        @foreach ($properties as $property)
		  <li> {{  $property->address_line_1  }}, {{  $property->address_line_2  }}, {{  $property->city  }}, {{  $property->postcode  }} </li>
        @endforeach
       </ul>  

</div>
		
		
@endsection		
		