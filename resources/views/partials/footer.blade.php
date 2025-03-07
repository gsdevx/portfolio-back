<div class="footer bg-dark border-top">
    <div class="container py-5">
        <div class="row d-flex flex-md-row flex-sm-column gap-3 flex-wrap justify-content-between align-items-center">
            <ul class="nav list-unstyled col-md-4 d-flex flex-column">
                @foreach($footer->contacts as $item)
                    <li class="ms-3">
                        <a class="text-white text-decoration-none" target="_blank" href="{{ $item->url  }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>

            <ul class="nav col-md-4 justify-content-sm-start justify-content-md-end list-unstyled d-flex">
                @foreach($footer->socials as $item)
                    <li class="ms-3">
                        <a href="{{ $item->url  }}" target="_blank">
                            @if($item->iconUrl)
                                <img width="35" height="35" src="{{ $item->iconUrl }}" alt="{{ $item->title }} логотип">
                            @else
                                {{ $item->title  }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
