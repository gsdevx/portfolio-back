@props(['item'])

<div class="card card-custom border-0" x-data="{ mouseOn: false }" @mouseenter="mouseOn = true" @mouseleave="mouseOn = false" >
    @if($item->previewUrl)
        <a href="{{ route('work-cases.show', ['slug' => $item->slug]) }}">
            <img class="card-img-top rounded-0" src="{{ $item->previewUrl }}" alt="{{ $item->title }}">
        </a>
    @endif
    <div class="card-img-overlay rounded-0" x-show="mouseOn" x-transition>
        <div class="d-flex h-100 flex-column justify-content-between">
            <div>
                <a href="{{ route('work-cases.show', ['slug' => $item->slug]) }}" class="h5 text-decoration-none card-title text-truncate">
                    {{ $item->title }}
                </a>
                <p class="card-text">{{ $item->summary }}</p>
                <small class="d-flex gap-2">
                    @foreach($item->tags as $tag)
                        <x-tag text="{{ $tag }}"/>
                    @endforeach
                </small>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('work-cases.show', ['slug' => $item->slug]) }}" class="btn btn-outline-light rounded-4">Подробнее</a>
            </div>
        </div>
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
