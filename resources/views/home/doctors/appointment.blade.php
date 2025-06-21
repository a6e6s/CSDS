@extends('home.layouts.master')
@section('styles')
    <style>
        /* Custom styling for the hidden checkbox's label */
        /* When a hidden checkbox input is checked, apply these styles to its sibling label */
        input[type="checkbox"]:checked+label {
            background-color: #0d6efd;
            /* Bootstrap primary blue */
            color: white;
            border-color: #0d6efd;
            font-weight: 600;
            /* Semibold */
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            /* Bootstrap shadow-lg equivalent */
        }

        /* Hide the actual checkbox input */
        input[type="checkbox"] {
            display: none;
        }

        /* Base style for the hour labels */
        .hour-label {
            display: flex;
            /* Use flex for full width within grid cell */
            justify-content: center;
            /* Center text */
            align-items: center;
            /* Center text vertically */
            padding: 0.5rem 0.75rem;
            /* py-2 px-3 equivalent */
            border: 1px solid #dee2e6;
            /* Bootstrap border-gray-300 equivalent */
            border-radius: 0.375rem;
            /* rounded-lg equivalent */
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            /* transition-colors duration-200 ease-in-out equivalent */
            background-color: #f8f9fa;
            /* bg-gray-100 equivalent */
            color: #495057;
            /* text-gray-700 equivalent */
        }

        .hour-label:hover {
            background-color: #e2f0ff;
            /* hover:bg-blue-100 equivalent */
            border-color: #92c1f7;
            /* hover:border-blue-400 equivalent */
            color: #0a58ca;
            /* hover:text-blue-800 equivalent */
        }
    </style>
