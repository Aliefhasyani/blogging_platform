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



      <div class="row g-4">
            @foreach($posts as $post)
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 p-4 d-flex flex-column">

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

                  <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
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


    <div class="mt-12">
      {{ $posts->links() }}
    </div>
  </div>


  

</x-app-layout>

</body>
</html>
