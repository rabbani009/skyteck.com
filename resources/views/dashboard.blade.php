@extends('frontend.home_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			
			@include('frontend.common_user_panel.user_sidebar')

			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card">
  	<h3 class="text-center"><span class="text-success">HELLO </span><strong>{{ Auth::user()->name }}</strong> Welcome to eDcommerce </h3>
  	
  </div>


				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection
