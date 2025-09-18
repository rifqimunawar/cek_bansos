document.addEventListener('DOMContentLoaded', function () {
  var calendarElm = document.getElementById('calendar');
  var baseUrl = calendarElm.getAttribute('data-base-url');
  fetch(baseUrl + 'api/ronda-jadwal')
      .then(response => response.json())
      .then(data => {
          var events = data.map(item => {
              return item.wargas.map(warga => ({
                  title: warga.nama,
                  start: item.tanggal_ronda,
              }));
          }).flat();


          var calendar = new FullCalendar.Calendar(calendarElm, {
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            initialView: 'dayGridMonth',
            editable: true,
            droppable: true,
            themeSystem: 'bootstrap',
            events: events
        });

        calendar.render();


      })
      .catch(error => console.error('Error fetching ronda data:', error));
});
