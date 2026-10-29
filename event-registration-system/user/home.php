<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSystem - Browse Available Events</title>
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            background-color: var(--navy-blue);
            color: var(--white);
            padding: 1rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(23, 37, 84, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
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

        /* Hero Sub-Banner */
        .hero-banner {
            background: linear-gradient(135deg, var(--navy-blue) 0%, #1e3a8a 100%);
            color: var(--white);
            padding: 2.5rem 3rem;
            margin-bottom: 2rem;
            box-shadow: inset 0 -4px 6px rgba(0,0,0,0.1);
        }

        .hero-banner h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .hero-banner p {
            color: #cbd5e1;
            font-size: 1rem;
        }

        /* Main Container */
        main {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto 3rem auto;
            padding: 0 2rem;
        }

        /* Search and Filter Section */
        .filter-section {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            background: var(--white);
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .search-input {
            flex: 2;
            padding: 0.85rem 1.2rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: var(--purple);
        }

        .category-select {
            flex: 1;
            padding: 0.85rem 1.2rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.95rem;
            background-color: var(--white);
            color: var(--navy-blue);
            outline: none;
            cursor: pointer;
            transition: border-color 0.2s;
        }

        .category-select:focus {
            border-color: var(--purple);
        }

        /* Event Grid */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.8rem;
        }

        .event-card {
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(23, 37, 84, 0.1), 0 4px 6px -2px rgba(23, 37, 84, 0.05);
        }

        .card-header-banner {
            background-color: var(--light-purple);
            padding: 1.25rem 1.5rem 0.75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .event-card h3 {
            font-size: 1.2rem;
            color: var(--navy-blue);
            font-weight: 700;
        }

        .badge {
            background-color: var(--purple);
            color: var(--white);
            font-size: 0.75rem;
            padding: 0.3rem 0.6rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-body {
            padding: 1.25rem 1.5rem;
        }

        .event-details {
            font-size: 0.92rem;
            color: var(--gray-text);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .event-details p {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .event-details strong {
            color: var(--navy-blue);
        }

        .card-footer {
            padding: 1rem 1.5rem 1.5rem 1.5rem;
            display: flex;
            gap: 12px;
        }

        .btn-outline {
            flex: 1;
            padding: 0.7rem;
            background-color: transparent;
            border: 2px solid var(--purple);
            color: var(--purple);
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            background-color: var(--light-purple);
        }

        .btn-solid {
            flex: 1;
            padding: 0.7rem;
            background-color: var(--purple);
            border: 2px solid var(--purple);
            color: var(--white);
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-solid:hover {
            background-color: var(--purple-hover);
            border-color: var(--purple-hover);
        }

        /* Footer Styling */
        footer {
            background-color: var(--navy-blue);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            font-size: 0.88rem;
            margin-top: auto;
            border-top: 4px solid var(--purple);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo-area">
            <!-- Professional SVG Logo Icon (Yellow & Green Gradient Theme) -->
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#16A34A" /> <!-- Green -->
                        <stop offset="100%" stop-color="#EAB308" /> <!-- Yellow -->
                    </linearGradient>
                    <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                        <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#000000" flood-opacity="0.2"/>
                    </filter>
                </defs>
                <rect width="40" height="40" rx="10" fill="url(#logoGradient)" filter="url(#shadow)" />
                <path d="M12 20C12 15.5817 15.5817 12 20 12C24.4183 12 28 15.5817 28 20C28 24.4183 24.4183 28 20 28" stroke="#172554" stroke-width="3.5" stroke-linecap="round" />
                <circle cx="20" cy="20" r="4" fill="#172554" />
                <path d="M25 25L29 29" stroke="#172554" stroke-width="3.5" stroke-linecap="round" />
            </svg>
            <div style="display: flex; flex-direction: column;">
                <span style="font-size: 1.4rem; font-weight: 800; letter-spacing: 0.5px; color: #FFFFFF; line-height: 1.1;">EventiQ</span>
                <span style="font-size: 0.7rem; font-weight: 500; letter-spacing: 1px; color: #EAB308; text-transform: uppercase;">Management</span>
            </div>
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

    <!-- Hero Section -->
    <div class="hero-banner">
        <h1>Discover & Register for Upcoming Events</h1>
        <p>Explore workshops, seminars, and conferences tailored to advance your skills and professional network.</p>
    </div>

    <!-- Main Content: Public Event Browsing Screen (FR04, FR05) -->
    <main>
        <!-- Search and Filters -->
        <div class="filter-section">
            <input type="text" class="search-input" placeholder="🔍 Search events by title, keyword, or venue...">
            <select class="category-select">
                <option value="">All Categories</option>
                <option value="workshops">Workshops</option>
                <option value="conferences">Conferences</option>
                <option value="seminars">Seminars</option>
            </select>
        </div>

        <!-- Event Cards Grid -->
        <div class="event-grid">
            <!-- Event Card 1 -->
            <div class="event-card">
                <div>
                    <div class="card-header-banner">
                        <h3>Tech Workshop 2026</h3>
                        <span class="badge">Workshop</span>
                    </div>
                    <div class="card-body">
                        <div class="event-details">
                            <p><span>📅</span> <strong>Date:</strong> 15th Nov 2026 | 10:00 AM</p>
                            <p><span>📍</span> <strong>Venue:</strong> Main Auditorium</p>
                            <p><span>👥</span> <strong>Capacity:</strong> 150 Seats Available</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn-outline">View Details</a>
                    <a href="#" class="btn-solid">Register Now</a>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="event-card">
                <div>
                    <div class="card-header-banner">
                        <h3>Annual AI Conference</h3>
                        <span class="badge">Conference</span>
                    </div>
                    <div class="card-body">
                        <div class="event-details">
                            <p><span>📅</span> <strong>Date:</strong> 20th Dec 2026 | 09:00 AM</p>
                            <p><span>📍</span> <strong>Venue:</strong> Hall C, Science Block</p>
                            <p><span>👥</span> <strong>Capacity:</strong> 250 Seats Available</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn-outline">View Details</a>
                    <a href="#" class="btn-solid">Register Now</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull;</p>
    </footer>

</body>
</html>