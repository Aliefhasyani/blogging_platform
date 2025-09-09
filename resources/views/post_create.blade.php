<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Post</title>
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
        
        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .form-card {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            padding: 2.5rem;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .form-header h1 {
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: var(--light-text);
            font-size: 1.1rem;
        }
        
        .form-group {
            margin-bottom: 1.75rem;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--text-color);
            font-size: 1.1rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .form-textarea {
            min-height: 200px;
            resize: vertical;
        }
        
        .user-info {
            background-color: var(--primary-light);
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin: 1.5rem 0;
            border-left: 4px solid var(--primary-color);
        }
        
        .user-info p {
            margin: 0;
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 1rem;
        }
        
        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .submit-btn i {
            margin-right: 0.5rem;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .character-count {
            text-align: right;
            font-size: 0.85rem;
            color: var(--light-text);
            margin-top: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .form-card {
                padding: 1.75rem;
            }
            
            .form-header h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <h1><i class="fas fa-plus-circle me-2"></i>Create New Post</h1>
                    <p>Share your thoughts and ideas with the community</p>
                </div>
                
                <form method="POST" action="{{route('post.store')}}">  
                    @csrf
                    
                    <div class="form-group">
                        <label for="post-title" class="form-label">
                            <i class="fas fa-heading me-1"></i> Title
                        </label>
                        <input id="post-title" name="name" type="text" class="form-input" placeholder="Enter a compelling title..." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="post-content" class="form-label">
                            <i class="fas fa-edit me-1"></i> Post Content
                        </label>
                        <textarea id="post-content" name="content" class="form-input form-textarea" placeholder="What's on your mind?..." required></textarea>
                        <div class="character-count">
                            <span id="char-count">0</span> characters
                        </div>
                    </div>
                    
                    <div class="user-info">
                        <p><i class="fas fa-user-circle me-1"></i> This post will be made under the name "{{Auth::user()->name}}"</p>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane me-2"></i> Create Post
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Need inspiration? <a href="{{route('posts')}}">Browse existing posts</a></p>
                </div>
            </div>
        </div>

        <script>
    
            const textarea = document.getElementById('post-content');
            const charCount = document.getElementById('char-count');
            
            textarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                
              
                if (this.value.length > 1000) {
                    charCount.style.color = '#ef4444';
                } else if (this.value.length > 500) {
                    charCount.style.color = '#f59e0b';
                } else {
                    charCount.style.color = '#64748b';
                }
            });
            

            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const title = document.getElementById('post-title').value.trim();
                const content = document.getElementById('post-content').value.trim();
                
                if (!title) {
                    e.preventDefault();
                    alert('Please enter a title for your post');
                    document.getElementById('post-title').focus();
                    return;
                }
                
                if (!content) {
                    e.preventDefault();
                    alert('Please enter content for your post');
                    document.getElementById('post-content').focus();
                    return;
                }
            });
        </script>
    </x-app-layout>
</body>
</html>