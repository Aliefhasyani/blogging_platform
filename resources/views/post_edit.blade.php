<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
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
            position: relative;
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
        
        .edit-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
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
            min-height: 250px;
            resize: vertical;
            line-height: 1.6;
        }
        
        /* Tag Selector Styles */
        .tag-selector-container {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .tag-selector {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s;
            min-height: 120px;
        }
        
        .tag-selector:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .tag-selector option {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .tag-selector option:hover {
            background-color: var(--primary-light);
        }
        
        .tag-selector option:checked {
            background-color: var(--primary-color);
            color: white;
        }
        
        .tag-help {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        .selected-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
            min-height: 40px;
        }
        
        .tag-pill {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }
        
        .tag-pill i {
            margin-left: 0.5rem;
            cursor: pointer;
            font-size: 0.8rem;
            transition: color 0.2s;
        }
        
        .tag-pill i:hover {
            color: var(--secondary-color);
        }
        
        .user-info {
            background-color: var(--primary-light);
            border-radius: 10px;
            padding: 1.25rem 1.5rem;
            margin: 1.5rem 0;
            border-left: 4px solid var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .user-info i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }
        
        .user-info p {
            margin: 0;
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--light-text);
            border: 2px solid var(--border-color);
            text-decoration: none;
            text-align: center;
        }
        
        .btn-secondary:hover {
            background-color: #f8fafc;
            color: var(--text-color);
            transform: translateY(-2px);
        }
        
        .character-count {
            text-align: right;
            font-size: 0.85rem;
            color: var(--light-text);
            margin-top: 0.5rem;
        }
        
        .character-warning {
            color: #ef4444;
            font-weight: 600;
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
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .form-card {
                padding: 1.75rem;
            }
            
            .form-header h1 {
                font-size: 1.75rem;
            }
            
            .tag-selector {
                min-height: 100px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .edit-badge {
                position: relative;
                margin-bottom: 1rem;
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <span class="edit-badge">Editing Post</span>
                    <h1><i class="fas fa-edit me-2"></i>Edit Your Post</h1>
                    <p>Update your thoughts and ideas</p>
                </div>
                
                <form method="POST" action="{{route('adminPost.update',$post->id)}}">  
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="post-title" class="form-label">
                            <i class="fas fa-heading me-1"></i> Title
                        </label>
                        <input id="post-title" name="name" type="text" class="form-input" placeholder="Enter a compelling title..." value="{{ old('name', $post->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="post-content" class="form-label">
                            <i class="fas fa-edit me-1"></i> Post Content
                        </label>
                        <textarea id="post-content" name="content" class="form-input form-textarea" placeholder="What's on your mind?..." required>{{ old('content', $post->content) }}</textarea>
                        <div class="character-count">
                            <span id="char-count">0</span> characters
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tags me-1"></i> Tags
                        </label>
                        <div class="tag-selector-container">
                            <select name="tags[]" multiple class="tag-selector" id="tag-selector">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tag->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="tag-help">
                            <i class="fas fa-info-circle me-1"></i> Hold Ctrl/Cmd to select multiple tags
                        </div>
                        <div class="selected-tags" id="selected-tags">
                      
                        </div>
                    </div>
                    
                    <div class="user-info">
                        <i class="fas fa-user-circle"></i>
                        <p>This post will be modified under the name "{{ Auth::user()->name }}"</p>
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Update Post
                        </button>
                    </div>
                </form>
                
                <div class="form-footer">
                    <p>Need inspiration? <a href="{{ route('posts') }}">Browse existing posts</a></p>
                </div>
            </div>
        </div>

        <script>
  
            const textarea = document.getElementById('post-content');
            const charCount = document.getElementById('char-count');
            

            charCount.textContent = textarea.value.length;
            updateCharacterCountColor(textarea.value.length);
            
            textarea.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = length;
                updateCharacterCountColor(length);
            });
            
            function updateCharacterCountColor(length) {
                if (length > 1000) {
                    charCount.classList.add('character-warning');
                } else {
                    charCount.classList.remove('character-warning');
                }
            }
            
 
            const tagSelector = document.getElementById('tag-selector');
            const selectedTagsContainer = document.getElementById('selected-tags');
     
            function updateSelectedTags() {
                selectedTagsContainer.innerHTML = '';
                const selectedOptions = Array.from(tagSelector.selectedOptions);
                
                if (selectedOptions.length === 0) {
                    selectedTagsContainer.innerHTML = '<span class="text-muted">No tags selected</span>';
                    return;
                }
                
                selectedOptions.forEach(option => {
                    const tagPill = document.createElement('div');
                    tagPill.className = 'tag-pill';
                    tagPill.innerHTML = `
                        ${option.text}
                        <i class="fas fa-times" data-value="${option.value}"></i>
                    `;
                    selectedTagsContainer.appendChild(tagPill);
                });
                
       
                document.querySelectorAll('.tag-pill i').forEach(icon => {
                    icon.addEventListener('click', function(e) {
                        e.preventDefault();
                        const value = this.getAttribute('data-value');
                        const option = tagSelector.querySelector(`option[value="${value}"]`);
                        option.selected = false;
                        updateSelectedTags();
                    });
                });
            }
            
            
            tagSelector.addEventListener('change', updateSelectedTags);
            updateSelectedTags();
            
        
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