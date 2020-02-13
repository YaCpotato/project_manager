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
        axios.get('/api/task/'+this.project_id).then((res)=>{
                    for(let i=0;i<res.data.length;i++){
                        this.tasks.push({
                            id:res.data[i].id,
                            name:res.data[i].name,
                            start:new Date(res.data[i].created_at),
                            end:new Date(res.data[i].deadline),
                            completed_at:res.data[i].completed_at,
                            progress:20
                        })
                    }
                    console.log(this.tasks)
                })
                    .catch(error => console.log(error))
        this.gantt = new Gantt('#gantt', this.tasks);

    }
}
</script>
<style lang="stylus">
</style>