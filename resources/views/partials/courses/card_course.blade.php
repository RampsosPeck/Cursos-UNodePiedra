<div class="card card-01">
	<img src="{{ $course->pathAttachment() }}" alt="{{ $course->name }}" class="card-img-top">
	<div class="card-body">
		<span class="badge-box"><i class="fa fa-check"></i></span>
		<h4 class="card-title">{{ $course->name }}</h4>
		<hr />
		<div class="row justify-content-center">
			{{-- Añadir parcial para mostrar raiting --}}
			@include('partials.courses.raiting', ['rating'=>$course->custom_rating])
		</div>
		<hr />
		<span class="badge badge-success badge-cat">{{ $course->category->name }}</span>
		<p class="card-text">
			{{ str_limit($course->description , 100, ' leer mas...') }}
		</p>
		<a href="{{ route('courses.detail', $course->slug) }}"
			class="btn btn-course btn-block">
			{{ __("Más información") }}
		</a>
	</div>
</div>