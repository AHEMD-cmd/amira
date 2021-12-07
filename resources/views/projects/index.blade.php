
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

        <link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script> --}}
        <!-- CSS -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
            <!-- Default theme -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
            <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	</head>
	<body class="is-preload">

        @if (session()->has('success'))
            <script>
        alertify.set('notifier','position', 'bottom-right');
        alertify.success('Created successfully');
             </script>
        @endif
        @if (session()->has('update'))
            <script>
        alertify.set('notifier','position', 'bottom-right');
        alertify.success('updated successfully');
             </script>
        @endif
        @if (session()->has('deleted'))
            <script>
        alertify.set('notifier','position', 'bottom-right');
        alertify.success('updated successfully');
             </script>
        @endif


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
					<section id="wrapper" class="container mb-5">
						<header>
							<div class="inner">
                                <a href="{{route('project.create')}}" style="position: relative; left:850px; top:47px" class="btn btn-outline-primary"> Create Project </a>
								<h2>projects</h2>
							</div>
						</header>

						<!-- Content -->



                              <div class="row row-cols-1 row-cols-md-3 g-4" class="features">
                                  @foreach ($projects as $project)

                                  <div class=" ">


                                    <article class="">
                                        <a href="#" class="image"><img src="{{'cover/'. $project->cover }}"  height="300px" width="414px"/></a>
                                        <h3 class="major">{{ $project->title }}</h3>
                                        <p>{{ $project->desc}}</p>
                                        <a href="{{route('project.edit', $project->id)}}" class="special" style="display: inline">Edit</a>
                                        <a href="{{route('project.destroy', $project->id)}}" class="special" style="display: inline;position: relative;left:20px">Delete</a>
                                        <a href="{{route('project.show', $project->id)}}" class="special" style="display: inline;position: relative;left:35px">Show</a>

                                    </article>
                                  </div>
                                  @endforeach

                              </div>

					</section>

				<!-- Footer -->
					{{-- <section id="footer" class="container">
						<div class="inner">
							<h2 class="major">Get in touch</h2>
							<p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
							<ul class="contact">
								<li class="icon solid fa-home">
									Untitled Inc<br />
									1234 Somewhere Road Suite #2894<br />
									Nashville, TN 00000-0000
								</li>
								<li class="icon solid fa-phone">(000) 000-0000</li>
								<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
								<li class="icon brands fa-twitter"><a href="#">twitter.com/untitled-tld</a></li>
								<li class="icon brands fa-facebook-f"><a href="#">facebook.com/untitled-tld</a></li>
								<li class="icon brands fa-instagram"><a href="#">instagram.com/untitled-tld</a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section> --}}

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
