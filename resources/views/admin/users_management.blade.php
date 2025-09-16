<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
            --success-color: #10b981;
            --warning-color: #f59e0b;
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
        }
        
        .dashboard-header h1 {
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .dashboard-header p {
            color: var(--light-text);
            font-size: 1.1rem;
            margin-bottom: 0;
        }
        
        .table-container {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        .table thead th {
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-weight: 700;
            padding: 1.25rem 1.5rem;
            border: none;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .table tbody tr {
            transition: background-color 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: #f8fafc;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 0.75rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--text-color);
        }
        
        .user-email {
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .role-badge {
            padding: 0.4rem 0.75rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .role-admin {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }
        
        .role-user {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #64748b;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        
        .btn-icon:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            background-color: #f8fafc;
            border-top: 1px solid var(--border-color);
        }
        
        .pagination-info {
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .search-box {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border-radius: 8px;
            border: 1px solid var(--border-color);
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
        
        .empty-state {
            padding: 3rem;
            text-align: center;
            color: var(--light-text);
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #cbd5e1;
        }
        
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }
            
            .table {
                min-width: 600px;
            }
            
            .dashboard-header {
                padding: 1.5rem;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1><i class="fas fa-users me-2"></i>User Management</h1>
                <p>Manage all registered users and their permissions</p>
            </div>
       
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User </th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                                    <div>
                                        <div class="user-name">{{$user->name}}</div>
                                        <div class="user-email">ID: {{$user->id}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role == 'admin')
                                <span class="role-badge role-admin">
                                    <i class="fas fa-shield-alt me-1"></i> {{$user->role}}
                                </span>
                                @else
                                <span class="role-badge role-user">
                                    <i class="fas fa-user me-1"></i> {{$user->role}}
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon" title="View Profile">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" title="Delete User">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="table-footer">
                    <div class="pagination-info">
                        {{$users->links()}}
                    </div>
                    
                </div>
            </div>
        </div>


    </x-app-layout>
</body>
</html>