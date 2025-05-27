<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .calendar-container {
      width: 250px;
      border-radius: 8px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      padding: 12px;
      background-color: white;
      height: 280px; /* Adjusted to fit navigation buttons */
      display: flex;
      flex-direction: column;
    }
    
        .header-nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 16px;
    }

    .section-title {
      font-size: 20px;
      font-weight: 600;
      color: #1a202c; /* Darker gray */
    }
        
    .calendar-month {
      font-size: 16px;
      font-weight: 500;
      color: #333;
      text-align: center;
    }
    
    .nav-button {
  background-color: transparent;
  border: none;
  color: #6b7280;
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  width: 24px;
  height: 24px;
}

.month-nav-buttons {
  display: flex;
  gap: 6px;
  margin-bottom: 20px;
}

.nav-button:hover {
  background-color:rgb(241, 249, 255);
  transform: translateY(-1px);
  box-shadow: 0 3px 6px rgba(174, 220, 255, 0.4);
}

.nav-button:active {
  transform: translateY(0);
  box-shadow: 0 3px 6px rgba(174, 220, 255, 0.4);
}
    
    .nav-button:hover {
      background-color: transparent;
    }
    
    /* Compact calendar area - will take remaining space */
    #calendar {
  width: 100%;
  display: flex;
  justify-content: center;
}


    #calendar .fc-scrollgrid {
  margin: 0 auto;
  max-width: 100%;
  width: fit-content;
}

    
    
    /* Customize FullCalendar styles for compactness */
    .fc-theme-standard .fc-scrollgrid {
      border: none !important;
    }
    
    .fc .fc-scrollgrid-section > * {
      border-width: 0 !important;
    }
    
    .fc th {
      border: none !important;
      padding: 2px 0 !important;
      font-weight: normal !important;
      font-size: 11px !important;
      color: #666 !important;
      text-align: center !important;
      justify-content: center;

    }
    
    .fc-col-header-cell a {
      pointer-events: none;
      text-decoration: none;
      color: inherit;
      cursor: default;
    }
    
    .fc .fc-daygrid-day-top {
      display: flex;
      justify-content: center;
      padding-top: 2px !important;
    }
    
    .fc .fc-daygrid-day-number {
      padding: 2px !important;
      font-size: 12px;
      color: #333;
      text-decoration: none !important;
    }
    
    .fc .fc-daygrid-day.fc-day-other .fc-daygrid-day-number {
      color: #ccc;
    }
    
    .fc .fc-toolbar {
      display: none;
    }
    
    .fc-view-harness {
      height: auto !important;
    }
    
    /* para small cells  */
    .fc .fc-daygrid-day-frame {
      min-height: 24px !important;
      padding: 0 !important;
    }
    
    /* important event handling */
    .fc .fc-daygrid-day-events {
      display: none !important;
    }
    
    .fc .fc-daygrid-body-balanced .fc-daygrid-day-events {
      position: absolute !important;
      min-height: 0 !important;
    }
    
    .fc .fc-bg-event {
      opacity: 1 !important;
    }
    
    .fc .fc-day-today {
      background-color: transparent !important;
    }
    
    .fc .fc-day-today .fc-daygrid-day-number {
      background-color:rgb(205, 222, 252);
      color:rgb(0, 58, 173);

      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .event-today-bg {
      background-color: #0078d4 !important;
      border-radius: 50%;
      opacity: 1;
    }
    
    .event-deadline-bg {
      background-color: #ff8c00 !important; 
      border-radius: 50%;
      opacity: 1;
    }
    
    .legend {
      display: flex;
      margin-top: 8px;
      gap: 8px;
      font-size: 10px;
      justify-content: center;
    }
    
    .legend-item {
      display: flex;
      align-items: center;
      gap: 3px;
    }
    
    .legend-color {
      width: 10px;
      height: 10px;
      border-radius: 2px;
    }
    
    .legend-today {
      background-color: #0078d4;
    }
    
    .legend-deadline {
      background-color: #ff8c00;
    }


  </style>
</head>
<body>
  
    <div class="header-nav">
      <div class="section-title" id="current-month-year"></div>
      <div class="month-nav-buttons">
        <button class="nav-button" id="prev-month">&lt;</button>
        <button class="nav-button" id="next-month">&gt;</button>
      </div>
    </div>

    <div id="calendar"></div>
    
    <!-- <div class="legend">
      <div class="legend-item">
        <div class="legend-color legend-today"></div>
        <span>Today</span>
      </div>
      <div class="legend-item">
        <div class="legend-color legend-deadline"></div>
        <span>Event Deadline</span>
      </div>
    </div> -->
  
  
  <script>
 document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  const monthYearEl = document.getElementById('current-month-year');
  const prevButton = document.getElementById('prev-month');
  const nextButton = document.getElementById('next-month');
  
  // Sample event data - in a real app, fetch this from backend
  const eventDates = [
    // Format: [year, month (0-11), day]
    [2025, 3, 21], // April 21, 2025
    [2025, 2, 28], // March 28, 2025
    [2025, 1, 14], // February 14, 2025
    [2025, 4, 5],  // May 5, 2025
  ];
  
  // Get current date
  const today = new Date();
  let currentDate = new Date(today);
  
  // Format the month and year for display
  function formatMonthYear(date) {
    return date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
  }
  
  // Update month/year display
  function updateMonthYearDisplay() {
    monthYearEl.textContent = formatMonthYear(currentDate);
  }
  
  // Check if a date has an event
  function hasEvent(date) {
    return eventDates.some(([year, month, day]) => 
      date.getFullYear() === year && 
      date.getMonth() === month && 
      date.getDate() === day
    );
  }
  
  // Create the calendar with fixed dimensions
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: currentDate,
    headerToolbar: false,
    dayCellDidMount: function(info) {
      const cellDate = info.date;
      const isToday = (
        cellDate.getDate() === today.getDate() && 
        cellDate.getMonth() === today.getMonth() && 
        cellDate.getFullYear() === today.getFullYear()
      );
      
      const isEvent = hasEvent(cellDate);
      
      if (isToday || isEvent) {
        const circleEl = document.createElement('div');
        circleEl.className = isToday ? 'event-today-bg' : 'event-deadline-bg';
        info.el.appendChild(circleEl);
      }
    },
    height: 180, // Fixed height
    fixedWeekCount: true, // Always show 6 weeks to maintain consistent height
    showNonCurrentDates: true,
    dayHeaderFormat: { weekday: 'narrow' }, 
    firstDay: 0,
    aspectRatio: 1.2, // Fixed aspect ratio
    expandRows: false, // Prevent row expansion
  });
  
  // Initialize calendar display
  calendar.render();
  updateMonthYearDisplay();
  
  // Store table height after initial render
  const initialHeight = calendarEl.querySelector('.fc-scrollgrid').offsetHeight;
  
  // Navigation with height preservation
  prevButton.addEventListener('click', function() {
    const calendarTable = calendarEl.querySelector('.fc-scrollgrid');
    const currentHeight = calendarTable.offsetHeight;
    
    currentDate.setMonth(currentDate.getMonth() - 1);
    calendar.gotoDate(currentDate);
    updateMonthYearDisplay();
    
    // Ensure height consistency
    setTimeout(() => {
      calendarTable.style.height = initialHeight + 'px';
    }, 10);
  });
  
  nextButton.addEventListener('click', function() {
    const calendarTable = calendarEl.querySelector('.fc-scrollgrid');
    const currentHeight = calendarTable.offsetHeight;
    
    currentDate.setMonth(currentDate.getMonth() + 1);
    calendar.gotoDate(currentDate);
    updateMonthYearDisplay();
    
    // Ensure height consistency
    setTimeout(() => {
      calendarTable.style.height = initialHeight + 'px';
    }, 10);
  });
  
  // Fix for initial calendar height
  setTimeout(() => {
    const calendarTable = calendarEl.querySelector('.fc-scrollgrid');
    calendarTable.style.height = initialHeight + 'px';
  }, 100);

  calendar.updateSize();

  
});
  </script>
</body>
</html>