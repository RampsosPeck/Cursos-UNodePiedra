@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush

@section('jumbotron')
    @include('partials.jumbotron', [
            "title" => __("Subscribete ahora a uno de nuestros planes"),
            "icon" => "globe"
        ])
@endsection

@section('content')
<div class="container">
    <div class="pricing-table pricing-three-column row">
        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-bronze">
                <h2>{{ __("MENSUAL") }}</h2>
                <span>{{ __(":price / Mes", ['price' => '$ 6.96']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ __("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ __("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include('partials.stripe.form',["product"=> [
                        "name" => __("Suscripción"),
                        "description" => __("Mensual"),
                        "type" => "monthly",
                        "amount" => 696,66 ]])
                </li>
            </ul>
        </div>

        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-silver">
                <h2>{{ __("TRIMESTRAL") }}</h2>
                <span>{{ __(":price / 3 meses", ['price' => '$ 15.96']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ __("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ __("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include('partials.stripe.form',["product"=> [
                        "name" => __("Suscripción"),
                        "description" => __("Trimestral"),
                        "type" => "quarterly",
                        "amount" => 1596,66
                ]])</li>
            </ul>
        </div>

        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-gold">
                <h2>{{ __("ANUAL") }}</h2>
                <span>{{ __(":price / 12 meses", ['price' => '$ 70.96']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ __("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ __("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include('partials.stripe.form',["product"=> [
                        "name" => __("Suscripción"),
                        "description" => __("Anual"),
                        "type" => "yearly",
                        "amount" => 7096.66
                ]])</li>
            </ul>
        </div>
    </div>
</div>
@endsection



