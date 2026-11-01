<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .password-reset-card {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .password-reset-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .password-reset-icon {
            font-size: 50px;
            color: #4a90e2;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-control {
            height: 50px;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        .form-label {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #999;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s;
        }
        .form-control:focus ~ .form-label,
        .form-control:not(:placeholder-shown) ~ .form-label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            background-color: white;
            padding: 0 5px;
            color: #4a90e2;
        }
        .btn-reset {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
        }
        .btn-reset:hover {
            background-color: #3a7bc8;
            transform: translateY(-2px);
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 3px;
            transition: all 0.3s;
        }
        .alert {
            border-radius: 5px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
            color: #999;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="password-reset-card">
            <div class="password-reset-header">
                <div class="password-reset-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>
                <h2>Reset Your Password</h2>
                <p class="text-muted">Enter your new password below</p>
            </div>

            <!-- Display error message if any -->
            <div class="alert alert-danger" role="alert" id="errorMessage" style="display: none;">
                The password field is required.
            </div>

           <form method="POST" action="{{ route('password.update') }}" id="passwordResetForm">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" value="{{ $email ?? old('email') }}" disabled placeholder=" ">
                    <label for="email" class="form-label">Email Address</label>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder=" ">
                    <label for="password" class="form-label">New Password *</label>
                    <span class="password-toggle" id="passwordToggle">👁️</span>
                    <div class="password-strength" id="passwordStrength"></div>
                    <small class="form-text text-muted">Use at least 8 characters with a mix of letters, numbers and symbols</small>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder=" ">
                    <label for="password_confirmation" class="form-label">Confirm Password *</label>
                    <span class="password-toggle" id="confirmPasswordToggle">👁️</span>
                    <div class="invalid-feedback" id="passwordMatchError" style="display: none;">
                        Passwords do not match
                    </div>
                </div>
                
                <button type="submit" class="btn-reset" id="submitButton">Reset Password</button>
            </form>
            
            <div class="login-link">
                Remember your password? <a href="{{route('guest.login')}}">Log in</a>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('passwordResetForm');
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const passwordToggle = document.getElementById('passwordToggle');
        const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
        const strengthBar = document.getElementById('passwordStrength');
        const matchError = document.getElementById('passwordMatchError');
        const errorMessage = document.getElementById('errorMessage');
        const submitButton = document.getElementById('submitButton');
        
        // Toggle password visibility
        passwordToggle.addEventListener('click', function() {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordToggle.textContent = passwordInput.type === 'password' ? '👁️' : '🔒';
        });
    
        confirmPasswordToggle.addEventListener('click', function() {
            confirmInput.type = confirmInput.type === 'password' ? 'text' : 'password';
            confirmPasswordToggle.textContent = confirmInput.type === 'password' ? '👁️' : '🔒';
        });
    
        // Check password strength
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
    
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
    
            strengthBar.style.width = strength + '%';
            strengthBar.style.backgroundColor =
                strength < 50 ? '#dc3545' : strength < 75 ? '#ffc107' : '#28a745';
        });
    
        // Check if passwords match live
        confirmInput.addEventListener('input', function() {
            if (passwordInput.value !== confirmInput.value) {
                matchError.style.display = 'block';
                confirmInput.classList.add('is-invalid');
            } else {
                matchError.style.display = 'none';
                confirmInput.classList.remove('is-invalid');
            }
        });
    
        // Form validation before submission
        form.addEventListener('submit', function(e) {
            let isValid = true;
    
            // Password required
            if (!passwordInput.value.trim()) {
                passwordInput.classList.add('is-invalid');
                errorMessage.style.display = 'block';
                isValid = false;
            } else {
                passwordInput.classList.remove('is-invalid');
            }
    
            // Confirm required
            if (!confirmInput.value.trim()) {
                confirmInput.classList.add('is-invalid');
                isValid = false;
            } else {
                confirmInput.classList.remove('is-invalid');
            }
    
            // Must match
            if (passwordInput.value !== confirmInput.value) {
                confirmInput.classList.add('is-invalid');
                matchError.style.display = 'block';
                isValid = false;
            }
    
            if (!isValid) {
                e.preventDefault();
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                // Show loading on button, then let Laravel handle submission
                submitButton.innerHTML = 'Resetting Password...';
                alert('Password reset successfully! You can now log in with your new password.');
                submitButton.disabled = true;

                // ✅ DO NOT preventDefault here – let Laravel handle the POST
            }
        });
    });
</script>

</body>
</html>