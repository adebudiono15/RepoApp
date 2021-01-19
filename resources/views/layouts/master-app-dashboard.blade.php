<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	

	<!-- Fonts and icons -->
	<script src="{{ url('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/atlantis.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('assets/css/pdf.css') }}"> --}}

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}">
    @livewireStyles
    @stack('css')
</head>
<body>
	<div id="app">
		<div class="wrapper">
			<div class="main-header"  data-turbolinks="false">
				<!-- Logo Header -->
				<div class="logo-header" data-background-color="blue">
					{{-- <a href="index.html" class="logo">
						<img src="{{ asset('assets/img/logoputih.png') }}" width="108" alt="navbar brand" class="navbar-brand">
					</a> --}}
					<button  class="navbar-toggler sidenav-toggler ml-auto" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
						<i class=""></i>
					<div class="nav-toggle">
						<button data-no-turbolink class="btn btn-toggle toggle-sidebar">
							<i class="icon-menu"></i>
						</button>
					</div>
				</div>
				<!-- End Logo Header -->

				@include('layouts.navbar')
			</div>

			@include('layouts.sidebar')

			<div class="main-panel">
                @yield('content')
                <div class="container">
                    {{ isset($slot) ? $slot : null  }}
                </div>
                @include('layouts.footer')
			</div>
			<!-- End Custom template -->
		</div>
	</div>

    
	
	<!--   Core JS Files   -->
	<script src="{{ url('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
	<script src="{{ url('assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ url('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ url('assets/js/plugin/datatables/datatables.min.js') }}"></script>


	<!-- jQuery Vector Maps -->
	<script src="{{ url('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ url('assets/js/atlantis.min.js') }}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ url('assets/js/setting-demo.js') }}"></script>
	@livewireScripts
	<script>
        window.addEventListener('closeModal', event => {
            $("#uploadModal").modal('hide');
        })
        window.addEventListener('openModal', event => {
            $("#uploadModal").modal('show');
        })
	</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });
    </script>
	@stack('js')
</body>
</html>