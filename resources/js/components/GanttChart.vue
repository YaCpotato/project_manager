<template>
<div id="app">
    <p>Gantt Chart</p>
        <svg id="gantt"></svg>
        </div>
    </template>
<script>
import moment from 'moment'
import Gantt from 'frappe-gantt'

export default {
    props:{
        project_id:Number
    },
    data(){
        return{
            tasks:[],
            gantt:{}
        }
    },
    mounted:function(){
        axios.get('/api/task').then((res)=>{
            console.log(res.data)
                    for(let i=0;i<res.data.tasks.length;i++){
                        this.tasks.push({
                            id:res.data[i].tasks.id,
                            name:res.data[i].name,
                            start:moment(res.data[i].tasks.created_at).format('YYYY-MM-DD'),
                            end:moment(res.data[i].tasks.deadline).format('YYYY-MM-DD'),
                            completed_at:res.data[i].tasks.completed_at,
                            progress:20
                        })
                    }
                })
                    .catch(error => console.log(error))
        this.gantt = new Gantt('#gantt', this.tasks);

    }
}
</script>
<style lang="stylus">
</style>