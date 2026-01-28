@extends('user.main')

@section('title', 'Penelitian - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Penelitian</h1>
                <p class="lead">Riset & Inovasi Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Research', 'url' => '#'], ['title' => 'Penelitian']]])

<div class="container section-padding">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="position-sticky" style="top: 120px;">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="text-primary-custom mb-4"><i class="fas fa-list me-2"></i>Topik Penelitian</h5>
                        <ul class="list-unstyled">
                            @foreach($researchTopics as $topic)
                            <li class="mb-2">
                                <a href="#{{ $topic->slug }}" class="text-decoration-none d-block p-2 rounded" style="color: #2c3e50; transition: all 0.3s;" onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.color='#841818'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#2c3e50'">
                                    <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>{{ $topic->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Current Projects -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-project-diagram text-primary-custom me-2"></i>Proyek Penelitian</h3>
                    
                    @foreach($researchProjects->groupBy('year') as $year => $projects)
                    <div class="mb-5">
                        <h4 class="text-primary-custom mb-3">{{ $year }}</h4>
                        @foreach($projects as $project)
                        <div class="card bg-light border-0 mb-3">
                            <div class="card-body p-4">
                                <h6 class="card-title">{{ $project->title }}</h6>
                                @if($project->description)
                                <p class="card-text text-muted mb-2">{{ $project->description }}</p>
                                @endif
                                <span class="badge {{ $project->status === 'ongoing' ? 'bg-primary' : 'bg-success' }}">{{ $project->funding_source }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            
           
        </div>
    </div>
</div>
@endsection