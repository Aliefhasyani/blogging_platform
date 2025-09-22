<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #3a56d4;
            --text-color: #334155;
            --light-text: #64748b;
            --border-color: #e2e8f0;
            --card-radius: 16px;
        }
        
        body {
            background: linear-gradient(135deg, #f0f4ff 0%, #e6e6ff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
        }
        
        .hero-section {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            margin: 2rem auto;
            max-width: 1200px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }
        
        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--light-text);
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .stats-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }
        
        .stat-label {
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .post-card {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: all 0.3s ease;
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
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .post-tags {
            margin-bottom: 1.25rem;
        }
        
        .tag-badge {
            background-color: var(--primary-light);
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
        
        .featured-section {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: 2rem 0;
        }
        
        .section-title {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 0.75rem;
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .posts-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .card-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .read-more-btn, .delete-btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="container-custom">
           
            <div class="hero-section">
                <h1 class="hero-title">Welcome to Our Community</h1>
                <p class="hero-subtitle">Discover amazing content, share your thoughts, and connect with like-minded people</p>
                
                <div class="stats-container">
                    <div class="stat-item">
                        <span class="stat-number">{{ $postsCount }}</span>
                        <span class="stat-label">Total Posts</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $users ?? '0' }}</span>
                        <span class="stat-label">Active Users</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $tags ?? '0' }}</span>
                        <span class="stat-label">Topics</span>
                    </div>
                </div>
            </div>
            
       
            <div class="featured-section">
                <h2 class="section-title"><i class="fas fa-fire"></i> Popular Posts</h2>
                
                <div class="posts-grid">
                    @forelse($posts as $post)
                    <div class="post-card">
                        <div class="card-body">
                            <h3 class="post-title">{{ $post->name }}</h3>
                            
                            <div class="post-tags">
                                @foreach($post->tag as $tag)
                                <span class="tag-badge">#{{ $tag->name }}</span>
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
                                
                                @if(!Auth::check())
                                <div></div>
                                @elseif(Auth::id() == $post->user_id || Auth::user()->role == 'admin')
                                <form method="POST" action="{{ route('post.delete', $post->id) }}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this post?')">
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
                        @auth
                        <a href="{{route('post.create')}}" class="create-post-btn">
                            <i class="fas fa-plus me-2"></i> Create Post
                        </a>
                        @endauth
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

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
            
      
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Are you sure you want to delete this post?')) {
                        e.preventDefault();
                    }
                });
            });
        </script>
    </x-app-layout>
</body>
</html>