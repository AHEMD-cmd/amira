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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script> --}}
        <!-- CSS -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
            <!-- Default theme -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
            <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
    alertify.success('deleted successfully');
         </script>
    @endif

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
                                    <h2 class="major">All Projects &nbsp;&nbsp;&nbsp; <a href="{{route('project.create')}}"  class="btn btn-outline-primary"> Create Project </a></h2>

									<section class="features">
                                        @foreach ($projects as $project)
										<article>
											<a href="{{route('project.show', $project->id)}}" class="image"><img src="{{'cover/'. $project->cover }}" height="300px" /></a>
											<h3 class="major">{{$project->title}}</h3>
											<p>{{$project->desc}}.</p>
											<a href="{{route('project.show', $project->id)}}" class="special" style="display: inline">view  </a>
                                            <a href="{{route('project.edit', $project->id)}}" class="special" style="display: inline">Edit</a>
                                            <a href="{{route('project.destroy', $project->id)}}" class="special" style="display: inline">Delete</a>
										</article>
                                        @endforeach

                                        <br>
                              {{ $projects->links() }}
									</section>



								</div>


							</section>

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
