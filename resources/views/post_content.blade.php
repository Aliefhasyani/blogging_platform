<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->name }} | Post Detail</title>
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
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }
        
        .post-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .post-card {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .post-header {
            padding: 2.5rem 2.5rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .post-title {
            font-weight: 800;
            font-size: 2.25rem;
            line-height: 1.3;
            color: var(--text-color);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .post-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .post-author {
            display: flex;
            align-items: center;
            color: var(--light-text);
        }
        
        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 0.75rem;
        }
        
        .post-date {
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .post-tags {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .post-tag {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .post-content {
            padding: 2rem 2.5rem;
            line-height: 1.8;
            font-size: 1.1rem;
            color: var(--text-color);
        }
        
        .post-actions {
            padding: 1.5rem 2.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-back {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .btn-back:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .comment-section {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .comment-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }
        
        .comment-header h3 {
            margin: 0;
            font-weight: 700;
            color: var(--text-color);
        }
        
        .comment-count {
            background: var(--primary-color);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .comment-form {
            padding: 2rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .comment-form h5 {
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: var(--text-color);
        }
        
        .comment-form textarea {
            width: 100%;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 1rem;
            resize: vertical;
            min-height: 120px;
            margin-bottom: 1rem;
            transition: border-color 0.3s;
        }
        
        .comment-form textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .comment-form button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .comment-form button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .comments-list {
            padding: 0 2rem;
        }
        
        .comment {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
        }
        
        .comment:last-child {
            border-bottom: none;
        }
        
        .comment-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            margin-right: 1.25rem;
            flex-shrink: 0;
        }
        
        .comment-content {
            flex-grow: 1;
        }
        
        .comment-author {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .comment-author strong {
            margin-right: 0.75rem;
            color: var(--text-color);
        }
        
        .comment-date {
            color: var(--light-text);
            font-size: 0.85rem;
        }
        
        .comment-text {
            line-height: 1.6;
            color: var(--text-color);
            margin-bottom: 0.75rem;
        }
        
        .comment-actions {
            display: flex;
            gap: 1rem;
        }
        
        .comment-action {
            color: var(--light-text);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            transition: color 0.2s;
        }
        
        .comment-action:hover {
            color: var(--primary-color);
        }
        
        .empty-comments {
            padding: 3rem 2rem;
            text-align: center;
            color: var(--light-text);
        }
        
        .empty-comments i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #cbd5e1;
        }
        
        @media (max-width: 768px) {
            .post-title {
                font-size: 1.75rem;
            }
            
            .post-header,
            .post-content,
            .comment-form,
            .comments-list {
                padding: 1.5rem;
            }
            
            .post-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .comment {
                flex-direction: column;
            }
            
            .comment-avatar {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="post-container">
      
            <div class="post-card">
                <div class="post-header">
                    <h1 class="post-title">{{ $post->name }}</h1>
                    
                    <div class="post-meta">
                        <div class="post-author">
                            <div class="author-avatar">{{ substr($post->user->name, 0, 1) }}</div>
                            <span>By {{ $post->user->name }}</span>
                        </div>
                        <div class="post-date">
                            Last updated {{ $post->updated_at->format('M j, Y') }}
                        </div>
                    </div>
                    
                    <div class="post-tags">
                        @foreach($post->tag as $tag)
                            <span class="post-tag">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                
                <div class="post-content">
                    {{ $post->content }}
                </div>
                
                <div class="post-actions">
                    <a href="{{ url()->previous() }}" class="btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to Posts
                    </a>
                </div>
            </div>
            
            
            <div class="comment-section">
                <div class="comment-header">
                    <h3>Comments</h3>
                    <div class="comment-count">{{ $post->comment->count() }}</div>
                </div>
                
               
                <div class="comment-form">
                    <h5>Add a comment</h5>
                    <form method="POST" action="{{route('comment.create',$post->id)}}">
                        @csrf
                        <textarea placeholder="Share your thoughts..." name="comment"></textarea>
                        <div class="d-flex justify-content-end">
                            <button type="submit">Post Comment</button>
                        </div>
                    </form>
                </div>
                
                
                <div class="comments-list">
                    @forelse($post->comment as $comment)
                        <div class="comment">
                            <div class="comment-avatar">{{ substr($comment->user->name, 0, 1) }}</div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <span class="comment-date">{{ $comment->created_at->format('M j, Y \\a\\t g:i a') }}</span>
                                </div>
                                <p class="comment-text">
                                    {{ $comment->comment }}
                                </p>
                                <div class="comment-actions">
                                    <a href="#" class="comment-action">
                                        <i class="far fa-heart"></i> Like
                                    </a>
                                    <a href="#" class="comment-action">
                                        <i class="far fa-comment"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-comments">
                            <i class="far fa-comments"></i>
                            <h5>No comments yet</h5>
                            <p>Be the first to share your thoughts!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                const comments = document.querySelectorAll('.comment');
                
                comments.forEach((comment, index) => {
                    comment.style.opacity = '0';
                    comment.style.transform = 'translateY(10px)';
                    
                    setTimeout(() => {
                        comment.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        comment.style.opacity = '1';
                        comment.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            });
        </script>
    </x-app-layout>
</body>
</html>