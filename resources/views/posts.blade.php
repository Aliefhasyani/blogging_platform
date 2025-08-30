<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
  <div class="row">
    @foreach($posts as $post)
      <div class="col-md-4 mb-3"> 
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold">{{ $post->name }}</h5>
            
            <div class="mb-3">
          
              @foreach($post->tag as $tag)
                <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
              @endforeach
            </div>

            <p class="text-muted mb-2">
              <i class="bi bi-person-circle me-1"></i> 
              <span class="fw-semibold">By {{ $post->user->name }}</span>
            </p>

            <a href="{{ route('show.post',$post->id) }}" class="card-link btn btn-sm btn-primary">Read More</a>
  
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</x-app-layout>
