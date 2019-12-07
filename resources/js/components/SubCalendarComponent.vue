<template>
    <div class="container">
        <div class="row justify-content-center">
            <v-calendar :attributes="attrs" ></v-calendar>
        </div>
    </div>
</template>

<script>
import VCalendar from 'v-calendar';
Vue.use(VCalendar);

export default{
    delimiters: ['<<', '>>'],
    data(){
        return{
            attrs: [
            {
            key: 'today',
            highlight: {
                backgroundColor: '#ff8080',
            },
            dates: new Date(),
            popover: {
                label: 'メッセージを表示できます',
            },
            }
        ],
    }
  }
}
</script>