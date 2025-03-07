@extends('layouts.app')

@section('title', 'Кейсы')

@section('content')
    <h1>Все работы</h1>

    <div class="mt-2 row row-cols-xl-3 row-cols-md-2 row-cols-sm-1 row-cols-1 g-4">
        @foreach($workCases as $item)
            <div class="col">
                <div class="card rounded-4">
                    @if($item->previewUrl)
                        <a href="{{ route('work-cases.show', ['slug' => $item->slug]) }}">
                            <img class="rounded-top-3 card-img-top" src="{{ $item->previewUrl }}" alt="{{ $item->title }}">
                        </a>
                    @endif

                    <div class="card-body">
                        <a href="{{ route('work-cases.show', ['slug' => $item->slug]) }}" class="h5 text-decoration-none card-title text-truncate">
                            {{ $item->title }}
                        </a>
                        <p class="card-text text-truncate">{{ $item->summary }}</p>
                        <small class="d-flex gap-2">
                            @foreach($item->tags as $tag)
                                <x-tag text="{{ $tag }}"/>
                            @endforeach
                        </small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
