<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

  
  <div class="mb-4 text-center">
    <h4 class="fw-bold mb-3">Browse by Tag</h4>
    @foreach($tags as $tag)
     
        <a href="{{route('show.tag',$tag->id)}}" class="badge bg-primary me-2 px-3 py-2 fs-6" style="text-decoration:none;">
          {{ $tag->name }}
        </a>
      
    @endforeach
  </div>

  <div class="row g-4">
      @forelse($posts as $post)
        <div class="col-md-4">
          <div class="card h-100 shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body d-flex flex-column">

              <h5 class="card-title fw-bold mb-3 text-primary">{{ $post->name }}</h5>

              <div class="mb-3">
                @foreach($post->tag as $tag)
                  <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
                @endforeach
              </div>

              <p class="text-muted small mb-3">
                <i class="bi bi-person-circle me-1"></i> 
                <span class="fw-semibold">By {{ $post->user->name }}</span>
              </p>

              <div class="mt-auto">
                <a href="{{ route('show.post',$post->id) }}" 
                  class="btn btn-sm btn-primary rounded-pill px-3">
                  Read More <i class="bi bi-arrow-right"></i>
                </a>
              </div>

            </div>
          </div>
        </div>
        @empty
          <p class="text-center">No Post Found</p>
        @endforelse
      </div>

  </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<style>
  .hover-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  }
</style>
</x-app-layout>
