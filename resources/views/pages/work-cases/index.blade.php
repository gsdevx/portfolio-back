@extends('layouts.app')

@section('title', 'Кейсы')

@section('content')
    <h1>Все работы</h1>

    <div class="mt-2 row row-cols-xl-3 row-cols-md-2 row-cols-sm-1 row-cols-1 g-4 mb-5">
        @foreach($paginator->items() as $item)
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
                    @auth
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon-eye"
                                >
                                    <path d="M1 12s5-9 11-9 11 9 11 9-5 9-11 9-11-9-11-9z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                {{ $item->viewsCount }} (+{{ $item->todayViewsCount }})
                            </div>
                            <div>
                                <a class="text-dark text-decoration-none" href="{{ route('filament.admin.resources.work-cases.edit', ['record' => $item->slug]) }}" target="_blank">Ред.</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach

    </div>

    <x-pagination :paginator="$paginator" />
@endsection
