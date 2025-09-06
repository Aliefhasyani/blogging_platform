<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Your App Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #818cf8;
            --text-color: #334155;
            --light-text: #64748b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #e6e6ff 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            width: 100%;
            max-width: 450px;
        }
        
        .register-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .app-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-icon {
            display: inline-flex;
            width: 64px;
            height: 64px;
            background: var(--primary-light);
            color: var(--primary-color);
            border-radius: 16px;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 1rem;
        }
        
        .app-logo h1 {
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--text-color);
        }
        
        .app-logo p {
            color: var(--light-text);
            margin-top: 0.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-color);
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        
        .password-requirements {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 12px 15px;
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--light-text);
        }
        
        .password-requirements ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        
        .password-requirements li {
            margin-bottom: 4px;
        }
        
        .register-button {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .register-button:hover {
            background: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .session-status {
            background: var(--primary-light);
            color: var(--primary-color);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
            cursor: pointer;
        }
        
        @media (max-width: 576px) {
            .register-card {
                padding: 2rem 1.5rem;
            }
        }
        
        .progress-bar {
            height: 6px;
            background-color: #e2e8f0;
            border-radius: 3px;
            margin-top: 8px;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 3px;
            width: 0%;
            transition: width 0.3s;
        }
        
        .password-strength {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 0.8rem;
            color: var(--light-text);
        }
    </style>
</head>
<body>
    <div class="register-container">
 
        <div class="register-card">
            <div class="app-logo">
                <div class="logo-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1>Create Account</h1>
                <p>Join our community today</p>
            </div>
            
            @if($errors->any)
            <div class="error-message text-center">
                {{$errors->first()}}
            </div>
            @endif
           
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name">
                    </div>
               
                </div>
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Enter your email">
                    </div>
                
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Create a password">
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" id="password-strength-bar"></div>
                    </div>
                    <div class="password-strength">
                        <span>Password strength</span>
                        <span id="password-strength-text">Weak</span>
                    </div>
           
                    
                    <div class="password-requirements">
                        <p>Your password should be:</p>
                        <ul>
                            <li>At least 8 characters</li>
                           
                        </ul>
                    </div>
                </div>
                
                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                 
                </div>
                
                <button type="submit" class="register-button">
                    Create Account
                </button>
            </form>
            
            <div class="login-link">
                Already have an account? <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt ms-1"></i> Sign in</a>
            </div>
        </div>
    </div>

    <script>
    
        document.addEventListener('DOMContentLoaded', function() {
            const formGroups = document.querySelectorAll('.form-group');
            
            formGroups.forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    group.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                }, index * 100);
            });
            
     
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            
            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                let strength = 0;
                
                
                if (password.length >= 8) strength += 25;
                
               
                if (/[A-Z]/.test(password)) strength += 25;
                
               
                if (/[a-z]/.test(password)) strength += 25;
                
             
                if (/[0-9]/.test(password)) strength += 25;
                
              
                strengthBar.style.width = strength + '%';
            
                if (strength < 50) {
                    strengthBar.style.backgroundColor = '#ef4444';
                    strengthText.textContent = 'Weak';
                    strengthText.style.color = '#ef4444';
                } else if (strength < 75) {
                    strengthBar.style.backgroundColor = '#f59e0b';
                    strengthText.textContent = 'Medium';
                    strengthText.style.color = '#f59e0b';
                } else {
                    strengthBar.style.backgroundColor = '#10b981';
                    strengthText.textContent = 'Strong';
                    strengthText.style.color = '#10b981';
                }
            });
        });
        
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling.querySelector('i');
            
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
    </script>
</body>
</html>