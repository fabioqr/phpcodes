

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        height: 'parent',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        // defaultDate: '2019-08-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        locale: 'pt-br', // allow "more" link when too many events

        eventSources: [

            // your event source
            {
                url: 'listar_eventos.php',
                extraParams: function () {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                },
                failure: function () {
                    alert('there was an error while fetching events!');
                }

            }
        ]

    }
    );

    calendar.render();
});