@endsection
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">{!! $doctor->name !!}</div>
    </div>
    <section class="home_about">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="#">
                                <img class="card-img-top" height="280px"
                                    src="{{ asset('storage/images/doctors/' . $doctor->image) }}"
                                    alt="{{ $doctor->name }}" />
                            </a>

                        </div>
                    </div>
                    <div class="menu my-3">
                        <a href="{{ route('doctor.dashboard') }}" class="btn btn-info col-12 mb-3 text-light" id="home-tab"
                            type="button" role="tab" aria-controls="home" aria-selected="true"> الملف الشخصي </a>
                        <a href="{{ route('doctor.appointment') }}" class="btn btn-info col-12 mb-3 text-light"
                            id="home-tab" type="button" role="tab" aria-controls="home" aria-selected="true"> ادارة
                            المواعيد </a>
                        <a href="{{ route('doctor.dashboard') }}" class="btn btn-danger col-12 mb-3 text-light"
                            id="home-tab" type="button" role="tab" aria-controls="home" aria-selected="true"> تسجيل
                            الخروج </a>

                    </div>

                </div>
                <div class="col-lg-9 col-md-6 col-sm-12 mb-2">
                    <h1 class="h5">ادارة المواعيد</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <div class="card-text row">
                                @foreach ($appointmentsByDate as $date => $appointmentsOnSameDay)
                                    <div class="fw-bold me-3 btn btn-dark col-2">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-M-d') }}
                                    </div>
                                    <div class="d-flex flex-wrap mb-3 align-items-center pb-3 border-bottom col-12  ">
                                        @foreach ($appointmentsOnSameDay as $appointment)
                                            <span class="badge bg-primary m-1 py-2">
                                                {{ $appointment->date->format('h:i a') }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form id="hourSelectionForm" action="{{ route('doctor.appointment.store') }}" method="POST">
                        @csrf
                        <!-- Date Input Field -->
                        <div class="mb-4">
                            <label for="date-input" class="form-label text-secondary small fw-normal">
                                Select a Date:
                            </label>
                            <input type="date" id="date-input" name="selectedDate"
                                class="form-control shadow-sm rounded-3">
                        </div>

                        <!-- Section for Hour Selection (initially hidden) -->
                        <div id="hour-selection-section" class="d-none card p-2">
                            <h2 class="text-center mb-3 h5 fw-semibold text-dark">Select Hours (24-Hour Range)</h2>
                            <div id="hour-selection-container" class="row g-2">
                                <!-- Hour checkboxes will be dynamically inserted here by JavaScript -->
                            </div>
                            <!-- Display for the currently selected hour range -->
                            <p id="selected-range-display" class="mt-3 text-center text-muted small">No hours selected yet.
                            </p>

                            <!-- Hidden input fields to store the selected range for form submission -->
                            <input type="hidden" id="selected-start-hour" name="startHour">
                            <input type="hidden" id="selected-end-hour" name="endHour">
                        </div>

                        <!-- Save Selection Button -->
                        <div class="d-grid gap-2 mt-4">
                            <!-- Changed type to "submit" for HTMX form submission -->
                            <button type="submit" class="btn btn-primary btn-lg rounded-3" id="save-selection-btn">
                                Save Selection
                            </button>
                        </div>

                        <!-- Display area for server response. Content will be replaced by HTMX -->
                        <div id="saved-values-display" class="mt-3 text-center d-none">
                            <!-- Initial content for demonstration/placeholder. HTMX will replace this. -->
                            <p class="mb-0 text-info fw-bold">Awaiting submission...</p>
                        </div>

                    </form>
                </div>
            </div>

            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
@section('scripts')
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <script>
        // Global variables to store the start and end of the currently selected hour range
        let firstSelectedHour = null;
        let lastSelectedHour = null;

        /**
         * Formats an hour (0-23) into a 12-hour AM/PM string.
         * @param {number} hour - The hour to format (0-23).
         * @returns {string} The formatted hour string (e.g., "12 AM", "1 PM", "12 PM").
         */
        function formatHourToAmPm(hour) {
            if (hour === 0) {
                return "12 AM"; // Midnight
            } else if (hour === 12) {
                return "12 PM"; // Noon
            } else if (hour < 12) {
                return `${hour} AM`;
            } else {
                return `${hour - 12} PM`;
            }
        }

        /**
         * Updates the text display showing the currently selected hour range to the user.
         * Also updates the hidden input fields.
         */
        function updateSelectedRangeDisplay() {
            const displayElement = document.getElementById('selected-range-display');
            const hiddenStartHourInput = document.getElementById('selected-start-hour');
            const hiddenEndHourInput = document.getElementById('selected-end-hour');

            if (firstSelectedHour !== null && lastSelectedHour !== null) {
                if (firstSelectedHour === lastSelectedHour) {
                    // If only one hour is selected
                    displayElement.textContent = `Selected hour: ${formatHourToAmPm(firstSelectedHour)}`;
                } else {
                    // If a range of hours is selected
                    displayElement.textContent =
                        `Selected range: ${formatHourToAmPm(firstSelectedHour)} - ${formatHourToAmPm(lastSelectedHour)}`;
                }
                hiddenStartHourInput.value = firstSelectedHour; // Update hidden input for start hour
                hiddenEndHourInput.value = lastSelectedHour; // Update hidden input for end hour
            } else {
                // Default message when no hours are selected
                displayElement.textContent = 'No hours selected yet.';
                hiddenStartHourInput.value = ''; // Clear hidden input if no selection
                hiddenEndHourInput.value = ''; // Clear hidden input if no selection
            }
        }

        /**
         * Applies the checked state to all hour checkboxes based on the current
         * firstSelectedHour and lastSelectedHour range.
         */
        function applyCheckboxStates() {
            const allCheckboxes = document.querySelectorAll('input[name="hour-select"]');
            allCheckboxes.forEach(checkbox => {
                const hour = parseInt(checkbox.value);
                if (firstSelectedHour !== null && lastSelectedHour !== null && hour >= firstSelectedHour && hour <=
                    lastSelectedHour) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
            updateSelectedRangeDisplay();
        }

        /**
         * Handles the click event on an hour checkbox.
         * This function contains the core logic for the custom range selection.
         * @param {Event} event - The click event object from the checkbox.
         */
        function handleHourSelectionClick(event) {
            const clickedHourInt = parseInt(event.target.value); // Get the integer value of the clicked hour
            const isClickedChecked = event.target.checked; // Current state of the clicked checkbox AFTER the click

            if (firstSelectedHour === null) {
                // Case 1: First click ever - establish a new range of just this hour
                firstSelectedHour = clickedHourInt;
                lastSelectedHour = clickedHourInt;
            } else if (clickedHourInt < firstSelectedHour) {
                // Case 2: Clicked hour is less than the current firstSelectedHour.
                // As per requirement: "unselect all and start selection from the one with lower number"
                firstSelectedHour = clickedHourInt;
                lastSelectedHour = clickedHourInt; // Reset the end too to ensure a single-hour start
            } else if (clickedHourInt > lastSelectedHour) {
                // Case 3: Clicked hour is greater than lastSelectedHour. Extend the range.
                lastSelectedHour = clickedHourInt;
            } else if (clickedHourInt >= firstSelectedHour && clickedHourInt <= lastSelectedHour) {
                // Case 4: Clicked hour is within the current range.
                // If the user UNCHECKS an hour within the range, reset to just that hour.
                if (!isClickedChecked) {
                    firstSelectedHour = clickedHourInt;
                    lastSelectedHour = clickedHourInt;
                }
                // If it's checked, it's either the first/last boundary or already part of the range.
                // No change to range boundaries needed if already within.
            }

            // After determining new firstSelectedHour and lastSelectedHour,
            // apply the checked state to all checkboxes.
            applyCheckboxStates();
        }

        /**
         * Generates 24 hour checkboxes (0-23) and appends them to the
         * 'hour-selection-container'. Resets the selection state upon generation.
         */
        function generateHourCheckboxes() {
            const hourContainer = document.getElementById('hour-selection-container');
            hourContainer.innerHTML = ''; // Clear any previously generated checkboxes

            // Reset the selection state when new checkboxes are generated (e.g., new date selected)
            firstSelectedHour = null;
            lastSelectedHour = null;
            updateSelectedRangeDisplay(); // Clear the range display and hidden inputs

            // Loop through all 24 hours (0 to 23)
            for (let i = 0; i < 24; i++) {
                const hourString = formatHourToAmPm(i); // Get the formatted 12-hour string (e.g., "1 PM")

                // Create a div to hold each checkbox and its label
                // Using Bootstrap's column classes for responsiveness
                const div = document.createElement('div');
                div.className = 'col-4 col-sm-3 col-md-2 d-flex align-items-center'; // Responsive grid columns

                // Create the hidden checkbox input element
                const input = document.createElement('input');
                input.type = 'checkbox'; // Changed to checkbox
                input.id = `hour-${i}`; // Unique ID for each hour
                input.name = 'hour-select'; // Common name for all checkboxes to group them
                input.value = i; // Store the 24-hour integer value

                // Create the label element which will be styled to look like a button
                const label = document.createElement('label');
                label.htmlFor = `hour-${i}`; // Link label to input via ID
                label.textContent = hourString;
                label.className = `hour-label col `; // Custom class for styling

                // Attach the custom click event listener to the checkbox input
                input.addEventListener('click', handleHourSelectionClick);

                // Append input and label to the div, then append div to the container
                div.appendChild(input);
                div.appendChild(label);
                hourContainer.appendChild(div);
            }
        }

        // Main script execution when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            const dateInput = document.getElementById('date-input');
            const hourSelectionSection = document.getElementById('hour-selection-section');
            const savedValuesDisplay = document.getElementById('saved-values-display'); // Get the display element

            // Set the minimum date to today for the date input
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(today.getDate()).padStart(2, '0');
            dateInput.min = `${year}-${month}-${day}`;

            // Event listener for changes in the date input field
            dateInput.addEventListener('change', () => {
                if (dateInput.value) {
                    // If a date is selected, show the hour selection section
                    hourSelectionSection.classList.remove('d-none'); // Use d-none for Bootstrap hidden
                    generateHourCheckboxes(); // Generate the 24 hour checkboxes
                } else {
                    // If the date input is cleared, hide the hour selection section
                    hourSelectionSection.classList.add('d-none'); // Use d-none for Bootstrap hidden
                    // Also reset the hour selection state and clear hidden inputs
                    firstSelectedHour = null;
                    lastSelectedHour = null;
                    updateSelectedRangeDisplay();
                    savedValuesDisplay.classList.add('d-none'); // Hide saved values display
                }
            });

            // Listen for HTMX afterSwap event to show the saved values display
            document.body.addEventListener('htmx:afterSwap', (event) => {
                if (event.detail.target.id === 'saved-values-display') {
                    savedValuesDisplay.classList.remove('d-none');
                }
            });
        });
    </script>
@endsection
