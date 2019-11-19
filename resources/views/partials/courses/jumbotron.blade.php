<div class="row">
	<div class="col-md-12">
		<div class="card" style="background-image: url('{{ url('/images/jumbotron.png') }}')">
			<div class="text-white text-center d-flex align-items-center py-5 px-4 my-5">
				<div class="col-5">
					<img src="{{ $course->pathAttachment() }}" alt="" class="img-fluid">
				</div>
				<div class="col-5 text-left">
					<h2>{{ __("Curso") }}: {{ $course->name }}</h2>
					<h4>{{ __("Profesor") }}: {{ $course->teacher->user->name }}</h4>
					<h4>{{ __("Categoria") }}: {{ $course->category->name }}</h4>
					<h5>{{ __("Fecha de Publicación") }}: {{ $course->created_at->format('M d') }}</h5>
					<h5>{{ __("Fecha de Publicación") }}: {{ $course->updated_at->format('M d') }}</h5>
					<h6>{{ __("Estudiantes inscritos") }}: {{ $course->students_count }}</h6>
					<h6>{{ __("Número de valoraciones") }}: {{ $course->reviews_count }}</h6>
					@include('partials.courses.raiting')
				</div>
				@include('partials.courses.action_button')
			</div>
		</div>
	</div>
</div>