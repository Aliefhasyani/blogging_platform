<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --light-text: #6c757d;
            --border-color: #e9ecef;
        }
        
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        
        .card-title {
            font-weight: 800;
            line-height: 1.3;
        }
        
        .badge {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }
        
        .comment-section {
            margin-top: 3rem;
        }
        
        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .comment-header h3 {
            margin: 0;
            font-weight: 700;
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
        }
        
        .comment-form {
            background: var(--secondary-color);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
        
        .comment-form textarea {
            resize: none;
            border-radius: 10px;
            padding: 1rem;
            border: 1px solid var(--border-color);
        }
        
        .comment-form button {
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
        }
        
        .comment {
            display: flex;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .comment:last-child {
            border-bottom: none;
        }
        
        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            margin-right: 1rem;
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
            margin-right: 0.5rem;
        }
        
        .comment-date {
            color: var(--light-text);
            font-size: 0.85rem;
        }
        
        .comment-actions {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        
        .comment-actions a {
            color: var(--light-text);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .comment-actions a:hover {
            color: var(--primary-color);
        }
        
        .btn-like {
            transition: all 0.2s;
        }
        
        .btn-like:hover, .btn-like.active {
            color: #dc3545;
        }
        
        .btn-reply:hover {
            color: var(--primary-color);
        }
        
        .replies {
            margin-left: 3rem;
            margin-top: 1rem;
            padding-left: 1rem;
            border-left: 3px solid var(--border-color);
        }
        
        .comment-form.reply-form {
            margin-left: 3rem;
            margin-top: 1rem;
            display: none;
        }
        
        .comment-form.reply-form.active {
            display: block;
        }
        
        .comment-text {
            line-height: 1.6;
            color: #444;
        }
        
        .comment-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }
        
        @media (max-width: 768px) {
            .replies, .comment-form.reply-form {
                margin-left: 1rem;
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

                       
                        <div class="comment-section">
                            <div class="comment-header">
                                <h3>Comments</h3>
                                
                            </div>

                       
                            <div class="comment-form">
                                <h5 class="mb-3">Add a comment</h5>
                                <form>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="4" placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </form>
                            </div>

                       
                            <div class="comments-list">
                          
                                <div class="comment">
                                    @foreach($post->comment as $comment)
                                    <div class="comment-avatar">X</div>
                                    <div class="comment-content">
                                        <div class="comment-author">
                                            
                                                <strong>{{$comment->user->name}}</strong>
                                           
                                            <span class="comment-date">{{$comment->created_at}}</span>
                                        </div>
                                        <p class="comment-text">
                                           {{$comment->comment}}
                                        </p>
                                 
                                  
                                   
                                    </div>
                                    @endforeach
                                </div>

                               
                                

                                
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>
</body>
</html>