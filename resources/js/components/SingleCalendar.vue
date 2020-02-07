<template>
    <div id='app'>
        <v-calendar :attributes="attrs" is-expanded></v-calendar>         
    </div>
</template>
<script>
import VCalendar from 'v-calendar';

export default {
    props:{
        events: Object
    },
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
                },
            ],
        }
    },
    mounted:function(){
        console.log(this.events)
        alert('s')
        for(let event=0;event<this.events.length;event++){
            this.attrs.push({
                key: event.key,
                bar: {
                    height: '3px',
                    backgroundColor: 'red',
                    borderColor: null,
                    borderWidth: '1px',
                    borderStyle:'solid',
                    opacity: 1
                },
                dates: {
                    start: event.startDateTime
                }
            })
        }
    }
}
</script>
<style lang="stylus">

</style>