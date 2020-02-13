<template>
<div id="app">
    <p>Gantt Chart</p>
        <svg id="gantt"></svg>
        </div>
    </template>
<script>
import moment from 'moment'
import Gantt from 'frappe-gantt'

let gantt = new Gantt('#gantt',app.tasks);

export default {
    name:'app',
    props:{
        project_id:String
    },
    data(){
        return{
            tasks:[
                {
                    id: 'Task 1',
                    name: 'Redesign website',
                    start: '2016-12-28',
                    end: '2016-12-31',
                    progress: 20,
                }
            ],
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
        this.getTask()
    },
    methods:{
        getTask:function(){
            console.log('get')
            axios.get('/api/task/'+this.project_id).then((res)=>{
                        for(let i=0;i<res.data.length;i++){
                            this.tasks.push({
                                id:res.data[i].name,
                                name:res.data[i].name,
                                start:moment(res.data[i].created_at).format('YYYY-MM-DD'),
                                end:moment(res.data[i].deadline).format('YYYY-MM-DD'),
                                progress:20
                            })
                        }
                    })
                        .catch(error => console.log(error))
                        console.log(this.tasks)
            this.gantt.refresh(this.tasks)
    },
    }
}
</script>
<style lang="stylus">
</style>