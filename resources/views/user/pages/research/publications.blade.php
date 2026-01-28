@extends('user.main')

@section('title', 'Publikasi - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Publikasi</h1>
                <p class="lead">Karya Ilmiah & Penelitian Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Research', 'url' => '#'], ['title' => 'Publikasi']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="display-5 fw-bold mb-5">Publikasi Lab HCI</h1>
            
            <!-- Publications Overview -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-journal-whills text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>{{ $journalCount + $conferenceCount }}+</h4>
                            <p class="mb-0">Jurnal & Konferensi</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-book text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>{{ $bookCount }}</h4>
                            <p class="mb-0">Buku</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-copyright text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>-</h4>
                            <p class="mb-0">Hak Cipta</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Journals & Conferences -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-newspaper text-primary-custom me-2"></i>Jurnal dan Konferensi</h3>
                    
                    @foreach($publications->where('type', '!=', 'book')->groupBy('year') as $year => $yearPublications)
                    <div class="mb-4">
                        <h5 class="text-primary-custom mb-3">{{ $year }}</h5>
                        @foreach($yearPublications as $publication)
                        <div class="publication-item mb-3 p-3 bg-light rounded">
                            <p class="mb-1">
                                <strong>{{ $publication->authors }}.</strong> 
                                {{ $publication->title }}. 
                                <em>{{ $publication->venue }}</em>. 
                                @if($publication->volume) Vol {{ $publication->volume }}. @endif
                                @if($publication->pages) pp. {{ $publication->pages }}. @endif
                                {{ $publication->year }}.
                                @if($publication->doi) DOI: {{ $publication->doi }}. @endif
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Books -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-book text-primary-custom me-2"></i>Buku</h3>
                    
                    <div class="row g-4">
                        @foreach($publications->where('type', 'book') as $book)
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body p-4">
                                    <h6 class="card-title">{{ $book->title }}</h6>
                                    <p class="card-text"><small class="text-muted"><strong>Penulis:</strong> {{ $book->authors }}</small></p>
                                    <p class="card-text"><small class="text-muted"><strong>Penerbit:</strong> {{ $book->publisher }}, {{ $book->year }}</small></p>
                                    @if($book->isbn)
                                    <p class="card-text"><small class="text-muted"><strong>ISBN:</strong> {{ $book->isbn }}</small></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        
                       
                    </div>
                </div>
            </div>
            
            <!-- Copyright & Dataset -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <i class="fas fa-copyright text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h5>Hak Cipta</h5>
                            <p class="text-muted">Konten menyusul</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <i class="fas fa-database text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h5>Dataset</h5>
                            <p class="text-muted">Belum tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection