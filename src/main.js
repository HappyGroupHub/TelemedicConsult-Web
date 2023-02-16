import { createApp } from 'vue'
import './style.css'
import App from './patient_login.vue'
import patient_base from './write_patient_base.vue'
import join_linebot from './join_linebot.vue'
import reservation from './reservation.vue'
import description from './description1.vue'
import front_page from './front_page.vue'



createApp(App).mount('#app')
createApp(patient_base).mount('#patient_base')

createApp(join_linebot).mount('#join_linebot')
createApp(reservation).mount('#reservation')
createApp(description).mount('#description')
createApp(front_page).mount('#front_page')
