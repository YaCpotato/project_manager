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
        tasks:Array
    },
    data(){
        return{
            // tasks:[
            //     {
            //         id: 'Task 1',
            //         name: 'Redesign website',
            //         start: '2016-12-28',
            //         end: '2016-12-31',
            //         progress: 20,
            //     },
            //     {
            //         id: 'Task 2',
            //         name: 'Redesign website',
            //         start: '2016-12-28',
            //         end: '2016-12-31',
            //         progress: 20,
            //     },
            //     {
            //         id: 'Task 3',
            //         name: 'Redesign website',
            //         start: '2016-12-28',
            //         end: '2016-12-31',
            //         progress: 20,
            //     },
            // ],
            gantt:{}
        }
    },
    mounted:function(){
        // axios.get('/api/task/'+this.project_id).then((res)=>{
        //             for(let i=0;i<res.data.length;i++){
        //                 this.tasks.push({
        //                     id:res.data[i].name,
        //                     name:res.data[i].name,
        //                     start:moment(res.data[i].created_at).format('YYYY-MM-DD'),
        //                     end:moment(res.data[i].deadline).format('YYYY-MM-DD'),
        //                     completed_at:res.data[i].completed_at,
        //                     progress:20
        //                 })
        //             }
        //             console.log(this.tasks)
        //         })
        //             .catch(error => console.log(error))
         this.gantt = new Gantt('#gantt', this.tasks);

    }
}
</script>
<style lang="stylus">
</style>