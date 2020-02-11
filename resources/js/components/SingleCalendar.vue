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
                    backgroundColor: '#ff5580',
                },
                dates: new Date(),
                popover: {
                    label: 'これは今日です',
                },
                },
            ],
        }
    },
    mounted:function(){
        axios.get('/api/events').then((res)=>{
                    for(let i=0;i<res.data.length;i++){
                        this.attrs.push({
                            key:res.data[i].googleEvent.id,
                            highlight: {
                                backgroundColor: '#ff8080',
                            },
                            dates: res.data[i].googleEvent.start.dateTime,
                            popover: {
                                label: res.data[i].googleEvent.summary,
                            },
                        })
                    }
                })
                    .catch(error => console.log(error))
    }
}
</script>
<style lang="stylus">

</style>