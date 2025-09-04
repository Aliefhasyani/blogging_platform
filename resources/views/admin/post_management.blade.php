<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --light-bg: #f8fafc;
            --border-radius: 12px;
        }
        
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
        }
        
        .container {
            max-width: 900px;
            margin-top: 2rem;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .header h1 {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        
        .stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-card {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            flex: 1;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            font-size: 1.2rem;
        }
        
        .stat-content h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .stat-content p {
            margin: 0;
            color: #64748b;
            font-size: 0.9rem;
        }
        
        .table-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .minimal-table {
            margin: 0;
            border: none;
            width: 100%;
        }
        
        .minimal-table th {
            background-color: #f1f5f9 !important;
            font-weight: 600;
            color: #334155;
            padding: 1rem 1.5rem;
            border: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .minimal-table td {
            border: none;
            padding: 1.2rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .minimal-table tr:last-child td {
            border-bottom: none;
        }
        
        .minimal-table tr:hover {
            background-color: #f8fafc !important;
        }
        
        .author-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .author-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        .post-title {
            font-weight: 600;
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .post-title:hover {
            color: var(--primary-color);
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #64748b;
            transition: all 0.2s;
        }
        
        .btn-icon:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .search-box {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border-radius: var(--border-radius);
            border: 1px solid #e2e8f0;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
        }
        
        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        
        @media (max-width: 768px) {
            .stats {
                flex-direction: column;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .actions {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-file-alt me-2"></i>Posts Management</h1>
            <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> New Post</button>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-file"></i>
                </div>
                <div class="stat-content">
                    <h3>{{$postsCount}}</h3>
                    <p>Total Posts</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h3>{{$usersCount}}</h3>
                    <p>Active Authors</p>
                </div>
            </div>
            
        </div>
        
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search posts...">
        </div>
        
        <div class="table-container">
            <div class="table-responsive">
                <table class="table minimal-table align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Name</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td><a href="#" class="post-title">{{$post->name}}</a></td>
                            <td>
                                <div class="author-badge">
                                    <div class="">{{$post->user->name}}</div>
                                    <span></span>
                                </div>
                            </td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <div class="actions">
                                    <a href="#" class="btn-icon"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn-icon"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn-icon"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
       
</x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>