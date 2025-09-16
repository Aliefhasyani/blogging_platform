<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --text-color: #334155;
            --light-text: #64748b;
            --border-color: #e2e8f0;
            --card-radius: 12px;
        }
        
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .dashboard-header {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
        }
        
        .dashboard-header h1 {
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        .dashboard-header p {
            color: var(--light-text);
            font-size: 1.1rem;
            margin-bottom: 0;
        }
        
        .welcome-card {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .welcome-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .welcome-message {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 1.5rem;
        }
        
        .admin-actions {
            text-align: center;
            margin-top: 2rem;
        }
        
        .action-button {
            display: inline-flex;
            align-items: center;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .action-button:hover {
            background: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
            color: white;
        }
        
        .action-button i {
            margin-right: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .dashboard-header, .welcome-card {
                padding: 1.5rem;
            }
            
            .dashboard-header h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="dashboard-container">
         
            <div class="dashboard-header">
                <h1><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>
                <p>Administrative control panel</p>
            </div>
            
           
            <div class="welcome-card">
                <div class="welcome-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="welcome-message">
                    {{ __("Admin logged in!") }}
                </div>
                <p class="text-muted">You have full administrative privileges to manage the platform.</p>
                
               <div class="admin-actions">
                    <a href="{{route('post.management')}}" class="action-button">
                       <i class="bi bi-archive-fill"></i> Posts Management
                    </a>
                    <a href="{{route('user.management')}}" class="action-button">
                        <i class="bi bi-person-fill-gear"></i> Users Management
                    </a>
                </div>

            </div>
        </div>
    </x-app-layout>
</body>
</html>