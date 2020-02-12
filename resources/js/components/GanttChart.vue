<template>
</template>
<script>
import moment from 'moment'

export default {
    data(){
        return{
            tasks:[],
            gantt:{}
        }
    },
    mounted:function(){
        axios.get('/api/tasks').then((res)=>{
                    for(let i=0;i<res.data.length;i++){
                        this.tasks.push({
                            id:res.data[i].id,
                            name:red.data[i].name,
                            created_at:res.data[i].created_at,
                            deadline:red.data[i].deadline,
                            completed_at:red.data[i].completed_at,
                        })
                    }
                })
                    .catch(error => console.log(error))
        this.gantt = new Gantt('#gantt', tasks, {
                    on_click: function (task) {
                        console.log(task);
                    },
                    on_date_change: function(task, start, end) {
                        console.log(task, start, end);
                    },
                    on_progress_change: function(task, progress) {
                        console.log(task, progress);
                    },
                    on_view_change: function(mode) {
                        console.log(mode);
                    }
                });

    }
}
</script>
<style lang="stylus">
</style>