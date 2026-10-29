<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSystem - Summary Reports & Certificates (Admin Portal)</title>
    <style>
        :root {
            --navy-blue: #172554;
            --white: #FFFFFF;
            --purple: #6246EA;
            --purple-hover: #5136cb;
            --light-purple: #F5F3FF;
            --green: #16A34A;
            --yellow: #EAB308;
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
            max-width: 1000px;
            width: 100%;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        /* Report Card */
        .report-card {
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

        /* Metrics Stat Cards Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            margin-bottom: 2.5rem;
        }

        @media (max-width: 768px) {
            .metrics-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-box {
            background-color: var(--light-purple);
            border: 1px solid #cbd5e1;
            padding: 1.25rem;
            border-radius: 10px;
            text-align: center;
        }

        .stat-box h4 {
            font-size: 0.82rem;
            text-transform: uppercase;
            color: var(--gray-text);
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .stat-box .stat-value {
            font-size: 1.8rem;
            color: var(--navy-blue);
            font-weight: 800;
        }

        /* Data Table Styling */
        .table-container {
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.92rem;
        }

        th {
            background-color: #f8fafc;
            color: var(--navy-blue);
            padding: 0.9rem 1.2rem;
            font-weight: 700;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 0.9rem 1.2rem;
            border-bottom: 1px solid #e2e8f0;
            color: var(--navy-blue);
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Table Badges & Action Buttons */
        .badge-attended {
            color: var(--green);
            font-weight: 600;
        }

        .badge-absent {
            color: var(--gray-text);
            font-weight: 500;
        }

        .btn-table-action {
            background-color: var(--purple);
            color: var(--white);
            padding: 0.45rem 0.9rem;
            border: none;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-table-action:hover {
            background-color: var(--purple-hover);
        }

        .text-muted {
            color: #94a3b8;
            font-size: 0.85rem;
            font-style: italic;
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
            <span>EventSystem Portal</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#" class="active">Reports & Certificates</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content: Summary Report & Certificate Issuance (FR11, FR12) -->
    <main>
        <div class="report-card">
            <h2 class="page-header-title">6. Summary Report & Certificate Issuance (FR11, FR12)[cite: 6, 13]</h2>

            <!-- Summary Metric Cards -->
            <div class="metrics-grid">
                <div class="stat-box">
                    <h4>Total Registered</h4>
                    <div class="stat-value">100</div>
                </div>
                <div class="stat-box">
                    <h4>Total Attended</h4>
                    <div class="stat-value">85</div>
                </div>
                <div class="stat-box">
                    <h4>Attendance Rate</h4>
                    <div class="stat-value">85%</div>
                </div>
            </div>

            <!-- Participant Status & Certificate Data Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Reg ID</th>
                            <th>Participant Name</th>
                            <th>Attendance Status</th>
                            <th>Certificate Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>REG-2026-069</strong></td>
                            <td>John Doe</td>
                            <td><span class="badge-attended">✓ Attended</span></td>
                            <td>
                                <button class="btn-table-action" onclick="alert('Certificate generated and issued to John Doe!')">
                                    Generate
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>REG-2026-090</strong></td>
                            <td>Jane Smith</td>
                            <td><span class="badge-absent">Absent</span></td>
                            <td><span class="text-muted">Not Eligible</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401[cite: 1]</p>
    </footer>

</body>
</html>