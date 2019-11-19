<div class="col-2">
	@auth
		@can('opt_for_course', $course)
			@can('subscribe', \Unopicursos\Course::class)
				<a class="btn btn-subscribe btn-bottom btn-block" href="#">
					<i class="fa fa-bolt" ></i> {{ __("Subscribirme") }}
				</a>
			@else
				@can('inscribe', $course)
					<a class="btn btn-subscribe btn-bottom btn-block" href="#">
						<i class="fa fa-bolt" ></i> {{ __("Inscribirme") }}
					</a>
				@else
					<a class="btn btn-subscribe btn-bottom btn-block" href="#">
						<i class="fa fa-bolt" ></i> {{ __("Inscrito") }}
					</a>
				@endcan
			@endcan
		@else
			<a class="btn btn-subscribe btn-bottom btn-block" href="#">
				<i class="fa fa-user" ></i> {{ __("Soy Autor") }}
			</a>
		@endcan
	@else
		<a class="btn btn-subscribe btn-bottom btn-block" href="{{ route('login') }}">
			<i class="fa fa-user" ></i> {{ __("Acceder") }}
		</a>
	@endauth
</div>