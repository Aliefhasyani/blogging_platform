<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
  <div class="row">
    @foreach($posts as $post)
      <div class="col-md-4 mb-3"> <!-- each card is one column -->
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{$post->name}}</h5>
            
            @foreach($post->tag as $tag)
              <h6 class="card-subtitle mb-2 text-body-secondary">{{$tag->name}}</h6>
            @endforeach

            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
</x-app-layout>
