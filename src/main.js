import { createApp } from 'vue'
import './style.css'
import App from './patient_login.vue'
import patient_base from './write_patient_base1.vue'

createApp(App).mount('#app')
createApp(patient_base).mount('#patient_base')
