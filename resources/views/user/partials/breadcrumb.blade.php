<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none" style="color: #841818;">
                    <i class="fas fa-home me-1"></i>Home
                </a>
            </li>
            @if(isset($breadcrumbs))
                @foreach($breadcrumbs as $breadcrumb)
                    @if($loop->last)
                        <li class="breadcrumb-item active" aria-current="page" style="color: #841818;">{{ $breadcrumb['title'] }}</li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}" class="text-decoration-none" style="color: #841818;">{{ $breadcrumb['title'] }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ol>
    </div>
</nav>