<template>
    <div id='app'>
        <v-calendar :attributes="attrs" is-expanded></v-calendar>         
    </div>
</template>
<script>
import VCalendar from 'v-calendar';

export default {
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
<style lang="stylus">

</style>