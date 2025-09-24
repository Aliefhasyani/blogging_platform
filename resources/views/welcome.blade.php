<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Homepage</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
  <x-app-layout>

    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden text-center">
      <!-- Background Circles -->
      <div class="absolute inset-0 -z-10">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
      </div>

      <div class="container">
        <!-- Icon -->
        <div class="mb-6">
          <div class="d-inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg animate-bounce">
            <i class="fas fa-rocket text-3xl text-white"></i>
          </div>
        </div>

        <!-- Heading -->
        <h1 class="display-4 fw-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-4">
          Welcome to Your Creative Space
        </h1>
        <p class="lead text-gray-600 fs-4 mb-5">
          Discover inspiring content, share your unique stories, and connect with a vibrant community of creators.
        </p>

        <!-- Stats -->
        <div class="row g-4 justify-content-center mb-6">
          <div class="col-4">
            <div class="rounded-3 shadow p-4 bg-white/70 backdrop-blur">
              <h2 class="h2 fw-bold text-blue-600">{{ $postsCount }}</h2>
              <p class="text-gray-500 small">Total Posts</p>
            </div>
          </div>
          <div class="col-4">
            <div class="rounded-3 shadow p-4 bg-white/70 backdrop-blur">
              <h2 class="h2 fw-bold text-blue-600">{{ $users ?? '0' }}</h2>
              <p class="text-gray-500 small">Active Users</p>
            </div>
          </div>
          <div class="col-4">
            <div class="rounded-3 shadow p-4 bg-white/70 backdrop-blur">
              <h2 class="h2 fw-bold text-blue-600">{{ $tags ?? '0' }}</h2>
              <p class="text-gray-500 small">Topics</p>
            </div>
          </div>
        </div>

        <!-- CTA -->
        @auth
          <a href="{{ route('post.create') }}" class="btn btn-lg btn-primary px-5 py-3 rounded-pill fw-bold shadow">
            <i class="fas fa-plus me-2"></i>Create New Post
          </a>
        @else
          <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-lg btn-primary px-5 py-3 rounded-pill fw-bold shadow">
              Get Started Free
            </a>
            <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary px-5 py-3 rounded-pill fw-bold">
              Sign In
            </a>
          </div>
        @endauth
      </div>
    </section>


    <section class="py-20 bg-white">
      <div class="container">
        <div class="row text-center mb-12">
          <div class="col-lg-8 mx-auto">
            <h2 class="display-6 fw-bold text-gray-800">Featured Content</h2>
            <p class="text-gray-500 fs-5">Explore the latest and most engaging posts from our creative community</p>
          </div>
        </div>

        @if($posts->count() > 0)
          <div class="row g-4">
            @foreach($posts as $post)
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 p-4">
             
                  <div class="d-flex align-items-center mb-4">
                    <div class="w-10 h-10 rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold me-3">
                      {{ substr($post->user->name, 0, 1) }}
                    </div>

                    <div class="ms-3">
                      <div class="fw-semibold text-dark">{{ $post->user->name }}</div>
                      <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                  </div>

                  <h3 class="fw-bold fs-5 mb-3 text-gray-800 hover:text-blue-600">
                    {{ $post->name }}
                  </h3>

                  @if($post->tag->count() > 0)
                    <div class="mb-3">
                      @foreach($post->tag as $tag)
                        <span class="badge bg-light text-primary border px-3 py-2 me-2 mb-2">#{{ $tag->name }}</span>
                      @endforeach
                    </div>
                  @endif


                  <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <a href="{{ route('show.post',$post->id) }}" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                      Read More <i class="fas fa-arrow-right ms-2 small"></i>
                    </a>
                    @if(Auth::check() && (Auth::id() == $post->user_id || Auth::user()->role == 'admin'))
                      <form method="POST" action="{{ route('post.delete', $post->id) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this post?')" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                          <i class="fas fa-trash me-1"></i>Delete
                        </button>
                      </form>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @else

          <div class="text-center py-12">
            <div class="w-24 h-24 d-flex align-items-center justify-content-center mx-auto mb-4 bg-gray-100 rounded-3">
              <i class="fas fa-file-alt text-3xl text-gray-400"></i>
            </div>
            <h3 class="h2 fw-bold text-dark">No Posts Yet</h3>
            <p class="text-gray-500 fs-5 mb-4">Be the first to share your thoughts with the community</p>
            @auth
              <a href="{{ route('post.create') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
                <i class="fas fa-plus me-2"></i>Create First Post
              </a>
            @endauth
          </div>
        @endif
      </div>
    </section>

    

  </x-app-layout>
</body>
</html>
