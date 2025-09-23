<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>


  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4361ee',
            secondary: '#3a56d4',
            dark: '#334155',
            light: '#64748b',
          },
          animation: {
            'fade-in-up': 'fadeInUp 0.5s ease-out',
          },
          keyframes: {
            fadeInUp: {
              '0%': { opacity: '0', transform: 'translateY(20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>

  <style>
    .gradient-text {
      background: linear-gradient(135deg, #4361ee 0%, #3a56d4 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-hover:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    .glass-effect {
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 text-slate-700">

<x-app-layout>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <div class="text-center mb-16">
      <h1 class="text-5xl font-black gradient-text mb-4 animate-fade-in-up">Explore Posts</h1>
      <p class="text-lg text-light max-w-2xl mx-auto leading-relaxed">
        Discover insights, stories, and knowledge shared by our community
      </p>
    </div>


    <div class="glass-effect rounded-3xl p-8 shadow-lg mb-12 animate-fade-in-up">
      <h4 class="text-2xl font-bold text-dark mb-6">Browse by Tag</h4>
      <div class="flex flex-wrap gap-3">
        @foreach($tags as $tag)
       <a href="{{ route('show.tag',$tag->id) }}"
          class="px-5 py-2 rounded-full border-2 border-indigo-600 text-indigo-600 font-semibold 
                  hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-sm">
          #{{ $tag->name }}
        </a>

        @endforeach
      </div>
    </div>

    <a href="{{ url()->previous() }}" 
      class="inline-flex items-center px-6 py-3 mb-10 border-2 border-indigo-600 text-indigo-600 font-semibold rounded-2xl 
              hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-sm">
      <i class="fa fa-arrow-left mr-2"></i> Go Back
    </a>



    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      @forelse($posts as $post)
        <div class="card-hover bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col">
          <div class="p-6 flex flex-col flex-grow">

            <h3 class="text-xl font-bold text-dark mb-3 line-clamp-2 group-hover:text-primary transition-colors">
              {{ $post->name }}
            </h3>

   
            <div class="flex flex-wrap gap-2 mb-4">
              @foreach($post->tag as $tag)
                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-medium">
                  #{{ $tag->name }}
                </span>
              @endforeach
            </div>


            <div class="flex items-center text-light text-sm mb-6">
              <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center text-white font-bold mr-3">
                {{ substr($post->user->name, 0, 1) }}
              </div>
              <span class="text-slate-800 font-bold">By {{ $post->user->name }}</span>
            </div>

    
            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
              <a href="{{ route('show.post',$post->id) }}" 
                 class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-primary to-secondary text-white font-semibold rounded-2xl 
                        hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                Read More <i class="fas fa-arrow-right ml-2"></i>
              </a>

              @if(Auth::check() && (Auth::id() == $post->user_id || Auth::user()->role == 'admin'))
                <form method="POST" action="{{ route('post.delete', $post->id) }}" class="inline">
                  @method('DELETE')
                  @csrf
                  <button type="submit"
                          onclick="return confirm('Are you sure you want to delete this post?')"
                          class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              @endif
            </div>
          </div>
        </div>
      @empty
   
        <div class="col-span-full text-center py-20">
          <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-file-alt text-4xl text-gray-400"></i>
          </div>
          <h3 class="text-2xl font-bold text-dark mb-2">No Posts Yet</h3>
          <p class="text-light mb-6">Be the first to share your thoughts with the community</p>
          @auth
            <a href="{{ route('post.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-primary text-white font-semibold rounded-2xl hover:bg-secondary transition-colors">
              <i class="fas fa-plus mr-2"></i> Create Post
            </a>
          @endauth
        </div>
      @endforelse
    </div>


    <div class="mt-12">
      {{ $posts->links() }}
    </div>
  </div>


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
