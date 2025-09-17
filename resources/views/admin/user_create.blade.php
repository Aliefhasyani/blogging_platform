<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            max-width: 600px;
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
            font-size: 1rem;
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
        
        .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            background-color: white;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .select-container {
            position: relative;
        }
        
        .select-arrow {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--light-text);
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
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
        }
        
       .input-icon .form-input {
            padding-left: 3rem;     
            padding-right: 3rem;   
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1rem;
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
                    <h1><i class="fas fa-user-plus me-2"></i>Create New User</h1>
                    <p>Add a new user to the system</p>
                </div>
                
                <form method="POST" action="{{route('user.store')}}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user me-1"></i> Full Name
                        </label>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" class="form-input" placeholder="Enter user's full name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope me-1"></i> Email Address
                        </label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="form-input" placeholder="email@example.com" autocomplete="new-email" required>
                        </div>
                    </div>
                    
                   <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock me-1"></i> Password
                        </label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-input" placeholder="Create a secure password" autocomplete="new-password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-shield-alt me-1"></i> Role
                        </label>
                        <div class="select-container">
                            <select name="role" class="form-select" required>
                                <option value="" disabled selected>Select a role</option>
                                <option value="admin">Admin</option>
                                <option value="author">Author</option>
                            </select>
                            <div class="select-arrow">
                                
                            </div>
                        </div>
                    </div>
                    
                   <button type="submit" class="submit-btn">
                        <i class="bi bi-people"></i> Create User
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Return to <a href="{{ url()->previous() }}">previous page</a></p>
                </div>
            </div>
        </div>

        <script>
            function togglePassword() {
                const passwordField = document.getElementById('password');
                const toggleIcon = document.querySelector('.password-toggle i');
                
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            }
            
          
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const name = document.querySelector('input[name="name"]').value.trim();
                const email = document.querySelector('input[name="email"]').value.trim();
                const password = document.getElementById('password').value;
                const role = document.querySelector('select[name="role"]').value;
                
                if (!name) {
                    e.preventDefault();
                    alert('Please enter a name for the user');
                    document.querySelector('input[name="name"]').focus();
                    return;
                }
                
                if (!email) {
                    e.preventDefault();
                    alert('Please enter an email address');
                    document.querySelector('input[name="email"]').focus();
                    return;
                }
                
                if (!password) {
                    e.preventDefault();
                    alert('Please enter a password');
                    document.getElementById('password').focus();
                    return;
                }
                
                if (!role) {
                    e.preventDefault();
                    alert('Please select a role for the user');
                    document.querySelector('select[name="role"]').focus();
                    return;
                }
            });
        </script>
    </x-app-layout>
</body>
</html>