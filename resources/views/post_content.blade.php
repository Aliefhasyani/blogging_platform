<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <div class="card-body p-5">
                            
                    <h2 class="card-title mb-4 text-center fw-bold text-dark display-5">
                        {{ $post->name }}
                    </h2>

         
                    <div class="mb-4 text-center">
                        @foreach($post->tag as $tag)
                            <span class="badge bg-primary me-2 px-3 py-2 fs-6">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>

            
                    <p class="card-text text-secondary fs-5 lh-lg mt-4">
                        {{ $post->content }}<br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad a nisi facilis inventore molestias quos officiis, fugit autem quidem vitae consectetur incidunt quia magni, quo quibusdam cum reiciendis modi rerum!
                    </p>

          

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-sm">Back to Posts</a>
                        <span class="text-muted small">Last updated {{ $post->updated_at}}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
