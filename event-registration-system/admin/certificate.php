<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventIQ Portal - Summary Report & Certs</title>
    <style>
        :root {
            --navy-blue: #172554;
            --white: #FFFFFF;
            --purple: #6246EA;
            --green: #16A34A;
            --yellow: #EAB308;
            --error-red: #DC2626;
            --gray-text: #64748b;
            --border-color: #cbd5e1;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }

        body {
            background-color: #F5F3FF;
            color: var(--navy-blue);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            background-color: var(--navy-blue);
            color: var(--white);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-badge {
            border: 1px dashed var(--yellow);
            color: var(--yellow);
            padding: 2px 6px;
            font-size: 0.7rem;
            border-radius: 4px;
            font-weight: bold;
        }

        nav ul { display: flex; list-style: none; gap: 20px; }
        nav ul li a { color: var(--white); text-decoration: none; font-size: 0.9rem; }
        nav ul li a:hover, nav ul li a.active { color: var(--yellow); }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 1.5rem 1rem;
        }

        .admin-card {
            background-color: var(--white);
            width: 100%;
            max-width: 700px;
            padding: 1.75rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px -4px rgba(23, 37, 84, 0.08);
            border: 1px solid #e2e8f0;
        }

        .card-header {
            margin-bottom: 1.2rem;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 { font-size: 1.3rem; margin-bottom: 0.2rem; }
        .card-header p { font-size: 0.82rem; color: var(--gray-text); }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
            margin-bottom: 1.2rem;
        }

        .metric-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 0.75rem;
            text-align: center;
        }

        .metric-box span { font-size: 0.7rem; color: var(--gray-text); font-weight: 600; text-transform: uppercase; }
        .metric-box h3 { font-size: 1.15rem; color: var(--navy-blue); margin-top: 2px; }

        .form-section {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.2rem;
            margin-bottom: 1.2rem;
        }

        .form-section h3 {
            font-size: 0.95rem;
            margin-bottom: 0.8rem;
            color: var(--navy-blue);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .form-group {
            margin-bottom: 0.9rem;
            display: flex;
            flex-direction: column;
            gap: 4px;
            position: relative;
        }

        .form-group.full-width { grid-column: span 2; }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-container input, .input-container select {
            width: 100%;
            padding: 0.65rem 2.2rem 0.65rem 0.8rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.88rem;
            outline: none;
            background-color: var(--white);
            transition: all 0.2s;
        }

        .input-container input:focus, .input-container select:focus {
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

        .form-group.success input, .form-group.success select {
            border-color: var(--green);
            background-color: #f0fdf4;
        }
        .form-group.success .status-icon { display: block; color: var(--green); }

        .form-group.error input, .form-group.error select {
            border-color: var(--error-red);
            background-color: #fff5f5;
        }
        .form-group.error .status-icon { display: block; color: var(--error-red); }

        .error-msg {
            font-size: 0.73rem;
            color: var(--error-red);
            font-weight: 500;
            display: none;
            gap: 4px;
        }
        .form-group.error .error-msg { display: flex; }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 2px;
        }

        .checkbox-group input { accent-color: var(--purple); width: 14px; height: 14px; cursor: pointer; }
        .checkbox-group label { font-size: 0.8rem; color: var(--navy-blue); cursor: pointer; }

        .button-group {
            display: flex;
            justify-content: flex-end;
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
        }
        .btn-primary:hover { background-color: #5136cb; }

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

        .cert-preview-box {
            background-color: #f1f5f9;
            border: 1px dashed var(--purple);
            border-radius: 6px;
            padding: 0.85rem;
            text-align: center;
            margin-top: 0.4rem;
        }

        .cert-mockup {
            background-color: #ffffff;
            border: 3px double var(--navy-blue);
            padding: 0.9rem;
            border-radius: 4px;
            max-width: 420px;
            margin: 0 auto;
        }

        .cert-mockup h4 { font-size: 0.88rem; color: var(--navy-blue); }
        .cert-mockup p { font-size: 0.72rem; color: var(--gray-text); margin: 4px 0; }
        .cert-mockup .cert-name { font-size: 0.95rem; font-weight: bold; color: var(--purple); }
        .cert-mockup .cert-footer { display: flex; justify-content: space-between; margin-top: 10px; font-size: 0.68rem; color: #334155; }

        .modal-overlay {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
            background-color: rgba(23, 37, 84, 0.6);
            display: none; justify-content: center; align-items: center; z-index: 1000;
        }
        .modal-overlay.active { display: flex; }
        .modal-card {
            background-color: var(--white); border-radius: 12px;
            max-width: 400px; width: 100%; padding: 1.75rem; text-align: center;
        }
        .modal-icon {
            width: 40px; height: 40px; background-color: #f0fdf4; color: var(--green);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; margin: 0 auto 0.8rem auto; border: 2px solid var(--green);
        }

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

    <header>
        <div style="display:flex; align-items:center; gap:10px; font-weight:700; font-size:1.1rem;">
            <span class="admin-badge">ADMIN</span>
            <span>EventIQ Portal</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#" class="active">Reports & Certs</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="admin-card">
            <div class="card-header">
                <div>
                    <h2>Summary Report & Certs</h2>
                    <p>Issue verified digital certificates & view reports.</p>
                </div>
                <button type="button" class="btn-secondary" id="btnExportCSV">📥 Export CSV</button>
            </div>

            <div class="metrics-grid">
                <div class="metric-box">
                    <span>Total Registered</span>
                    <h3 id="statRegistered"></h3>
                </div>
                <div class="metric-box">
                    <span>Attended (Verified)</span>
                    <h3 id="statAttended" style="color: var(--green);"></h3>
                </div>
                <div class="metric-box">
                    <span>Attendance Rate</span>
                    <h3 id="statRate" style="color: var(--purple);"></h3>
                </div>
            </div>

            <form id="certReportForm" novalidate>
                <div class="form-section">
                    <h3>📊 Event Context</h3>
                    
                    <div class="form-row">
                        <div class="form-group" id="eventSelectGroup">
                            <label for="selectEvent">Select Target Event *</label>
                            <div class="input-container">
                                <select id="selectEvent">
                                    <option value="">Choose event...</option>
                                    <option value="EVT-2026-01" selected>Tech Workshop 2026</option>
                                    <option value="EVT-2026-02">Annual AI Conference</option>
                                </select>
                                <span class="status-icon" id="eventSelectIcon">✓</span>
                            </div>
                            <span class="error-msg" id="eventSelectError">⚠️ Select an event.</span>
                        </div>

                        <div class="form-group" id="certTypeGroup">
                            <label for="certType">Certificate Template *</label>
                            <div class="input-container">
                                <select id="certType">
                                    <option value="">Select template...</option>
                                    <option value="Standard Participation">Standard Participation</option>
                                    <option value="Excellence Award">Excellence Award</option>
                                    <option value="Speaker Appreciation">Speaker Appreciation</option>
                                </select>
                                <span class="status-icon" id="certTypeIcon">✓</span>
                            </div>
                            <span class="error-msg" id="certTypeError">⚠️ Select a template.</span>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>🎓 Certificate Configuration</h3>

                    <div class="form-row">
                        <div class="form-group" id="signatoryNameGroup">
                            <label for="signatoryName">Signatory Title *</label>
                            <div class="input-container">
                                <input type="text" id="signatoryName" placeholder="e.g., Prof. A. B. Silva">
                                <span class="status-icon" id="signatoryNameIcon">✓</span>
                            </div>
                            <span class="error-msg" id="signatoryNameError">⚠️ Signatory required (min 3 chars).</span>
                        </div>

                        <div class="form-group" id="issueDateGroup">
                            <label for="issueDate">Issuance Date *</label>
                            <div class="input-container">
                                <input type="date" id="issueDate">
                                <span class="status-icon" id="issueDateIcon">✓</span>
                            </div>
                            <span class="error-msg" id="issueDateError">⚠️ Valid date required.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="includeQR" checked>
                            <label for="includeQR">Embed Verification Code</label>
                        </div>
                    </div>

                    <div class="cert-preview-box">
                        <div class="cert-mockup">
                            <h4>CERTIFICATE OF PARTICIPATION</h4>
                            <p>Presented to</p>
                            <div class="cert-name" id="previewName"></div>
                            <p>for attending <strong id="previewEvent"></strong></p>
                            <div class="cert-footer">
                                <div>✍️ <span id="previewSignatory">Prof. A. B. Silva</span></div>
                                <div>📅 Issued: <span id="previewDate">2026-11-15</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn-secondary" id="btnPreviewBatch">Preview List</button>
                    <button type="submit" class="btn-primary">Generate & Email Certs</button>
                </div>
            </form>
        </div>
    </main>

    <div class="modal-overlay" id="successModal">
        <div class="modal-card">
            <div class="modal-icon">✓</div>
            <h3 style="font-size:1.1rem; margin-bottom:0.4rem;">Certificates Generated!</h3>
            <p style="font-size:0.82rem; color:var(--gray-text); margin-bottom:1rem;">Issued and emailed PDF certificates to attendees.</p>
            <button class="btn-primary" id="btnCloseModal" style="width:100%;">Close</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('certReportForm');
            const selectEvent = document.getElementById('selectEvent');
            const certType = document.getElementById('certType');
            const signatoryName = document.getElementById('signatoryName');
            const issueDate = document.getElementById('issueDate');
            const previewSignatory = document.getElementById('previewSignatory');
            const previewDate = document.getElementById('previewDate');
            const previewEvent = document.getElementById('previewEvent');
            const successModal = document.getElementById('successModal');
            const btnCloseModal = document.getElementById('btnCloseModal');
            const btnExportCSV = document.getElementById('btnExportCSV');

            const today = new Date().toISOString().split('T')[0];
            issueDate.value = today;
            previewDate.textContent = today;

            const touched = { event: true, certType: false, signatory: false, issueDate: false };

            function validateEvent() {
                const isValid = selectEvent.value !== "";
                if (touched.event) toggleState('eventSelectGroup', 'eventSelectIcon', isValid);
                return isValid;
            }

            function validateCertType() {
                const isValid = certType.value !== "";
                if (touched.certType) toggleState('certTypeGroup', 'certTypeIcon', isValid);
                return isValid;
            }

            function validateSignatory() {
                const val = signatoryName.value.trim();
                const isValid = val.length >= 3;
                if (touched.signatory) toggleState('signatoryNameGroup', 'signatoryNameIcon', isValid);
                if (isValid) previewSignatory.textContent = val;
                return isValid;
            }

            function validateIssueDate() {
                const isValid = issueDate.value !== "";
                if (touched.issueDate) toggleState('issueDateGroup', 'issueDateIcon', isValid);
                if (isValid) previewDate.textContent = issueDate.value;
                return isValid;
            }

            function toggleState(groupId, iconId, isValid) {
                const group = document.getElementById(groupId);
                const icon = document.getElementById(iconId);
                if (isValid) {
                    group.classList.remove('error'); group.classList.add('success');
                    if (icon) icon.textContent = '✓';
                } else {
                    group.classList.remove('success'); group.classList.add('error');
                    if (icon) icon.textContent = '✕';
                }
            }

            selectEvent.addEventListener('change', () => {
                touched.event = true;
                validateEvent();
                if (selectEvent.value !== "") {
                    previewEvent.textContent = selectEvent.options[selectEvent.selectedIndex].text;
                }
            });

            certType.addEventListener('change', () => { touched.certType = true; validateCertType(); });
            signatoryName.addEventListener('blur', () => { touched.signatory = true; validateSignatory(); });
            signatoryName.addEventListener('input', () => { if (touched.signatory) validateSignatory(); });
            issueDate.addEventListener('change', () => { touched.issueDate = true; validateIssueDate(); });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Object.keys(touched).forEach(k => touched[k] = true);
                if (validateEvent() & validateCertType() & validateSignatory() & validateIssueDate()) {
                    successModal.classList.add('active');
                } else {
                    const firstError = document.querySelector('.form-group.error');
                    if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });

            btnCloseModal.addEventListener('click', () => successModal.classList.remove('active'));
            btnExportCSV.addEventListener('click', () => alert("Exporting Attendance CSV..."));
        });
    </script>
</body>
</html>