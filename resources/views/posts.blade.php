<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Posts Gallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3a56d4;
      --text-color: #334155;
      --light-text: #64748b;
      --light-bg: #f8fafc;
      --card-radius: 16px;
    }
    
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
    }
    
    .container {
      max-width: 1200px;
      padding-top: 2rem;
      padding-bottom: 3rem;
    }
    
    .header {
      text-align: center;
      margin-bottom: 3rem;
    }
    
    .header h1 {
      font-weight: 800;
      color: var(--text-color);
      margin-bottom: 1rem;
    }
    
    .header p {
      color: var(--light-text);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .tag-filter {
      background: white;
      border-radius: var(--card-radius);
      padding: 1.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
      margin-bottom: 2.5rem;
    }
    
    .tag-filter h4 {
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--text-color);
    }
    
    .tag-btn {
      border: 2px solid var(--primary-color);
      border-radius: 50px;
      padding: 0.5rem 1.25rem;
      margin: 0.35rem;
      color: var(--primary-color);
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }
    
    .tag-btn:hover {
      background-color: var(--primary-color);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
    }
    
    .posts-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 2rem;
    }
    
    .post-card {
      background: white;
      border-radius: var(--card-radius);
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    .post-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }
    
    .card-body {
      padding: 1.75rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    
    .post-title {
      font-weight: 700;
      color: var(--text-color);
      margin-bottom: 1rem;
      font-size: 1.25rem;
      line-height: 1.4;
    }
    
    .post-tags {
      margin-bottom: 1.25rem;
    }
    
    .tag-badge {
      background-color: var(--light-bg);
      color: var(--primary-color);
      border-radius: 50px;
      padding: 0.35rem 0.75rem;
      font-size: 0.8rem;
      font-weight: 500;
      margin-right: 0.5rem;
      margin-bottom: 0.5rem;
      display: inline-block;
    }
    
    .post-author {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
      color: var(--light-text);
    }
    
    .author-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background-color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      margin-right: 0.75rem;
      font-size: 0.9rem;
    }
    
    .card-actions {
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .read-more-btn {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 0.5rem 1.25rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
    }
    
    .read-more-btn:hover {
      background-color: var(--secondary-color);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }
    
    .delete-btn {
      background-color: transparent;
      border: 1px solid #ef4444;
      color: #ef4444;
      border-radius: 50px;
      padding: 0.5rem 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
    }
    
    .delete-btn:hover {
      background-color: #ef4444;
      color: white;
      transform: translateY(-2px);
    }
    
    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
      grid-column: 1 / -1;
    }
    
    .empty-icon {
      font-size: 4rem;
      color: #cbd5e1;
      margin-bottom: 1.5rem;
    }
    
    .empty-state h5 {
      font-weight: 700;
      color: var(--text-color);
      margin-bottom: 0.5rem;
    }
    
    .empty-state p {
      color: var(--light-text);
      margin-bottom: 1.5rem;
    }
    
    .create-post-btn {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }
    
    .create-post-btn:hover {
      background-color: var(--secondary-color);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }
    
    @media (max-width: 768px) {
      .posts-grid {
        grid-template-columns: 1fr;
      }
      
      .tag-filter {
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <x-app-layout>
    <div class="container">
      <div class="header">
        <h1>Explore Posts</h1>
        <p>Discover insights, stories, and knowledge shared by our community</p>
      </div>
      
      <div class="tag-filter">
        <h4>Browse by Tag</h4>
        <div class="tags-container">
          @foreach($tags as $tag)
            <a href="{{route('show.tag',$tag->id)}}" class="tag-btn">
              {{ $tag->name }}
            </a>
          @endforeach
        </div>
      </div>

      <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-m rounded-5 mb -3"> Go back </a>
      
      <div class="posts-grid mt-3">
        @forelse($posts as $post)
          <div class="post-card">
            <div class="card-body">
              <h3 class="post-title">{{ $post->name }}</h3>
              
              <div class="post-tags">
                @foreach($post->tag as $tag)
                  <span class="tag-badge">{{ $tag->name }}</span>
                @endforeach
              </div>
              
              <div class="post-author">
                <div class="author-avatar">{{ substr($post->user->name, 0, 1) }}</div>
                <span>By {{ $post->user->name }}</span>
              </div>
              
              <div class="card-actions">
                <a href="{{ route('show.post',$post->id) }}" class="read-more-btn">
                  Read More <i class="fas fa-arrow-right ms-2"></i>
                </a>
                
                @if(Auth::id() == $post->user_id || Auth::user()->role == 'admin')
                  <form method="POST" action="{{ route('post.delete', $post->id) }}" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="delete-btn">
                      <i class="fas fa-trash me-1"></i> Delete
                    </button>
                  </form>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="empty-state">
            <div class="empty-icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <h5>No Posts Found</h5>
            <p>Try creating a new post or check back later.</p>
            <a href="#" class="create-post-btn">
              <i class="fas fa-plus me-2"></i> Create Post
            </a>
          </div>
        @endforelse
      </div>
    </div>
  </x-app-layout>

  <script>
    
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.post-card');
      
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>