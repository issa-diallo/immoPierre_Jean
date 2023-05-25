@extends('base')

@section('title', 'Accueil')

@section('content')
<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agency Pierre & Jean</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
    </div>
</div>

<div class="container mt-4">
    <h2>Our latest properties</h2>
    <div class="row">
        @foreach ($properties as $property )
            <div class="col">
                @include('partials._card')
            </div>
        @endforeach
    </div>
</div>
@endsection