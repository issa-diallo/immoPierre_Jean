@extends('base')

@section('title', $property->title)

@section('content')
<div class="container mt-4">
    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} rooms -
        {{ $property->surface }} m2</h2>

    <div class="text-primary fw-bold">
        {{ number_format($property->price, thousands_separator: ' ') }} €
    </div>

    <hr>

    <div class="mt-4">
        <h4>Interested by this property?</h4>

        @if(session('success'))
        @include('share.flash')
        <style>
            form {
                display: none !important;
            }
        </style>
        @endif


        <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
            @csrf
            @method('post')
            <div class="row">
                @include('share.input', ['class' => 'col', 'label' => 'Firstname', 'name' => 'firstname'])
                @include('share.input', ['class' => 'col', 'label' => 'Lastname', 'name' => 'lastname'])
            </div>
            <div class="row">
                @include('share.input', ['class' => 'col', 'label' => 'Phone', 'name' => 'phone'])
                @include('share.input', ['type' => 'email','class' => 'col', 'label' => 'Email', 'name' => 'email'])
            </div>
            @include('share.input', ['type' => 'textarea','class' => 'col', 'label' => 'Message', 'name' => 'message'])
            <button class="button btn btn-primary">Contact us</button>
        </form>
    </div>

    <div class="mt-4">
        <p>{{ nl2br($property->description) }}</p>
        <div class="row">
            <div class="col-8">
                <h2>Features</h2>
                <table class="table table-striped">
                    <tr>
                        <td>living space</td>
                        <td>{{ $property->surface }} m2</td>
                    </tr>
                    <tr>
                        <td>Rooms</td>
                        <td>{{ $property->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Bedrooms</td>
                        <td>{{ $property->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Floor</td>
                        <td>{{ $property->floor ?: 'Ground floor' }}</td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            {{ $property->address }} <br>
                            {{ $property->city }}
                            ({{ $property->postal_code }})
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Specifications</h2>
                <ul class="list-group">
                    @foreach($property->options as $option)
                    <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection