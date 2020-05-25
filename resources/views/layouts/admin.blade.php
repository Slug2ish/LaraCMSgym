<!doctype html>
<html lang="en">
  <head>
  
	<title>Everest Fitness</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

  </head>
 
 
  <body>
	  
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>			  
					<span class="sr-only">Toggle Menu</span>		
					</button>
				   </div>
				   

		<div class="p-4 pt-5">
			<h1><a href="#" class="logo">Admin</a></h1>
	        <ul class="list-unstyled components mb-5">
			  
				<li class="active">
					<a href="/home"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a>
				</li>
				
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user"></i>&nbsp;User</a>
				
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>	
						<a href="{{route('users.index')}}"><i class="fas fa-users"></i>&nbsp;All Users</a>			
						</li>
						<li>
							<a href="{{route('users.create')}}"><i class="fas fa-user-plus"></i>&nbsp;Create User</a>
						</li>
					</ul>
				</li>
			  
				<li>
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-paste"></i>&nbsp;Post</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>	
							<a href="#"><i class="fas fa-mail-bulk"></i>&nbsp;All Posts</a>			
						</li>			
						<li>	
							<a href="#"><i class="fas fa-plus-square"></i>&nbsp;Create Post</a>
						</li>				
					</ul>		
				</li>

		
				<li>
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-object-group"></i>&nbsp;Catagory</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>	
							<a href="#"><i class="fas fa-layer-group"></i>&nbsp;All Catagories</a>			
						</li>			
						<li>	
							<a href="#"><i class="fas fa-plus-circle"></i>&nbsp;Create Catagory</a>
						</li>				
					</ul>		
				</li>

				<li>
			
					<a href="#">Portfolio</a>
			
				</li>

				
			
				<li>
			
					<a href="#">Contact</a>
			
				</li>
			
			</ul>


			
			<div class="mb-5">
			
				<h3 class="h6">Subscribe for newsletter</h3>
			
				<form action="#" class="colorlib-subscribe-form">
			
					<div class="form-group d-flex">
			
						<div class="icon"><span class="icon-paper-plane"></span></div>
			
						<input type="text" class="form-control" placeholder="Enter Email Address">
			
					</div>
			
				</form>
			
			</div>

			
			<div class="footer">
			
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
			
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			
				</div>


			</div>

		</nav>


        <!-- Page Content  -->

		<div id="content" class="p-4 p-md-5 pt-5">
            
            @yield('content')

		</div>

	</div>


	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('footer')

  </body>
</html>