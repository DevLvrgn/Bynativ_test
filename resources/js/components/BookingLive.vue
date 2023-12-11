<template>
    <div>
        <h1>Real-Time Updates</h1>
        <ul>
            <li v-for="booking in datas" :key="booking.id">
                {{ booking.name }} - {{ booking.date }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'BookingLive',
    data() {
        return {
            datas: [],
        };
    },
    props: {
      bookings: [],
    },
    mounted() {
        this.datas = this.bookings;
        // Écouter les événements en temps réel
        window.Echo.channel('booking-live')
            .listen('NewBooking', (event) => {

                console.log(event)
                // Mettre à jour la liste des rendez-vous
                this.datas.push(event.booking);
                return true;
            });
    },
};
</script>
