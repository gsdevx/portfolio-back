@extends('layouts.app')

@section('title', $workCase->title)

@section('content')
    <nav class="p-2">
        <ol class="breadcrumb align-items-center">
            <li class="breadcrumb-item">
                <a href="{{ route('work-cases.index') }}" class="text-dark text-decoration-none">Кейсы</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $workCase->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            @if($workCase->imageUrl)
                <div>
                    <img class="w-100" src="{{ $workCase->imageUrl }}" alt="{{ $workCase->title }}">
                </div>
            @endif

        </div>
        <div class="col-md-6">
            <h1 class="mt-sm-3 mt-md-0">{{ $workCase->title }}</h1>
            <div class="work-case-description">
                <p>
                    {!! $workCase->description !!}
                </p>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                @foreach($workCase->tags as $tag)
                    <x-tag text="{{ $tag }}"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
