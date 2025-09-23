<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Homepage</title>


  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#4361ee",
            secondary: "#3a56d4",
            dark: "#334155",
            light: "#64748b",
          },
        },
      },
    }
  </script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen">
<x-app-layout>
  

  <section class="relative py-20 text-center">
    <div class="mb-6">
      <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-r from-primary to-secondary shadow-lg animate-bounce">
        <i class="fas fa-rocket text-3xl text-white"></i>
      </div>
    </div>
    <h1 class="text-5xl md:text-7xl font-extrabold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent mb-6">
      Welcome Home
    </h1>
    <p class="text-lg md:text-xl text-light max-w-2xl mx-auto mb-8">
      Discover inspiring content, share your stories, and connect with creators.
    </p>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12">
      <div class="rounded-2xl p-6 shadow bg-white/70 backdrop-blur">
        <div class="text-4xl font-bold text-primary mb-2">{{ $postsCount }}</div>
        <p class="text-blue-600 ">Total Posts</p>
      </div>
      <div class="rounded-2xl p-6 shadow bg-white/70 backdrop-blur">
        <div class="text-4xl font-bold text-primary mb-2">{{ $users ?? '0' }}</div>
        <p class="text-blue-600 ">Active Users</p>
      </div>
      <div class="rounded-2xl p-6 shadow bg-white/70 backdrop-blur">
        <div class="text-4xl font-bold text-primary mb-2">{{ $tags ?? '0' }}</div>
        <p class="text-blue-600 ">Topics</p>
      </div>
    </div>

    @auth
    <a href="{{ route('post.create') }}" 
       class="btn btn-lg px-5 py-3 rounded-pill text-white fw-bold shadow-lg bg-gradient-to-r from-primary to-secondary hover:scale-105 transition">
      <i class="fas fa-plus me-2"></i>Create New Post
    </a>
    @endauth
  </section>


  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold text-dark mb-2">Featured Content</h2>
        <p class="text-lg text-light">Explore the latest and most engaging posts from our community</p>
      </div>

      @if($posts->count() > 0)
      <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-6 col-lg-4">
          <div class="bg-white rounded-3xl shadow p-6 h-100 hover:-translate-y-2 hover:shadow-2xl transition">
            

            <div class="d-flex align-items-center mb-4">
              <div class="w-10 h-10 rounded-circle bg-gradient-to-r from-primary to-secondary d-flex align-items-center justify-content-center text-white fw-bold">
                {{ substr($post->user->name, 0, 1) }}
              </div>
              <div class="ms-3">
                <div class="fw-semibold text-dark">{{ $post->user->name }}</div>
                <small class="text-light">{{ $post->created_at->diffForHumans() }}</small>
              </div>
            </div>

   
            <h3 class="fw-bold text-dark fs-5 mb-3 hover:text-primary transition">
              {{ $post->name }}
            </h3>

    
            @if($post->tag->count() > 0)
            <div class="mb-3 d-flex flex-wrap gap-2">
              @foreach($post->tag as $tag)
              <span class="badge rounded-pill bg-primary/10 text-primary px-3 py-2">#{{ $tag->name }}</span>
              @endforeach
            </div>
            @endif

         
            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
              <a href="{{ route('show.post',$post->id) }}" class="text-primary fw-semibold">
                Read More <i class="fas fa-arrow-right ms-2"></i>
              </a>
              @if(Auth::check() && (Auth::id() == $post->user_id || Auth::user()->role == 'admin'))
              <form method="POST" action="{{ route('post.delete', $post->id) }}">
                @method('DELETE') @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="text-center py-16">
        <i class="fas fa-file-alt text-5xl text-gray-400 mb-4"></i>
        <h3 class="fw-bold text-dark mb-2">No Posts Yet</h3>
        <p class="text-light mb-4">Be the first to share your thoughts with the community</p>
        @auth
        <a href="{{ route('post.create') }}" class="btn btn-primary rounded-pill">
          <i class="fas fa-plus me-2"></i>Create First Post
        </a>
        @endauth
      </div>
      @endif
    </div>
  </section>

  <!-- CTA -->
  @guest
  <section class="py-20 bg-gradient-to-r from-primary to-secondary text-center text-white">
    <h2 class="text-4xl font-extrabold mb-4">Join Our Community</h2>
    <p class="text-lg mb-6">Sign up today to start sharing your stories and connecting with others</p>
    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
      <a href="{{ route('register') }}" class="btn btn-light fw-bold rounded-pill px-4 py-2">Get Started Free</a>
      <a href="{{ route('login') }}" class="btn btn-outline-light fw-bold rounded-pill px-4 py-2">Sign In</a>
    </div>
  </section>
  @endguest


  <footer class="bg-dark text-white py-12 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center space-x-2 mb-4">
            <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
              <i class="fas fa-rocket text-white"></i>
            </div>
            <span class="text-xl font-bold">BlogSpace</span>
          </div>
          <p class="text-gray-400">
            A community-driven platform for sharing knowledge and stories.
          </p>
        </div>
        
        <div>
          <h4 class="font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="{{ route('posts') }}" class="hover:text-white transition-colors">Browse Posts</a></li>
            <li><a href="#" class="hover:text-white transition-colors">Popular Topics</a></li>
            <li><a href="#" class="hover:text-white transition-colors">Community Guidelines</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold mb-4">Resources</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
            <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
            <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold mb-4">Connect</h4>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2024 BlogSpace. All rights reserved.</p>
      </div>
    </div>
  </footer>

</x-app-layout>
</body>
</html>
