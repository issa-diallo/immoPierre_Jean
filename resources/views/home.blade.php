@extends('base')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property )
            <div class="col">
                @include('partials._card')
            </div>
        @endforeach
    </div>
</div>
@endsection