@extends('layouts.app')

@section('title', 'Кейсы')

@section('content')
    <h1>Все работы</h1>

    <div class="mt-2 row row-cols-xl-3 row-cols-md-2 row-cols-sm-1 row-cols-1 g-4 mb-5">
        @foreach($paginator->items() as $item)
            <div class="col">
                <x-work-case.card :item="$item" />
            </div>
        @endforeach
    </div>

    <x-pagination :paginator="$paginator" />
@endsection
