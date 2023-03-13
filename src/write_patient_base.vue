<script setup>
  import bar from './components/bar.vue'
  import banner from './components/banner_write_patient.vue'

  import writing_patient2 from './components/writing_patient.vue'
  import axios from 'axios'
  import {defineProps, defineEmits, defineExpose} from 'vue'

  const props = defineProps({
    patient_base: {
      name: '',
      id: '',
      birthday: '',
      height: '',
      weight: '',
      sex: '',
      ice_contact: '',
      ice_phone: '',
      ice_relation: '',
      ic_card_number: '',
      phone_number: '',
      blood_type: '',
      address: ''


    }
  })

    const submitForm = () => {
      const formData = new FormData();
      formData.append('name', this.name);
      formData.append('id', this.id);
      formData.append('birthday', this.birthday);
      formData.append('height', this.height);
      formData.append('weight', this.weight);
      formData.append('sex', this.sex);
      formData.append('ice_contact', this.ice_contact);
      formData.append('ice_phone', this.ice_phone);
      formData.append('ice_relation', this.ice_relation);
      formData.append('ic_card_number', this.ic_card_number);
      formData.append('phone_number', this.phone_number);
      formData.append('blood_type', this.blood_type);
      formData.append('address', this.address);

      axios.post('C:\\xampp/htdocs/src/components/insert.php', {formData})
          .then(response => {
            console.log(response)
          })
          .catch(error => {
            console.log(error)
          })


  }


</script>

<template>
  <bar />
  <banner />
  <writing_patient2>
  </writing_patient2>


</template>

<style >

</style>
