<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventIQ - Online Event Registration</title>
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
            --border-color: #cbd5e1;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background-color: var(--light-purple);
            color: var(--navy-blue);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Top Header Navigation */
        header {
            background-color: var(--navy-blue);
            color: var(--white);
            padding: 1rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(23, 37, 84, 0.15);
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .logo-box {
            border: 2px dashed var(--yellow);
            color: var(--yellow);
            padding: 4px 10px;
            font-size: 0.85rem;
            border-radius: 4px;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        nav ul li a {
            color: var(--white);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        nav ul li a:hover, nav ul li a.active {
            color: var(--yellow);
        }

        /* Main Section */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2.5rem 1.5rem;
        }

        /* Form Card Layout */
        .registration-card {
            background-color: var(--white);
            width: 100%;
            max-width: 640px;
            padding: 2.5rem;
            border-radius: 14px;
            box-shadow: 0 10px 25px -5px rgba(23, 37, 84, 0.08), 0 8px 10px -6px rgba(23, 37, 84, 0.04);
            border: 1px solid #e2e8f0;
        }

        .card-header {
            margin-bottom: 1.5rem;
        }

        .card-header h2 {
            font-size: 1.5rem;
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .card-header p {
            font-size: 0.9rem;
            color: var(--gray-text);
        }

        /* Event Summary Box */
        .event-summary {
            background-color: var(--light-purple);
            border-left: 4px solid var(--purple);
            padding: 1.1rem 1.25rem;
            border-radius: 0 8px 8px 0;
            margin-bottom: 1.5rem;
        }

        .event-summary h4 {
            color: var(--navy-blue);
            font-size: 1.05rem;
            margin-bottom: 6px;
            font-weight: 700;
        }

        .event-summary-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 20px;
            font-size: 0.85rem;
            color: var(--gray-text);
        }

        /* Progress Bar Container */
        .progress-wrapper {
            margin-bottom: 1.5rem;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--gray-text);
            margin-bottom: 6px;
        }

        .progress-bar {
            height: 6px;
            background-color: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background-color: var(--purple);
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .progress-fill.complete {
            background-color: var(--green);
        }

        /* Form Grid Layout */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 6px;
            position: relative;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        @media (max-width: 600px) {
            .form-group.full-width {
                grid-column: span 1;
            }
        }

        .form-group label {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--navy-blue);
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-container input, .input-container select {
            width: 100%;
            padding: 0.85rem 2.5rem 0.85rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s ease;
            background-color: #fafafa;
        }

        .input-container input:focus, .input-container select:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(98, 70, 234, 0.12);
            background-color: var(--white);
        }

        .status-icon {
            position: absolute;
            right: 12px;
            font-size: 1rem;
            display: none;
            pointer-events: none;
        }

        /* Validation UI States */
        .form-group.success input, .form-group.success select {
            border-color: var(--green);
            background-color: #f0fdf4;
        }

        .form-group.success .status-icon {
            display: block;
            color: var(--green);
        }

        .form-group.error input, .form-group.error select {
            border-color: var(--error-red);
            background-color: #fff5f5;
        }

        .form-group.error .status-icon {
            display: block;
            color: var(--error-red);
        }

        .error-msg {
            font-size: 0.78rem;
            color: var(--error-red);
            font-weight: 500;
            display: none;
            align-items: center;
            gap: 4px;
        }

        .form-group.error .error-msg {
            display: flex;
        }

        /* Checkbox Custom Styling */
        .checkbox-wrapper {
            margin-bottom: 1.5rem;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .checkbox-group input {
            margin-top: 3px;
            accent-color: var(--purple);
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .checkbox-group label {
            font-size: 0.85rem;
            color: var(--gray-text);
            cursor: pointer;
            line-height: 1.4;
        }

        .checkbox-wrapper.error .error-msg {
            display: flex;
            margin-top: 6px;
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
            transition: background 0.2s, transform 0.1s;
            box-shadow: 0 4px 6px rgba(98, 70, 234, 0.2);
        }

        .btn-submit:hover {
            background-color: var(--purple-hover);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        /* Confirmation Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(23, 37, 84, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 1rem;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-card {
            background-color: var(--white);
            border-radius: 14px;
            max-width: 480px;
            width: 100%;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
            animation: modalPop 0.3s ease-out;
        }

        @keyframes modalPop {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .modal-icon {
            width: 50px;
            height: 50px;
            background-color: #f0fdf4;
            color: var(--green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem auto;
            border: 2px solid var(--green);
        }

        .modal-card h3 {
            font-size: 1.3rem;
            color: var(--navy-blue);
            margin-bottom: 0.5rem;
        }

        .modal-card p {
            font-size: 0.9rem;
            color: var(--gray-text);
            margin-bottom: 1.25rem;
        }

        .qr-pass-box {
            background-color: var(--light-purple);
            border: 2px dashed var(--purple);
            border-radius: 10px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .qr-canvas-container {
            width: 140px;
            height: 140px;
            background-color: var(--white);
            border: 2px solid var(--navy-blue);
            border-radius: 8px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #qrCanvas {
            width: 100%;
            height: 100%;
            image-rendering: pixelated;
        }

        .reg-code-badge {
            font-family: monospace;
            background-color: var(--navy-blue);
            color: var(--yellow);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.88rem;
            font-weight: bold;
        }

        .btn-modal-close {
            background-color: var(--navy-blue);
            color: var(--white);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s;
        }

        .btn-modal-close:hover {
            background-color: #1e293b;
        }

        /* Footer */
        footer {
            background-color: var(--navy-blue);
            color: var(--white);
            text-align: center;
            padding: 1.25rem;
            font-size: 0.88rem;
            border-top: 4px solid var(--purple);
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header>
        <div class="logo-area">
            <div class="logo-box">EventIQ</div>
            <span>MANAGEMENT</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#" class="active">Browse Events</a></li>
                <li><a href="#">My Registrations</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Form Section -->
    <main>
        <div class="registration-card">
            
            <div class="card-header">
                <h2>Event Registration Form</h2>
                <p>Complete your participant details to reserve your seat and obtain a QR pass.</p>
            </div>

            <!-- Selected Event Context Block -->
            <div class="event-summary">
                <h4>Tech Workshop 2026</h4>
                <div class="event-summary-meta">
                    <span>📅 <strong>Date:</strong> 15th Nov 2026 | 10:00 AM</span>
                    <span>📍 <strong>Venue:</strong> Main Auditorium</span>
                    <span>🪑 <strong>Capacity:</strong> <span id="seatsAvailable">150</span> Seats Available</span>
                </div>
            </div>

            <!-- Form Completion Progress Bar -->
            <div class="progress-wrapper">
                <div class="progress-label">
                    <span>Form Completion Progress</span>
                    <span id="progressPercent">0%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
            </div>

            <!-- Registration Form -->
            <form id="registrationForm" novalidate>
                <div class="form-row">
                    <!-- Full Name Field -->
                    <div class="form-group" id="nameGroup">
                        <label for="fullName">Full Name *</label>
                        <div class="input-container">
                            <input type="text" id="fullName" placeholder="e.g., Sara Lens">
                            <span class="status-icon" id="nameIcon">✓</span>
                        </div>
                        <span class="error-msg" id="nameError">⚠️ Please enter your full name (at least 3 characters).</span>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group" id="emailGroup">
                        <label for="email">Email Address *</label>
                        <div class="input-container">
                            <input type="email" id="email" placeholder="e.g., Sara.doe@example.com">
                            <span class="status-icon" id="emailIcon">✓</span>
                        </div>
                        <span class="error-msg" id="emailError">⚠️ Enter a valid email format (e.g., user@domain.com).</span>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Phone Number Field -->
                    <div class="form-group" id="phoneGroup">
                        <label for="phone">Phone Number *</label>
                        <div class="input-container">
                            <input type="tel" id="phone" placeholder="e.g., +94 77 123 4567">
                            <span class="status-icon" id="phoneIcon">✓</span>
                        </div>
                        <span class="error-msg" id="phoneError">⚠️ Valid phone number required (at least 8 digits).</span>
                    </div>

                    <!-- Participant Category -->
                    <div class="form-group" id="categoryGroup">
                        <label for="category">Participant Role *</label>
                        <div class="input-container">
                            <select id="category">
                                <option value="">Select your role...</option>
                                <option value="Student">Student</option>
                                <option value="Academic / Faculty">Academic / Faculty</option>
                                <option value="Industry Professional">Industry Professional</option>
                                <option value="Speaker / Guest">Speaker / Guest</option>
                            </select>
                            <span class="status-icon" id="categoryIcon">✓</span>
                        </div>
                        <span class="error-msg" id="categoryError">⚠️ Please select a participant role category.</span>
                    </div>
                </div>

                <!-- Organization / Institution Field -->
                <div class="form-group full-width">
                    <label for="organization">Organization / Institution (Optional)</label>
                    <div class="input-container">
                        <input type="text" id="organization" placeholder="e.g., University or Company Name">
                    </div>
                </div>

                <!-- Terms and Conditions Agreement -->
                <div class="checkbox-wrapper" id="termsGroup">
                    <div class="checkbox-group">
                        <input type="checkbox" id="termsConsent">
                        <label for="termsConsent">I confirm that all details provided are accurate and agree to follow event guidelines and QR verification policies.</label>
                    </div>
                    <span class="error-msg" id="termsError">⚠️ You must accept the terms and guidelines to complete registration.</span>
                </div>

                <!-- Action Button -->
                <button type="submit" class="btn-submit">Confirm Registration & Generate QR Pass</button>
            </form>
        </div>
    </main>

    <!-- Success Confirmation Overlay / Pass View -->
    <div class="modal-overlay" id="successModal">
        <div class="modal-card">
            <div class="modal-icon">✓</div>
            <h3>Registration Verified!</h3>
            <p>Your seat has been reserved for <strong>Tech Workshop 2026</strong>.</p>
            
            <div class="qr-pass-box">
                <span class="reg-code-badge" id="modalRegCode">REG-2026-0000</span>
                <div class="qr-canvas-container">
                    <canvas id="qrCanvas" width="120" height="120"></canvas>
                </div>
                <span style="font-size:0.9rem; color:var(--navy-blue); font-weight:700;" id="modalParticipantName">John Doe</span>
                <span style="font-size:0.78rem; color:var(--gray-text);" id="modalRole">Student</span>
            </div>

            <button class="btn-modal-close" id="btnCloseModal">Close & Finish</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401</p>
    </footer>

    <!-- Form Validation & Interactive Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registrationForm');
            const fullName = document.getElementById('fullName');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const category = document.getElementById('category');
            const termsConsent = document.getElementById('termsConsent');
            const progressFill = document.getElementById('progressFill');
            const progressPercent = document.getElementById('progressPercent');
            const successModal = document.getElementById('successModal');
            const btnCloseModal = document.getElementById('btnCloseModal');
            const seatsAvailableElem = document.getElementById('seatsAvailable');

            let availableSeats = 150;

            // Track touched state for fields
            const touched = {
                fullName: false,
                email: false,
                phone: false,
                category: false,
                termsConsent: false
            };

            // Validation Helper Functions
            function validateName() {
                const val = fullName.value.trim();
                const isValid = val.length >= 3;
                if (touched.fullName) {
                    toggleFieldState(document.getElementById('nameGroup'), document.getElementById('nameIcon'), isValid);
                }
                return isValid;
            }

            function validateEmail() {
                const val = email.value.trim();
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+\$/;
                const isValid = regex.test(val);
                if (touched.email) {
                    toggleFieldState(document.getElementById('emailGroup'), document.getElementById('emailIcon'), isValid);
                }
                return isValid;
            }

            function validatePhone() {
                const val = phone.value.trim();
                const regex = /^[0-9+\s\-()]{8,}\$/;
                const isValid = regex.test(val);
                if (touched.phone) {
                    toggleFieldState(document.getElementById('phoneGroup'), document.getElementById('phoneIcon'), isValid);
                }
                return isValid;
            }

            function validateCategory() {
                const isValid = category.value !== "";
                if (touched.category) {
                    toggleFieldState(document.getElementById('categoryGroup'), document.getElementById('categoryIcon'), isValid);
                }
                return isValid;
            }

            function validateTerms() {
                const isValid = termsConsent.checked;
                const termsGroup = document.getElementById('termsGroup');
                if (touched.termsConsent) {
                    if (isValid) {
                        termsGroup.classList.remove('error');
                    } else {
                        termsGroup.classList.add('error');
                    }
                }
                return isValid;
            }

            function toggleFieldState(groupElement, iconElement, isValid) {
                if (isValid) {
                    groupElement.classList.remove('error');
                    groupElement.classList.add('success');
                    if (iconElement) iconElement.textContent = '✓';
                } else {
                    groupElement.classList.remove('success');
                    groupElement.classList.add('error');
                    if (iconElement) iconElement.textContent = '✕';
                }
            }

            // Interactive Event Listeners
            fullName.addEventListener('blur', () => { touched.fullName = true; validateName(); });
            fullName.addEventListener('input', () => { if (touched.fullName) validateName(); updateProgress(); });

            email.addEventListener('blur', () => { touched.email = true; validateEmail(); });
            email.addEventListener('input', () => { if (touched.email) validateEmail(); updateProgress(); });

            phone.addEventListener('blur', () => { touched.phone = true; validatePhone(); });
            phone.addEventListener('input', () => { if (touched.phone) validatePhone(); updateProgress(); });

            category.addEventListener('blur', () => { touched.category = true; validateCategory(); });
            category.addEventListener('change', () => { touched.category = true; validateCategory(); updateProgress(); });

            termsConsent.addEventListener('change', () => { touched.termsConsent = true; validateTerms(); updateProgress(); });

            function updateProgress() {
                let score = 0;
                if (fullName.value.trim().length >= 3) score += 20;
                if (/^[^\s@]+@[^\s@]+\.[^\s@]+\$/.test(email.value.trim())) score += 20;
                if (/^[0-9+\s\-()]{8,}\$/.test(phone.value.trim())) score += 20;
                if (category.value !== "") score += 20;
                if (termsConsent.checked) score += 20;

                progressFill.style.width = score + '%';
                progressPercent.textContent = score + '%';

                if (score === 100) {
                    progressFill.classList.add('complete');
                } else {
                    progressFill.classList.remove('complete');
                }
            }

            // Pseudo QR Code Generator using Canvas
            function renderQRCode(text) {
                const canvas = document.getElementById('qrCanvas');
                const ctx = canvas.getContext('2d');
                const size = 120;
                const gridSize = 10;
                const cellSize = size / gridSize;

                ctx.clearRect(0, 0, size, size);
                ctx.fillStyle = '#FFFFFF';
                ctx.fillRect(0, 0, size, size);

                // Deterministic pattern generation based on string hash
                let hash = 0;
                for (let i = 0; i < text.length; i++) {
                    hash = text.charCodeAt(i) + ((hash << 5) - hash);
                }

                ctx.fillStyle = '#172554';
                for (let row = 0; row < gridSize; row++) {
                    for (let col = 0; col < gridSize; col++) {
                        // Keep corner anchors intact
                        const isTopLeft = row < 3 && col < 3;
                        const isTopRight = row < 3 && col >= gridSize - 3;
                        const isBottomLeft = row >= gridSize - 3 && col < 3;

                        if (isTopLeft || isTopRight || isBottomLeft) {
                            if ((row === 0 || row === 2 || col === 0 || col === 2 || row === gridSize - 1 || row === gridSize - 3 || col === gridSize - 1 || col === gridSize - 3) &&
                                !(row === 1 && col === 1) && !(row === 1 && col === gridSize - 2) && !(row === gridSize - 2 && col === 1)) {
                                ctx.fillRect(col * cellSize, row * cellSize, cellSize, cellSize);
                            }
                        } else {
                            const val = (hash >> ((row * gridSize + col) % 31)) & 1;
                            if (val === 1 || (row + col) % 3 === 0) {
                                ctx.fillRect(col * cellSize, row * cellSize, cellSize, cellSize);
                            }
                        }
                    }
                }
            }

            // Form Submit Logic
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                // Mark all fields as touched on submit attempt
                touched.fullName = true;
                touched.email = true;
                touched.phone = true;
                touched.category = true;
                touched.termsConsent = true;

                const isNameValid = validateName();
                const isEmailValid = validateEmail();
                const isPhoneValid = validatePhone();
                const isCategoryValid = validateCategory();
                const isTermsValid = validateTerms();

                if (isNameValid && isEmailValid && isPhoneValid && isCategoryValid && isTermsValid) {
                    // Generate Unique Registration Code
                    const randomId = Math.floor(1000 + Math.random() * 9000);
                    const regCode = `REG-2026-${randomId}`;

                    // Populate Modal Details
                    document.getElementById('modalRegCode').textContent = regCode;
                    document.getElementById('modalParticipantName').textContent = fullName.value.trim();
                    document.getElementById('modalRole').textContent = category.value;

                    // Render dynamic QR
                    renderQRCode(regCode + '-' + email.value.trim());

                    // Decrement Seat Counter
                    if (availableSeats > 0) {
                        availableSeats--;
                        seatsAvailableElem.textContent = availableSeats;
                    }

                    // Display Confirmation Modal
                    successModal.classList.add('active');
                } else {
                    // Scroll smoothly to first error field
                    const firstError = document.querySelector('.form-group.error, .checkbox-wrapper.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            // Close Modal Action
            btnCloseModal.addEventListener('click', () => {
                successModal.classList.remove('active');
                form.reset();
                
                // Reset states and progress bar
                Object.keys(touched).forEach(k => touched[k] = false);
                document.querySelectorAll('.form-group').forEach(el => {
                    el.classList.remove('success', 'error');
                });
                document.getElementById('termsGroup').classList.remove('error');
                updateProgress();
            });
        });
    </script>
</body>
</html>