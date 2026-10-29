<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventIQ Portal - Create Event</title>
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
        }

        .card-header h2 { font-size: 1.3rem; margin-bottom: 0.2rem; }
        .card-header p { font-size: 0.82rem; color: var(--gray-text); }

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

        .input-container input, 
        .input-container select, 
        .input-container textarea {
            width: 100%;
            padding: 0.65rem 2.2rem 0.65rem 0.8rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.88rem;
            outline: none;
            background-color: var(--white);
            transition: all 0.2s;
        }

        .input-container textarea { resize: vertical; min-height: 70px; }

        .input-container input:focus, 
        .input-container select:focus, 
        .input-container textarea:focus {
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

        .status-icon.textarea-icon { top: 10px; }

        .form-group.success input, .form-group.success select, .form-group.success textarea {
            border-color: var(--green);
            background-color: #f0fdf4;
        }
        .form-group.success .status-icon { display: block; color: var(--green); }

        .form-group.error input, .form-group.error select, .form-group.error textarea {
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
                <li><a href="#" class="active">Events</a></li>
                <li><a href="#">Scanner Mode</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="admin-card">
            <div class="card-header">
                <h2>Create New Event (FR01)</h2>
                <p>Fill out the required information to publish a new event.</p>
            </div>

            <form id="createEventForm" novalidate>
                <div class="form-section">
                    <h3>📌 Basic Information</h3>
                    
                    <div class="form-group full-width" id="titleGroup">
                        <label for="eventTitle">Event Title *</label>
                        <div class="input-container">
                            <input type="text" id="eventTitle" placeholder="e.g., Annual Tech Workshop 2026">
                            <span class="status-icon" id="titleIcon">✓</span>
                        </div>
                        <span class="error-msg" id="titleError">⚠️ Title is required (min 5 chars).</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group" id="categoryGroup">
                            <label for="eventCategory">Category *</label>
                            <div class="input-container">
                                <select id="eventCategory">
                                    <option value="">Select Category...</option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Hackathon">Hackathon</option>
                                </select>
                                <span class="status-icon" id="categoryIcon">✓</span>
                            </div>
                            <span class="error-msg" id="categoryError">⚠️ Select a category.</span>
                        </div>

                        <div class="form-group" id="capacityGroup">
                            <label for="eventCapacity">Seat Capacity *</label>
                            <div class="input-container">
                                <input type="number" id="eventCapacity" placeholder="e.g., 150" min="1">
                                <span class="status-icon" id="capacityIcon">✓</span>
                            </div>
                            <span class="error-msg" id="capacityError">⚠️ Capacity must be > 0.</span>
                        </div>
                    </div>

                    <div class="form-group full-width" id="descriptionGroup">
                        <label for="eventDescription">Event Description *</label>
                        <div class="input-container">
                            <textarea id="eventDescription" placeholder="Provide a summary of the event..."></textarea>
                            <span class="status-icon textarea-icon" id="descriptionIcon">✓</span>
                        </div>
                        <span class="error-msg" id="descriptionError">⚠️ Description required (min 20 chars).</span>
                    </div>
                </div>

                <div class="form-section">
                    <h3>📅 Schedule, Location & Deadline</h3>

                    <div class="form-row">
                        <div class="form-group" id="dateGroup">
                            <label for="eventDate">Event Date *</label>
                            <div class="input-container">
                                <input type="date" id="eventDate">
                                <span class="status-icon" id="dateIcon">✓</span>
                            </div>
                            <span class="error-msg" id="dateError">⚠️ Cannot be in the past.</span>
                        </div>

                        <div class="form-group" id="deadlineGroup">
                            <label for="registrationDeadline">Registration Deadline *</label>
                            <div class="input-container">
                                <input type="date" id="registrationDeadline">
                                <span class="status-icon" id="deadlineIcon">✓</span>
                            </div>
                            <span class="error-msg" id="deadlineError">⚠️ Must be before event date.</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" id="startTimeGroup">
                            <label for="startTime">Start Time *</label>
                            <div class="input-container">
                                <input type="time" id="startTime">
                                <span class="status-icon" id="startTimeIcon">✓</span>
                            </div>
                            <span class="error-msg" id="startTimeError">⚠️ Required.</span>
                        </div>

                        <div class="form-group" id="endTimeGroup">
                            <label for="endTime">End Time *</label>
                            <div class="input-container">
                                <input type="time" id="endTime">
                                <span class="status-icon" id="endTimeIcon">✓</span>
                            </div>
                            <span class="error-msg" id="endTimeError">⚠️ Must be after start.</span>
                        </div>
                    </div>

                    <div class="form-group full-width" id="venueGroup">
                        <label for="eventVenue">Venue / Location *</label>
                        <div class="input-container">
                            <input type="text" id="eventVenue" placeholder="e.g., Main Auditorium">
                            <span class="status-icon" id="venueIcon">✓</span>
                        </div>
                        <span class="error-msg" id="venueError">⚠️ Venue required (min 3 chars).</span>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn-secondary" id="btnCancel">Cancel</button>
                    <button type="submit" class="btn-primary">Publish Event</button>
                </div>
            </form>
        </div>
    </main>

    <div class="modal-overlay" id="successModal">
        <div class="modal-card">
            <div class="modal-icon">✓</div>
            <h3 style="font-size:1.1rem; margin-bottom:0.4rem;">Event Published!</h3>
            <p style="font-size:0.82rem; color:var(--gray-text); margin-bottom:1rem;">The event has been successfully published.</p>
            <button class="btn-primary" id="btnCloseModal" style="width:100%;">Close</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Event Registration and Attendance Management System &bull; Index No: 24550401</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('createEventForm');
            const eventTitle = document.getElementById('eventTitle');
            const eventCategory = document.getElementById('eventCategory');
            const eventCapacity = document.getElementById('eventCapacity');
            const eventDescription = document.getElementById('eventDescription');
            const eventDate = document.getElementById('eventDate');
            const registrationDeadline = document.getElementById('registrationDeadline');
            const eventVenue = document.getElementById('eventVenue');
            const startTime = document.getElementById('startTime');
            const endTime = document.getElementById('endTime');
            const successModal = document.getElementById('successModal');
            const btnCloseModal = document.getElementById('btnCloseModal');
            const btnCancel = document.getElementById('btnCancel');

            const today = new Date().toISOString().split('T')[0];
            eventDate.setAttribute('min', today);
            registrationDeadline.setAttribute('min', today);

            const touched = { title: false, category: false, capacity: false, description: false, date: false, deadline: false, venue: false, startTime: false, endTime: false };

            function validateTitle() {
                const isValid = eventTitle.value.trim().length >= 5;
                if (touched.title) toggleState('titleGroup', 'titleIcon', isValid);
                return isValid;
            }
            function validateCategory() {
                const isValid = eventCategory.value !== "";
                if (touched.category) toggleState('categoryGroup', 'categoryIcon', isValid);
                return isValid;
            }
            function validateCapacity() {
                const val = parseInt(eventCapacity.value, 10);
                const isValid = !isNaN(val) && val > 0;
                if (touched.capacity) toggleState('capacityGroup', 'capacityIcon', isValid);
                return isValid;
            }
            function validateDescription() {
                const isValid = eventDescription.value.trim().length >= 20;
                if (touched.description) toggleState('descriptionGroup', 'descriptionIcon', isValid);
                return isValid;
            }
            function validateDate() {
                const selectedDate = eventDate.value;
                const isValid = selectedDate !== "" && selectedDate >= today;
                if (touched.date) toggleState('dateGroup', 'dateIcon', isValid);
                if (selectedDate) registrationDeadline.setAttribute('max', selectedDate);
                validateDeadline();
                return isValid;
            }
            function validateDeadline() {
                const deadlineVal = registrationDeadline.value;
                const eventDateVal = eventDate.value;
                let isValid = deadlineVal !== "" && deadlineVal >= today;
                if (isValid && eventDateVal !== "") isValid = deadlineVal <= eventDateVal;
                if (touched.deadline) toggleState('deadlineGroup', 'deadlineIcon', isValid);
                return isValid;
            }
            function validateVenue() {
                const isValid = eventVenue.value.trim().length >= 3;
                if (touched.venue) toggleState('venueGroup', 'venueIcon', isValid);
                return isValid;
            }
            function validateStartTime() {
                const isValid = startTime.value !== "";
                if (touched.startTime) toggleState('startTimeGroup', 'startTimeIcon', isValid);
                validateEndTime();
                return isValid;
            }
            function validateEndTime() {
                if (endTime.value === "") {
                    if (touched.endTime) toggleState('endTimeGroup', 'endTimeIcon', false);
                    return false;
                }
                let isValid = startTime.value !== "" ? endTime.value > startTime.value : true;
                if (touched.endTime) toggleState('endTimeGroup', 'endTimeIcon', isValid);
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

            eventTitle.addEventListener('blur', () => { touched.title = true; validateTitle(); });
            eventTitle.addEventListener('input', () => { if (touched.title) validateTitle(); });
            eventCategory.addEventListener('change', () => { touched.category = true; validateCategory(); });
            eventCapacity.addEventListener('blur', () => { touched.capacity = true; validateCapacity(); });
            eventCapacity.addEventListener('input', () => { if (touched.capacity) validateCapacity(); });
            eventDescription.addEventListener('blur', () => { touched.description = true; validateDescription(); });
            eventDescription.addEventListener('input', () => { if (touched.description) validateDescription(); });
            eventDate.addEventListener('change', () => { touched.date = true; validateDate(); });
            registrationDeadline.addEventListener('change', () => { touched.deadline = true; validateDeadline(); });
            eventVenue.addEventListener('blur', () => { touched.venue = true; validateVenue(); });
            eventVenue.addEventListener('input', () => { if (touched.venue) validateVenue(); });
            startTime.addEventListener('change', () => { touched.startTime = true; validateStartTime(); });
            endTime.addEventListener('change', () => { touched.endTime = true; validateEndTime(); });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Object.keys(touched).forEach(key => touched[key] = true);
                if (validateTitle() & validateCategory() & validateCapacity() & validateDescription() & validateDate() & validateDeadline() & validateVenue() & validateStartTime() & validateEndTime()) {
                    successModal.classList.add('active');
                } else {
                    const firstError = document.querySelector('.form-group.error');
                    if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });

            btnCloseModal.addEventListener('click', () => {
                successModal.classList.remove('active');
                form.reset();
                Object.keys(touched).forEach(key => touched[key] = false);
                document.querySelectorAll('.form-group').forEach(el => el.classList.remove('success', 'error'));
            });

            btnCancel.addEventListener('click', () => {
                if (confirm("Discard changes?")) {
                    form.reset();
                    Object.keys(touched).forEach(key => touched[key] = false);
                    document.querySelectorAll('.form-group').forEach(el => el.classList.remove('success', 'error'));
                }
            });
        });
    </script>
</body>
</html>