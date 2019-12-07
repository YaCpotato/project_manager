<template>
    <div class="container">
        <div class="row justify-content-center">
            <v-date-picker :mode="mode"
               :formats="formats"
               v-model="selectedDate"></v-date-picker>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
import VCalendar from 'v-calendar';
Vue.use(VCalendar);

export default{
    delimiters: ['<<', '>>'],
    data(){
        return{
            mode: 'single',
            formats: {
                input: ['YYYY-MM-DD'],
            },
            selectedDate: null,
        }
  }
}
</script>