
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic - Solid State by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <base href="/public">
        <link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">Admin side</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
                            <ul class="links" >
								<li><a href="/">Home</a></li>
                                @auth

                                @if (auth()->user()->type == 'admin')

								<li><a href="{{route('contact.index')}}">Contact</a></li>
								<li><a href="{{route('project.index')}}">Projects</a></li>
								<li><a href="{{route('site.edit',$site->id)}}">Edit site setting</a></li>
                                @endif
                                @endauth
                                @guest
                                <li><a href="{{route('login')}}">Log In</a></li>
                                <li><a href="{{route('register')}}">Sign Up</a></li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            @endguest
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
					<section id="wrapper" class="container">
						<header>
							<div class="inner">
                                <a href="{{route('project.index')}}" style="position: relative; left:850px; top:47px" class="btn btn-outline-primary">  All projects </a>
								<h2>edit page</h2>
							</div>
						</header>

						<!-- Content -->



                        <form action="{{route('site.update', $site->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Title</label>
                              <input type="text" name="title1" class="form-control @error('title1') is-invalid @enderror"  value="{{$site->title1}}">
                              @error('title1')
                              <div  class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">description</label>
                              <textarea name="sub1" cols="30" rows="10" class="@error('sub1') is-invalid @enderror">{{$site->sub1}}</textarea>
                              @error('sub1')
                              <div  class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">About us</label>
                              <input type="text" name="about_us" class="@error('about_us') is-invalid @enderror" value="{{$site->about_us}}">
                              @error('about_us')
                              <div  class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">description</label>
                                <textarea name="sub2" cols="30" rows="10" class="@error('sub2') is-invalid @enderror">{{$site->sub2}}</textarea>
                                @error('sub2')
                                <div  class="invalid-feedback">{{$message}}</div>
                                @enderror
                              </div>

                            <img src="{{'site/'. $site->image }}" width="100px" height="100px" >

                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">images</label>
                              <input type="file" name="image" multiple class="@error('image') is-invalid @enderror">
                              @error('image')
                              <div  class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>



                            <div class="mb-3">

                            <button type="submit" class="btn btn-outline-primary">Update</button>
                             </div>

                        </form>

					</section>

				<!-- Footer -->


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
