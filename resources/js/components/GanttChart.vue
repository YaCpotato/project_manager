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
    data(){
        return{
            tasks:[],
            gantt:{}
        }
    },
    mounted:function(){
        axios.get('/api/task').then((res)=>{
                    for(let i=0;i<res.data.length;i++){
                        this.tasks.push({
                            id:res.data[i].id,
                            name:red.data[i].name,
                            start:res.data[i].created_at,
                            end:red.data[i].deadline,
                            completed_at:red.data[i].completed_at,
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