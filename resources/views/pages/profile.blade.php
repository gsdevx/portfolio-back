@extends('layouts.app')

@section('title', 'О себе')

@section('content')
    <div class="about-me-container">
        <div class="row">
            <div class="col-xl-12 col-xxl-5">
                @if($avatarUrl)
                    <div class="avatar-container">
                        <img
                            ondragstart="return false;"
                            class="rounded-2"
                            src="{{ $avatarUrl }}"
                            alt="Картинка"
                        >
                    </div>
                @endif
            </div>
            <div class="col-xl-12 col-xxl-7 d-flex flex-column gap-4">
                @if($text)
                    <div class="d-flex w-100 flex-column gap-2">
                        <span class="h3 mt-4 mt-xxl-0">
                            Обо мне
                        </span>
                        <span class="description">{{ $text }}</span>
                    </div>
                @endif

                @if(count($educations))
                    <div class="d-flex flex-column gap-2">
                        <span class="h3 mt-xxl-0">Образование</span>
                        @foreach($educations as $item)
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h5 class="card-title">{{ $item->profession }}</h5>
                                    <h6 class="card-subtitle mb-2 text-secondary">
                                        {{ $item->institutionName }} • {{ $item->startDate->format('d.m.Y') }} — {{ $item->endDate->format('d.m.Y') }}</h6>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(count($workPlaces))
                    <div class="d-flex flex-column gap-2">
                        <span class="h3">Места работы</span>
                        <div class="d-flex flex-column gap-4">
                            @foreach($workPlaces as $item)
                                <div class="card rounded-0 border-start border-4 border-end-0 border-top-0 border-bottom-0">
                                    <div class="card-body py-0">
                                        <h5 class="card-title">{{ $item->jobTitle }}</h5>
                                        <h6 class="card-subtitle mb-2 text-secondary">{{ $item->companyName }} • {{ $item->startDate->format('d.m.Y') }} —
                                            {{ $item->endDate->format('d.m.Y') }}</h6>
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(count($tools))
                    <div class="d-flex flex-column gap-2">
                        <span class="h3">Инструменты</span>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach($tools as $item)
                                <x-tag text="{{ $item->title  }}" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
