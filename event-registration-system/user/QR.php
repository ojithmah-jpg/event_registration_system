<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSystem - QR Attendance Scanner (Admin Portal)</title>
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
            justify-content: space-between;
        }

        /* Admin Header */
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

        /* Main Container */
        main {
            flex: 1;
            max-width: 960px;
            width: 100%;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        /* Scanner Card */
        .scanner-card {
            background-color: var(--white);
            padding: 2.5rem;
            border-radius: 14px;
            box-shadow: 0 10px 25px -5px rgba(23, 37, 84, 0.08), 0 8px 10px -6px rgba(23, 37, 84, 0.04);
            border: 1px solid #e2e8f0;
        }

        .page-header-title {
            font-size: 1.4rem;
            color: var(--navy-blue);
            margin-bottom: 2rem;
            font-weight: 700;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 0.75rem;
        }

        /* Scanner Grid Layout */
        .scanner-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .scanner-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Camera Feed Mockup Box */
        .camera-feed-box {
            background-color: #0f172a;
            border: 2px dashed #475569;
            border-radius: 10px;
            height: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 1.5rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .camera-feed-box::after {
            content: '';
            position: absolute;
            width: 80%;
            height: 2px;
            background-color: var(--green);
            animation: scanLine 2s infinite ease-in-out;
        }

        @keyframes scanLine {
            0% { top: 20%; }
            50% { top: 80%; }
            100% { top: 20%; }
        }

        .camera-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .camera-feed-box p {
            font-size: 0.88rem;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* Right Validation Panel */
        .validation-panel {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .form-group {
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
            padding: 0.85rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s;
            background-color: #fafafa;
        }

        .form-group input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(98, 70, 234, 0.12);
            background-color: var(--white);
        }

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

        /* Action Button */
        .btn-verify {
            width: 100%;
            padding: 0.9rem;
            background-color: var(--purple);
            border: none;
            color: var(--white);
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s;
            box-shadow: 0 4px 6px rgba(98, 70, 234, 0.2);
        }

        .btn-verify:hover {
            background-color: var(--purple-hover);
        }

        /* Status Output Box */
        .status-box {
            background-color: var(--light-purple);
            border: 1px solid #cbd5e1;
            padding: 1rem;
            border-radius: 8px;
            font-size: 0.88rem;
        }

        .status-box h4 {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: var(--gray-text);
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .status-message {
            color: var(--navy-blue);
            font-weight: 600;
        }

        .status-message.success {
            color: var(--green);
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

    <!-- Admin Header -->
    <header>
        <div class="logo-area">
            <div class="logo-box">ADMIN</div>
            <span>EventiQ Portal</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#" class="active">Scanner Mode</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content: QR Attendance Scanner (FR09, FR10) -->
    <main>
        <div class="scanner-card">
            <h2 class="page-header-title"> QR Attendance Scanner</h2>

            <div class="scanner-grid">
                <!-- Left Column: Camera / Webcam Feed View -->
                <div class="camera-feed-box">
                    <div class="camera-icon">📷</div>
                    <strong>[ CAMERA / WEBCAM FEED ]</strong>
                    <p>Align Participant QR Code Here to Scan Automatically</p>
                </div>

                <!-- Right Column: Manual String Input & Validation Form -->
                <div class="validation-panel">
                    <form id="scannerForm" novalidate>
                        <div class="form-group" id="qrGroup">
                            <label for="qrStringInput">Manual QR String Input</label>
                            <input type="text" id="qrStringInput" placeholder="e.g., REG-2026-069">
                            <span class="error-message" id="qrError">Please enter a valid registration QR code string.</span>
                        </div>

                        <button type="submit" class="btn-verify">Verify & Record Attendance</button>
                    </form>

                    <!-- Latest Attendance Status Output -->
                    <div class="status-box">
                        <h4>Latest Status:</h4>
                        <p id="statusOutput" class="status-message">Waiting for QR scan or manual entry...</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401[cite: 1]</p>
    </footer>

    <!-- Interactive Validation Script -->
    <script>
        const scannerForm = document.getElementById('scannerForm');
        const qrInput = document.getElementById('qrStringInput');
        const qrGroup = document.getElementById('qrGroup');
        const statusOutput = document.getElementById('statusOutput');

        scannerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;
            const qrValue = qrInput.value.trim();

            // Simple validation check for input
            if (qrValue === '' || !qrValue.includes('REG-')) {
                qrGroup.classList.add('error');
                isValid = false;
            } else {
                qrGroup.classList.remove('error');
            }

            if (isValid) {
                const currentTime = new Date().toLocaleTimeString();
                statusOutput.className = 'status-message success';
                statusOutput.innerHTML = `✓ John Doe recorded as Present at ${currentTime} (Reg ID: ${qrValue})`;
                qrInput.value = '';
            } else {
                statusOutput.className = 'status-message';
                statusOutput.innerHTML = `⚠️ Invalid QR format. Please use correct registration string (e.g., REG-2026-XXX).`;
            }
        });
    </script>

</body>
</html>