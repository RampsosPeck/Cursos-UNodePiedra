<header>
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="container">

			<a href="{{ url('/') }}" class="navbar-brand">
				{{ config('app.name') }}
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>

			<div class="collapse navbar-collapse" id="navbarContent"
			>
				<ul class="navbar-nav mr-auto">

				</ul>
				<ul class="navbar-nav ml-auto">
					@include('partials.navigations.' . \Unopicursos\User::navigation())
					<li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __("Seleccione un idioma") }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('set_language', ['es']) }}" >
                                {{ __("Español") }}
                            </a>
                            <a class="dropdown-item" href="{{ route('set_language', ['en']) }}" >
                                {{ __("Inglés") }}
                            </a>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
	</nav>
</header>