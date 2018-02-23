<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v4-alpha.getbootstrap.com/favicon.ico">

    <title>Properties</title>

    <!-- Bootstrap core CSS -->
    <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  </head>

  <body>
	
    @include ('properties.layouts.nav')

	
	 @if( $flash = session('message'))
	
		<div id="flash-message" class="alert alert-success" role="alert">
			{{ $flash }}
		</div>
	
	 @endif
	
	
    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Properties</h1>
      </div>
    </div>

    <div class="container">

      <div class="row">

        @yield ('content')

        @include ('properties.layouts.sidebar')

      </div><!-- /.row -->

    </div><!-- /.container -->

    @include ('properties.layouts.footer')

  </body>
</html>
