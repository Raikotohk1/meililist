import './bootstrap';

import Alpine from 'alpinejs';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        events: '/events', // This should be your route for fetching events
    });
    calendar.render();
});

window.Alpine = Alpine;

Alpine.start();
