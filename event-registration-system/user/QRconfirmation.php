<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventIQ Portal - Registration Confirmation & QR Pass</title>
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

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', system-ui, -apple-system, sans-serif; }

        body {
            background-color: var(--light-purple);
            color: var(--navy-blue);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Navigation Header */
        header {
            background-color: var(--navy-blue);
            color: var(--white);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(23, 37, 84, 0.15);
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        nav ul { display: flex; list-style: none; gap: 20px; }
        nav ul li a { color: var(--white); text-decoration: none; font-size: 0.9rem; }
        nav ul li a:hover, nav ul li a.active { color: var(--yellow); }

        /* Main Container */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 1.5rem 1rem;
        }

        .confirmation-card {
            background-color: var(--white);
            width: 100%;
            max-width: 650px;
            padding: 1.75rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px -4px rgba(23, 37, 84, 0.08);
            border: 1px solid #e2e8f0;
        }

        .success-banner {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            margin-bottom: 1.2rem;
        }

        .success-banner .badge-icon {
            width: 38px;
            height: 38px;
            background-color: var(--green);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin: 0 auto 0.4rem auto;
            font-weight: bold;
        }

        .success-banner h2 { font-size: 1.2rem; color: #14532d; margin-bottom: 0.2rem; }
        .success-banner p { font-size: 0.82rem; color: #166534; }

        /* QR Ticket Ticket Box */
        .ticket-box {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 2px dashed var(--purple);
            border-radius: 10px;
            padding: 1.25rem;
            display: grid;
            grid-template-columns: 1fr 180px;
            gap: 1rem;
            align-items: center;
            margin-bottom: 1.2rem;
            position: relative;
        }

        @media (max-width: 580px) {
            .ticket-box { grid-template-columns: 1fr; text-align: center; }
        }

        .ticket-details h3 { font-size: 1.1rem; color: var(--navy-blue); margin-bottom: 0.4rem; }
        .ticket-meta { list-style: none; display: flex; flex-direction: column; gap: 0.35rem; }
        .ticket-meta li { font-size: 0.82rem; color: var(--gray-text); display: flex; align-items: center; gap: 6px; }
        .ticket-meta li strong { color: var(--navy-blue); }

        .qr-wrapper {
            background-color: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .qr-placeholder {
            width: 130px;
            height: 130px;
            margin: 0 auto 0.4rem auto;
            background: repeating-conic-gradient(#000 0% 25%, #fff 0% 50%) 50% / 12px 12px;
            border: 4px solid var(--white);
            border-radius: 4px;
        }

        .qr-code-text {
            font-family: monospace;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--purple);
            background-color: var(--light-purple);
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* Verification Form Section */
        .form-section {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.2rem;
            margin-bottom: 1.2rem;
        }

        .form-section h3 { font-size: 0.95rem; margin-bottom: 0.8rem; color: var(--navy-blue); }

        .form-group {
            margin-bottom: 0.8rem;
            display: flex;
            flex-direction: column;
            gap: 4px;
            position: relative;
        }

        .form-group label { font-size: 0.82rem; font-weight: 600; }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-container input {
            width: 100%;
            padding: 0.65rem 2.2rem 0.65rem 0.8rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.88rem;
            outline: none;
            background-color: var(--white);
            transition: all 0.2s;
        }

        .input-container input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 3px rgba(98, 70, 234, 0.1);
        }

        .status-icon {
            position: absolute;
            right: 10px;
            font-size: 0.9rem;
            display: none;
            pointer-events: none;
        }

        .form-group.success input { border-color: var(--green); background-color: #f0fdf4; }
        .form-group.success .status-icon { display: block; color: var(--green); }

        .form-group.error input { border-color: var(--error-red); background-color: #fff5f5; }
        .form-group.error .status-icon { display: block; color: var(--error-red); }

        .error-msg {
            font-size: 0.73rem;
            color: var(--error-red);
            font-weight: 500;
            display: none;
            gap: 4px;
        }
        .form-group.error .error-msg { display: flex; }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 0.5rem;
        }

        .btn-primary {
            padding: 0.7rem 1.4rem;
            background-color: var(--purple);
            border: none;
            color: var(--white);
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.88rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-primary:hover { background-color: var(--purple-hover); }

        .btn-secondary {
            padding: 0.7rem 1.2rem;
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--navy-blue);
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.88rem;
            cursor: pointer;
        }
        .btn-secondary:hover { background-color: #e2e8f0; }

        footer {
            background-color: var(--navy-blue);
            color: var(--white);
            text-align: center;
            padding: 0.9rem;
            font-size: 0.8rem;
            border-top: 3px solid var(--purple);
        }
    </style>
</head>
<body>

    <!-- Top Header -->
    <header>
        <div class="logo-area">
            <span>EventIQ Management</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Browse Events</a></li>
                <li><a href="#" class="active">My Registrations</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <div class="confirmation-card">

            <!-- Success Banner -->
            <div class="success-banner">
                <div class="badge-icon">✓</div>
                <h2>Registration Confirmed!</h2>
                <p>Your seat has been reserved. Please present your QR pass at the entrance scanner.</p>
            </div>

            <!-- Digital Pass Card -->
            <div class="ticket-box">
                <div class="ticket-details">
                    <h3>Tech Workshop 2026</h3>
                    <ul class="ticket-meta">
                        <li><strong>Participant:</strong> <span id="participantName">John Doe</span></li>
                        <li>📅 <strong>Date:</strong> 15th Nov 2026 | 10:00 AM</li>
                        <li>📍 <strong>Venue:</strong> Main Auditorium</li>
                        <li>🎫 <strong>Status:</strong> Confirmed & Paid</li>
                    </ul>
                </div>

                <div class="qr-wrapper">
                    <div class="qr-placeholder" title="Digital QR Pass"></div>
                    <span class="qr-code-text" id="qrString">REG-2026-069</span>
                </div>
            </div>

            <!-- Quick Pass Verification Form -->
            <form id="verifyPassForm" novalidate>
                <div class="form-section">
                    <h3>🔎 Lookup / Verify Pass Code</h3>

                    <div class="form-group" id="passCodeGroup">
                        <label for="passCodeInput">Registration Pass Code *</label>
                        <div class="input-container">
                            <input type="text" id="passCodeInput" placeholder="e.g., REG-2026-069">
                            <span class="status-icon" id="passCodeIcon">✓</span>
                        </div>
                        <span class="error-msg" id="passCodeError">⚠️ Valid pass code format required (e.g., REG-2026-XXX).</span>
                    </div>
                </div>

                <!-- Action Controls -->
                <div class="button-group">
                    <button type="button" class="btn-secondary" id="btnDownloadPDF">📥 Download PDF Pass</button>
                    <button type="submit" class="btn-primary">Verify Code Status</button>
                </div>
            </form>

        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401</p>
    </footer>

    <!-- Form Validation & Action Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('verifyPassForm');
            const passCodeInput = document.getElementById('passCodeInput');
            const btnDownloadPDF = document.getElementById('btnDownloadPDF');

            let isTouched = false;

            // QR Code Regex Validator (e.g., REG-2026-XXX)
            function validatePassCode() {
                const codePattern = /^REG-\d{4}-\d{3,}$/i;
                const isValid = codePattern.test(passCodeInput.value.trim());

                if (isTouched) {
                    const group = document.getElementById('passCodeGroup');
                    const icon = document.getElementById('passCodeIcon');

                    if (isValid) {
                        group.classList.remove('error');
                        group.classList.add('success');
                        icon.textContent = '✓';
                    } else {
                        group.classList.remove('success');
                        group.classList.add('error');
                        icon.textContent = '✕';
                    }
                }
                return isValid;
            }

            // Real-Time Validation Listeners
            passCodeInput.addEventListener('blur', () => {
                isTouched = true;
                validatePassCode();
            });

            passCodeInput.addEventListener('input', () => {
                if (isTouched) validatePassCode();
            });

            // Form Submit Action
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                isTouched = true;

                if (validatePassCode()) {
                    alert("Pass Code REG-2026-069 is Active and Verified!");
                } else {
                    passCodeInput.focus();
                }
            });

            // PDF Pass Download Simulation
            btnDownloadPDF.addEventListener('click', () => {
                alert("Downloading Digital PDF Pass with QR code...");
            });
        });
    </script>
</body>
</html>