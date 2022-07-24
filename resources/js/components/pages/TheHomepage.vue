<template>
    <div class="container mt-3">
        <h1>This is the dashboard</h1>
        <Calendar
            style="height: 600px"
            :view="view"
            :use-detail-popup="true"
            :month="month"
            :calendars="calendars"
            :events="events"
            ref="calendar"
        />
    </div>
</template>

<script>

import Calendar from '@toast-ui/vue-calendar';
import '@toast-ui/calendar/dist/toastui-calendar.min.css'; 
import TheNav from '../UI/TheNavbar.vue';
export default {
    data(){
        return{
            view: 'month',
            month: {
                dayNames: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                visibleWeeksCount: 4,
            },
            calendars: [{ id: 'cal1', name: 'Personal' }],
            events: [
                {
                id: '1',
                calendarId: 'cal1',
                title: 'Lunch',
                category: 'time',
                start: '2022-06-28T12:00:00',
                end: '2022-06-28T13:30:00',
                },
                {
                id: '2',
                calendarId: 'cal1',
                title: 'Coffee Break',
                category: 'time',
                start: '2022-07-28T15:00:00',
                end: '2022-07-28T15:30:00',
                },
            ],
        }
    },
    components: {
        TheNav,
        Calendar,
    },
    mounted(){
        this.calendarInstance.createEvents([
            {
                id: 'event1',
                calendarId: 'cal1',
                title: 'Weekly Meeting',
                start: '2022-07-30T09:00:00',
                end: '2022-07-30T10:00:00',
            }
        ])
    },
    computed: {
        calendarInstance(){
            return this.$refs.calendar.getInstance();
        }
    }
}
</script>

<style scoped>
    calendar-border{
        border: 1px solid #333;
    }
</style>