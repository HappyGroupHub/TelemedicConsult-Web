import {createApp, inject} from 'vue'
import './style.css'
import App from './patient_login.vue'
import patient_base from './register_patient.vue'
import join_linebot from './join_linebot.vue'
import reservation from './reservation.vue'
import description from './description.vue'
import front_page from './front_page.vue'
import time from './time.vue'
import check2 from './check_reservation.vue'
import doctor_login from './doctor_login.vue'
import doctor_update from './doctor_update.vue'
import doctor_schedule from './doctor_schedule.vue'
import doctor_clinic from './doctor_clinic.vue'
import update from './update_patient.vue'
import case_manage from './case_management.vue'
import check_patient_appointment from "./check_patient_appointment.vue";

createApp(App).mount('#app')
createApp(patient_base).mount('#patient_base')
createApp(join_linebot).mount('#join_linebot')
createApp(reservation).mount('#reservation')
createApp(description).mount('#description')
createApp(front_page).mount('#front_page')
createApp(time).mount('#time')
createApp(check2).mount('#check2')
createApp(doctor_login).mount('#doctor_login')
createApp(doctor_update).mount('#doctor_update')
createApp(doctor_schedule).mount('#doctor_schedule')
createApp(doctor_clinic).mount('#doctor_clinic')
createApp(update).mount('#update')
createApp(case_manage).mount('#case')
createApp(check_patient_appointment).mount('#check_patient_appointment')





import VueNativeSock from 'vue-native-websocket';
const app = createApp(doctor_clinic);

app.use(VueNativeSock, 'ws://localhost:5000/ws', {
    reconnection: true,
    reconnectionAttempts: 5,
    reconnectionDelay: 3000,
});

app.provide('WebSocket', inject('$connect'));

app.mount('#doctor_clinic');
