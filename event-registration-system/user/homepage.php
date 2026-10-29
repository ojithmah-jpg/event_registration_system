
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="homepage.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Discover events, register online and manage event participation.">

    <title>Home | Event Registration and Attendance Management System</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Reusable Header -->
    <?php include 'header.php'; ?>


    <!-- ==============================
         HERO SECTION
    =============================== -->

    <section class="hero-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <!-- Hero Text -->
                <div class="col-lg-6">

                    <span class="hero-label">
                        <i class="bi bi-calendar-check"></i>
                        YOUR NEXT EXPERIENCE STARTS HERE
                    </span>

                    <h1 class="hero-title">
                        Discover Events.
                        <span>Connect. Learn.</span>
                    </h1>

                    <p class="hero-description">
                        Explore upcoming workshops, seminars and
                        academic events. Register online and manage
                        your participation in one convenient place.
                    </p>

                    <div class="hero-buttons">

                        <a href="events.php" class="btn btn-primary-custom">
                            Explore Events
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="#how-it-works"
                           class="btn btn-outline-custom">
                            How It Works
                        </a>

                    </div>

                    <div class="hero-benefits">

                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Easy Registration
                        </div>

                        <div class="benefit-item">
                            <i class="bi bi-qr-code"></i>
                            QR Attendance
                        </div>

                        <div class="benefit-item">
                            <i class="bi bi-award"></i>
                            Certificates
                        </div>

                    </div>

                </div>


                <!-- Hero Image -->
                <div class="col-lg-6">

                    <div class="hero-image-wrapper">

                        <img
                            src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1000&q=85"
                            alt="People attending a professional event"
                            class="hero-image">

                        <div class="hero-image-badge">

                            <div class="badge-icon">
                                <i class="bi bi-calendar2-check"></i>
                            </div>

                            <div>
                                <h6>Events Made Simple</h6>
                                <p>Discover. Register. Participate.</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ==============================
         EVENT SEARCH SECTION
    =============================== -->

    <section class="events-section" id="events">

        <div class="container">

            <div class="section-heading">

                <div>
                    <span class="section-label">
                        FIND YOUR NEXT EXPERIENCE
                    </span>

                    <h2>Explore Upcoming Events</h2>

                    <p>
                        Discover workshops, seminars and learning
                        opportunities that interest you.
                    </p>
                </div>

                <a href="events.php" class="view-all-link">
                    View All Events
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>


            <!-- Search and Category Filter -->
            <div class="event-search-panel">

                <div class="search-input-wrapper">

                    <i class="bi bi-search"></i>

                    <input
                        type="search"
                        id="eventSearch"
                        class="form-control"
                        placeholder="Search events by title..."
                        aria-label="Search events by title">

                </div>

                <div class="category-select-wrapper">

                    <i class="bi bi-funnel"></i>

                    <select id="eventCategory"
                            class="form-select"
                            aria-label="Filter events by category">

                        <option value="all">All Categories</option>
                        <option value="technology">Technology</option>
                        <option value="academic">Academic</option>
                        <option value="workshop">Workshop</option>

                    </select>

                </div>

            </div>


            <!-- Event Cards -->
            <!-- These are sample cards for UI development. -->

            <div class="row g-4 mt-2" id="eventList">


                <!-- Event 1 -->
                <div class="col-md-6 col-lg-4 event-item"
                     data-category="technology workshop"
                     data-title="web development workshop">

                    <article class="event-card">

                        <div class="event-image-wrapper">

                            <img
                                src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=700&q=80"
                                alt="Laptop used for web development"
                                class="event-image">

                            <span class="event-category">
                                Technology
                            </span>

                        </div>

                        <div class="event-card-body">

                            <div class="event-meta">
                                <span>
                                    <i class="bi bi-laptop"></i>
                                    Workshop
                                </span>

                                <span>
                                    <i class="bi bi-people"></i>
                                    Learning
                                </span>
                            </div>

                            <h3>Web Development Workshop</h3>

                            <p>
                                Explore the fundamentals of creating
                                modern websites and web applications.
                            </p>

                            <div class="event-card-footer">

                                <span class="event-status">
                                    Sample Event
                                </span>

                                <a href="events.php"
                                   class="event-link">
                                    View Details
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                </div>


                <!-- Event 2 -->
                <div class="col-md-6 col-lg-4 event-item"
                     data-category="academic technology"
                     data-title="information technology seminar">

                    <article class="event-card">

                        <div class="event-image-wrapper">

                            <img
                                src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=700&q=80"
                                alt="Speaker presenting at a seminar"
                                class="event-image">

                            <span class="event-category">
                                Academic
                            </span>

                        </div>

                        <div class="event-card-body">

                            <div class="event-meta">
                                <span>
                                    <i class="bi bi-mortarboard"></i>
                                    Seminar
                                </span>

                                <span>
                                    <i class="bi bi-lightbulb"></i>
                                    Knowledge
                                </span>
                            </div>

                            <h3>Information Technology Seminar</h3>

                            <p>
                                Discover technology concepts and
                                exchange knowledge with other learners.
                            </p>

                            <div class="event-card-footer">

                                <span class="event-status">
                                    Sample Event
                                </span>

                                <a href="events.php"
                                   class="event-link">
                                    View Details
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                </div>


                <!-- Event 3 -->
                <div class="col-md-6 col-lg-4 event-item"
                     data-category="technology workshop"
                     data-title="digital skills workshop">

                    <article class="event-card">

                        <div class="event-image-wrapper">

                            <img
                                src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=700&q=80"
                                alt="Participants collaborating during a workshop"
                                class="event-image">

                            <span class="event-category">
                                Workshop
                            </span>

                        </div>

                        <div class="event-card-body">

                            <div class="event-meta">
                                <span>
                                    <i class="bi bi-easel"></i>
                                    Training
                                </span>

                                <span>
                                    <i class="bi bi-book"></i>
                                    Skills
                                </span>
                            </div>

                            <h3>Digital Skills Workshop</h3>

                            <p>
                                Develop practical digital skills through
                                learning activities and collaboration.
                            </p>

                            <div class="event-card-footer">

                                <span class="event-status">
                                    Sample Event
                                </span>

                                <a href="events.php"
                                   class="event-link">
                                    View Details
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                </div>

            </div>


            <!-- No Search Results -->
            <div id="noEventsMessage" class="no-events-message" hidden>

                <i class="bi bi-calendar-x"></i>

                <h3>No matching events found</h3>

                <p>
                    Try another search term or choose a different category.
                </p>

            </div>

        </div>

    </section>


    <!-- ==============================
         HOW IT WORKS
    =============================== -->

    <section class="how-section" id="how-it-works">

        <div class="container">

            <div class="section-heading centered-heading">

                <div>
                    <span class="section-label">
                        SIMPLE AND CONVENIENT
                    </span>

                    <h2>How It Works</h2>

                    <p>
                        Follow a simple process to participate in events.
                    </p>
                </div>

            </div>


            <div class="row g-4 mt-3">

                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <span class="step-number">STEP 01</span>

                        <h3>Discover Events</h3>

                        <p>
                            Browse available events and view their
                            details before registering.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-icon">
                            <i class="bi bi-person-check"></i>
                        </div>

                        <span class="step-number">STEP 02</span>

                        <h3>Register Online</h3>

                        <p>
                            Complete the registration process and
                            receive your registration information.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-icon">
                            <i class="bi bi-qr-code"></i>
                        </div>

                        <span class="step-number">STEP 03</span>

                        <h3>Attend and Participate</h3>

                        <p>
                            Use your registration QR code for attendance
                            verification and access eligible certificates.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ==============================
         CALL TO ACTION
    =============================== -->

    <section class="cta-section">

        <div class="container">

            <div class="cta-content">

                <div>
                    <h2>Ready to Discover Your Next Event?</h2>

                    <p>
                        Explore upcoming events and take the next
                        step in your learning journey.
                    </p>
                </div>

                <a href="events.php" class="btn cta-button">
                    Browse Events
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


    <!-- ==============================
         FOOTER
    =============================== -->

    <footer class="site-footer">

        <div class="container">

            <div class="footer-content">

                <div class="footer-brand">

                    <h3>
                        <i class="bi bi-calendar-check"></i>
                        Event Management
                    </h3>

                    <p>
                        Registration &amp; Attendance Management System
                    </p>

                </div>

                <div class="footer-links">

                    <a href="index.php">Home</a>

                    <a href="events.php">Events</a>

                    <a href="about.php">About</a>

                    <a href="login.php">Login</a>

                </div>

            </div>

            <div class="footer-bottom">

                <p>
                    &copy; <?php echo date('Y'); ?>
                    Event Registration and Attendance Management System.
                </p>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>

</body>
</html>
