<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/user_management.css') }}">
    <title>Users Management</title>
    <x-app-layout>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1><i class="fas fa-users me-2"></i>User Management</h1>
                <p>Manage all registered users and their permissions</p>
                <a href="{{ route('user.create') }}" class="btn btn-outline-primary mt-4">
                    <i class="fas fa-plus me-1"></i> New User
                </a>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">ID: {{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="role-badge role-admin">
                                        <i class="fas fa-shield-alt me-1"></i> {{ $user->role }}
                                    </span>
                                @else
                                    <span class="role-badge role-user">
                                        <i class="fas fa-user me-1"></i> {{ $user->role }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" action="{{route('user.delete',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-icon" title="Delete User">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-footer">
                    <div class="pagination-info">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
