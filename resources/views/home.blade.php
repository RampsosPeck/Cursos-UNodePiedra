@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', [
            "title" => __("Accede a cualquier curso de inmediato"),
            "icon" => "th"
        ])
@endsection

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>  --}}

<div class="pl-5 pr-5">
    <div class="row justify-content-center">
        @forelse($courses as $course)
            <div class="col-md-3">
                @include('partials.courses.card_course')
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __("No hay ningún curso disponible") }}
            </div>
        @endforelse
    </div>
    <div class="row justify-content-center">
        {{ $courses->links() }}
    </div>
</div>
@endsection
