<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Solid State by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <base href="/public">

        <link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">Solid State</a></h1>
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
					<section id="wrapper">





						<!-- Four -->
							<section id="four" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">All Projects</h2>
									<p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
									<section class="features">
                                        @foreach ($projects as $project)
										<article>
											<a href="{{route('project.show', $project->id)}}" class="image"><img src="{{'cover/'. $project->cover }}" height="300px" /></a>
											<h3 class="major">{{$project->title}}</h3>
											<p>{{$project->desc}}.</p>
											<a href="{{route('project.show', $project->id)}}" class="special">view project</a>
										</article>
                                        @endforeach

                                        <br>
                              {{ $projects->links() }}
									</section>



								</div>


							</section>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major">Get in touch</h2>
							<p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
							<form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                                @csrf
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" class=" @error('name') is-invalid @enderror" />
                                        @error('name')
                                        <div  class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email"  class=" @error('email') is-invalid @enderror" />
                                        @error('email')
                                        <div  class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4" class=" @error('email') is-invalid @enderror"></textarea>
                                        @error('message')
                                        <div  class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
									<div class="field">
										<label for="Image">Image</label>
										<input type="file" name="image" id="Image" rows="4" class=" @error('image') is-invalid @enderror">
                                        <small style="font-size: 14px; color:rgb(144, 184, 72)">image is optional</small>
                                        @error('image')
                                        <div  class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
							<ul class="contact">
								<li class="icon solid fa-home">
									Egypt<br />
									Al-sharqia<br />
									Minya al-Qamh
								</li>
								<li class="icon solid fa-phone">01022953646</li>
								{{-- <li class="icon solid fa-envelope"><a href="Amiraelsayed9090@gmail.com">Amiraelsayed9090@gmail.com</a></li> --}}
								<li class="icon brands fa-behance"><a href="https://www.behance.net/amiraelsayb861">https://www.behance.net/amiraelsayb861</a></li>
								<li class="icon brands fa-facebook-f"><a href="https://www.facebook.com/HomeCurve">https://www.facebook.com/HomeCurve</a></li>
								<li class="icon brands fa-instagram"><a href="https://www.instagram.com/amira.elsayed.innovation/">https://www.instagram.com/amira.elsayed.innovation/</a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a>&nbsp; &nbsp;&nbsp; Made by Ahmed Yasser  &nbsp; &nbsp;&nbsp;  Phone : 01011017982</li>
							</ul>
						</div>
					</section>

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
