@props(['item'])
@php($itemUrl = route('work-cases.show', ['slug' => $item->slug]))

<div class="custom-card card rounded-0 border-0">
    @if($item->previewUrl)
        <a href="{{ $itemUrl }}">
            <img class="rounded-0 card-img-top" src="{{ $item->previewUrl }}" alt="{{ $item->title }}">
        </a>
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between">
            <a href="{{ $itemUrl }}" class="h5 text-decoration-none card-title text-truncate">
                {{ $item->title }}
            </a>
            @auth
                <div>
                    <a class="text-dark text-decoration-none" href="{{ route('filament.admin.resources.work-cases.edit', ['record' => $item->slug]) }}" target="_blank">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
            @endauth
        </div>
        <p class="card-text text-truncate">{{ $item->summary }}</p>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <small class="d-flex gap-2">
                @foreach($item->tags as $tag)
                    <x-tag-classic text="{{ $tag }}"/>
                @endforeach
            </small>
            <a href="{{ $itemUrl }}" class="btn btn-sm btn-outline-dark rounded-4">Подробнее</a>
        </div>
    </div>
</div>
