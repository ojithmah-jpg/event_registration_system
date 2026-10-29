<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSystem - Participant Portal Login</title>
    <style>
        :root {
            --navy-blue: #172554;
            --white: #FFFFFF;
            --purple: #6246EA;
            --purple-hover: #5136cb;
            --light-purple: #F5F3FF;
            --green: #16A34A;
            --yellow: #EAB308;
            --error-red: #DC2626;
            --gray-text: #64748b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-purple);
            color: var(--navy-blue);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Split Screen Container */
        .portal-wrapper {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            min-height: calc(100vh - 60px);
        }

        @media (max-width: 900px) {
            .portal-wrapper {
                grid-template-columns: 1fr;
            }
            .brand-side {
                display: none;
            }
        }

        /* Left Branding Side */
        .brand-side {
            background: linear-gradient(135deg, var(--navy-blue) 0%, #1e3a8a 100%);
            color: var(--white);
            padding: 4rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .brand-side::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(98, 70, 234, 0.2);
            border-radius: 50%;
            bottom: -50px;
            right: -50px;
            filter: blur(40px);
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .logo-box {
            border: 2px dashed var(--yellow);
            color: var(--yellow);
            padding: 4px 10px;
            font-size: 0.85rem;
            border-radius: 4px;
        }

        .brand-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .brand-content h1 span {
            color: var(--yellow);
        }

        .brand-content p {
            color: #cbd5e1;
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .feature-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            color: #e2e8f0;
        }

        .feature-list span.icon {
            background-color: rgba(98, 70, 234, 0.4);
            color: var(--yellow);
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .brand-footer {
            font-size: 0.85rem;
            color: #94a3b8;
        }

        /* Right Form Side */
        .form-side {
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
        }

        .user-badge {
            background-color: var(--light-purple);
            color: var(--purple);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.35rem 0.8rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        .login-card h2 {
            font-size: 1.8rem;
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-card p.subtitle {
            font-size: 0.92rem;
            color: var(--gray-text);
            margin-bottom: 2rem;
        }

        /* Success Alert */
        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid var(--green);
            color: var(--green);
            padding: 0.85rem;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
            display: none;
            text-align: center;
            font-weight: 600;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 1.35rem;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--navy-blue);
        }

        .form-group input {
            padding: 0.9rem 1.1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s ease;
            background-color: #fafafa;
        }

        .form-group input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(98, 70, 234, 0.12);
            background-color: var(--white);
        }

        /* Error Feedback States */
        .form-group.error input {
            border-color: var(--error-red);
            background-color: #fff5f5;
        }

        .error-message {
            font-size: 0.78rem;
            color: var(--error-red);
            display: none;
            font-weight: 500;
        }

        .form-group.error .error-message {
            display: block;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 0.95rem;
            background-color: var(--purple);
            border: none;
            color: var(--white);
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 0.5rem;
            box-shadow: 0 4px 6px rgba(98, 70, 234, 0.2);
        }

        .btn-submit:hover {
            background-color: var(--purple-hover);
        }

        .card-footer-text {
            text-align: center;
            margin-top: 1.8rem;
            font-size: 0.88rem;
            color: var(--gray-text);
        }

        .card-footer-text a {
            color: var(--purple);
            text-decoration: none;
            font-weight: 600;
        }

        .card-footer-text a:hover {
            text-decoration: underline;
        }

        /* Simple Footer */
        footer {
            background-color: var(--navy-blue);
            color: var(--white);
            text-align: center;
            padding: 1rem;
            font-size: 0.82rem;
        }
    </style>
</head>
<body>

    <!-- Split Screen Portal Layout -->
    <div class="portal-wrapper">
        
        <!-- Left Brand & Feature Side -->
        <div class="brand-side">
            <div class="brand-logo">
                <div class="logo-box">LOGO</div>
                <span>EventiQ</span>
            </div>

            <div class="brand-content">
                <h1>Manage Your Events & <span>Attendance</span> Seamlessly</h1>
                <p>Welcome to the participant portal. Log in to explore upcoming events, register online, manage your QR codes, and access your participation certificates.</p>
                
                <ul class="feature-list">
                    <li><span class="icon">✓</span> Browse workshops, seminars, and conferences</li>
                    <li><span class="icon">✓</span> Instant QR code generation upon registration[cite: 8]</li>
                    <li><span class="icon">✓</span> Secure attendance verification and digital certificates[cite: 9]</li>
                </ul>
            </div>

            <div class="brand-footer">
                Event Registration and Attendance Management System &bull; Index No: 24550401[cite: 1]
            </div>
        </div>

        <!-- Right Login Form Side -->
        <div class="form-side">
            <div class="login-card">
                <span class="user-badge">Participant Portal</span>
                <h2>Welcome Back</h2>
                <p class="subtitle">Please enter your account details to sign in.</p>

                <!-- Success Alert Notification -->
                <div id="successAlert" class="alert-success">
                    ✓ Login verified! Redirecting to your dashboard...
                </div>

                <form id="loginForm" novalidate>
                    <!-- Email Field -->
                    <div class="form-group" id="emailGroup">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="john.doe@example.com">
                        <span class="error-message" id="emailError">Please enter a valid email address.</span>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group" id="passwordGroup">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="••••••••">
                        <span class="error-message" id="passwordError">Password must be at least 6 characters long.</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit">Sign In to Dashboard</button>
                </form>

                <div class="card-footer-text">
                    Don't have an account yet? <a href="#">Register for an event</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401[cite: 1]</p>
    </footer>

    <!-- Form Validation Script -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        const emailGroup = document.getElementById('emailGroup');
        const passwordGroup = document.getElementById('passwordGroup');
        const successAlert = document.getElementById('successAlert');

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;

            // Email Pattern Validation
            const emailValue = emailInput.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailValue === '' || !emailPattern.test(emailValue)) {
                emailGroup.classList.add('error');
                isValid = false;
            } else {
                emailGroup.classList.remove('error');
            }

            // Password Length Validation
            const passwordValue = passwordInput.value.trim();
            if (passwordValue.length < 6) {
                passwordGroup.classList.add('error');
                isValid = false;
            } else {
                passwordGroup.classList.remove('error');
            }

            // Success action execution
            if (isValid) {
                successAlert.style.display = 'block';
                loginForm.reset();
                
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 3500);
            } else {
                successAlert.style.display = 'none';
            }
        });
    </script>

</body>
</html>