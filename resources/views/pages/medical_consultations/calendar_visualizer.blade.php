@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
    <div id="calendar">

    </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            slotMinTime: '07:00',
            slotMaxTime: '19:00',
            initialView: 'timeGridWeek',
            events: @json($events)
            });
        calendar.render();
        });
    </script>
@endpush
