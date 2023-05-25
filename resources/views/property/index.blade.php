@extends('base')

@section('title', 'Tous nos biens')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface" name="surface" value="{{ $input['surface'] ?? ''}}" class="form-control">
            <input type="number" placeholder="Rooms" name="rooms" value="{{ $input['rooms'] ?? ''}}" class="form-control">
            <input type="number" placeholder="Max budget" name="price" value="{{ $input['price'] ?? ''}}" class="form-control">
            <input type="text" placeholder="Title" name="title" value="{{ $input['title'] ?? ''}}" class="form-control">
            <button class="btn btn-primary btn-sm flex-grow-0">Search</button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('partials._card')
                </div>
            @empty
            <div class="col">
                No properties matching your search
            </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection