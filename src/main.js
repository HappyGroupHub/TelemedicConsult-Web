import { createApp } from 'vue'
import './style.css'
import App from './patient_login.vue'
import patient_base from './register_patient.vue'
import join_linebot from './join_linebot.vue'
import reservation from './reservation.vue'
import description from './description1.vue'
import front_page from './front_page.vue'
import time from './time1.vue'
import check2 from './check_reservation.vue'
import doctor_login from './doctor_login.vue'
import doctor_update from './doctor_update.vue'
import doctor_schedule from './doctor_schedule.vue'
import doctor_clinic from './doctor_clinic.vue'


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


