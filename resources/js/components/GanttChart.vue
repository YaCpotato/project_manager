<template>
<div id="app">
    <p>Gantt Chart</p>
        <table border="1" id="task_chart" class="table" style="border-collapse:collapse;">
                        <tr id="first">

                        </tr>
                        <tr id="second">

                        </tr>
                        <tr id="third">

                        </tr>
                        <tr id="mile">

                        </tr>
                        <tr id="chart_border"></tr>
                    </table>
            <div id="chart-area"></div>
    </div>
    </template>
<script>
import moment from 'moment'
import * as d3 from "d3"
import $ from 'jquery'

export default {
    created:function(){
            moment.locale('ja', {
                weekdays: ["日曜日","月曜日","火曜日","水曜日","木曜日","金曜日","土曜日"],
                weekdaysShort: [0,1,2,3,4,5,6],
            })
        },
    data(){
        return{
            project_id:1,
            tasks:[],
            startDate:'',
            endDate:''
        }
    },
    mounted:function(){
        this.setUp()
    },
    methods:{
        async setUp(){
            await axios.get('/api/task/'+this.project_id).then((res)=>{
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
        this.defineStartLimit('daily')
        this.periodCalc('daily')
        this.drawchart()
    },
        //開始日と終了日から、どこからどこまでカレンダーを描画するのかを決める。
        //日表示ー＞2ヶ月先 OR 終了日がそれ以降ならそこまで
          defineStartLimit(type){
            var dateArray = [];
            var start,end
            for(var i=0;i<this.tasks.length;i++){
              dateArray.push(this.tasks[i].start)
            }
            dateArray.sort((a, b) => moment(a).diff(b))
            start = moment(dateArray[0]).format('YYYY/MM/DD')
            if(type == 'daily'){
                 end = moment(dateArray[0]).add(2,'months').format('YYYY/MM/DD')
            }else if(type == 'weekly'){
                 end = moment(dateArray[0]).add(4,'months').format('YYYY/MM/DD')
            }else if(type == 'monthly'){
                 end = moment(dateArray[0]).add(6,'months').format('YYYY/MM/DD')
            }
            this.startDate = start
            this.endDate = end
          },
          drawchart:function(){
            console.log(this.tasks)
            //svg描画領域
            var svg = d3.select('#chart-area').append("svg")
                    .attr("x", 0)
                    .attr("y", 0)
                    .attr("width", $('#chart-area').width())
                    .attr("height", ($('.trow').outerHeight()) * this.tasks.length);
            //描画バックグラウンド
            for(var task in this.tasks){
              svg.append("rect")
              .attr("x", 0)
              .attr("y", $('.tRow').outerHeight() * task)
              .attr("id",'chart-bg-number-'+task)
              .attr("width", $('#chart-area').width())
              .attr("height", $('.trow').outerHeight())
              .attr("fill",'red')
              .attr("fill-opacity",'0.5')
            }
                for(var i=0;i<this.tasks.length;i++){
                  
                  var startDateID = "#y"+moment(this.tasks[i].start).format("YYYY")+"m"+moment(this.tasks[i].start).format("M")+"d"+moment(this.tasks[i].start).format("D")
                  var days = moment(this.tasks[i].end).diff(this.tasks[i].start, 'days')
                  console.log(days)
                     var startX = $(startDateID).position().left
                  
                    svg.append("rect")
                    .attr("x", startX)//startX
                    .attr("y", ($('.tRow').outerHeight()) * i)//$(startDateID).width()
                    .attr("width", 49 * days)
                    .attr("height", 40)
                    .attr("fill",'black')
                  .attr("id","task-number-"+i)
                    }
            // this.autoScheduleFilter()
            // this.drawDepend(svg)
            },
          drawDepend:function(svg){
            // for(var i=0;i<this.Task.length;i++){
            //   if(this.Task[i].Dependencies.length > 0){
            //        for(var dependID in this.Task[i].Dependencies){
            //           var startDateID = "#y"+moment(this.Task[i].StartDate).format("YYYY")+"m"+moment(this.Task[i].StartDate).format("M")+"d"+moment(this.Task[i].StartDate).format("D")
            //           var targetDateID = "#y"+moment(this.Task[dependID].StartDate).format("YYYY")+"m"+moment(this.Task[dependID].StartDate).format("M")+"d"+moment(this.Task[dependID].StartDate).format("D")
            //          var dependFromX = $(startDateID).position().left
            //          var dependFromY = ((($('.tRow').height()) * i)+10)
            //          var midPoint = $('#task-number-'+this.Task[dependID].id).width()
            //          var dependToX = $(targetDateID).position().left + $('#task-number-'+this.Task[dependID].id).width()/2
            //          var dependToY = ($('.tRow').height()) * this.Task[dependID].id +20
            //           svg.append("polyline")
            //             .attr("points",dependFromX+" "+dependFromY+", "+dependToX+" "+ midPoint/2 +","+dependToX+" "+dependToY)
            //             .attr("fill","none")
            //             .attr("stroke","blue")
            //             .attr("stroke-width","5px")
            // }}
            // }
          },
            DateFormat:function(date){
                return moment(date).format('YYYY/MM/DD')
            },
            MomentFormat:function(date){
              return moment(date)
            },
            HowWeeks:function(date){
              var startmoment = moment(date).startOf('month').week()
              var serial = moment(date).week() - startmoment + 1
              return serial
            },
            HowQuarter:function(month){
              if(month==1 || month==2 || month==3){
                return 4
              }else if(month==4 || month==5 || month==6){
                return 1
              }else if(month==7 || month==8 || month==9){
                return 2
              }else if(month==10 || month==11 || month==12){
                return 3
              }
            },
            periodCalc:function(type){
                //動作確認OK
                var startDate = new Date(this.startDate);
                var endDate =  new Date(this.endDate);
                var calendarInfo = {};
                var targetDate = startDate;
                var curYear = startDate.getFullYear();
                var curMonth = startDate.getMonth() + 1;
                var curDay = startDate.getDate();
                var curY = startDate.getDay();//曜日
                //var dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ][curY]
                //描画用オブジェクトの作成　年obj > 月obj > 日、曜日obj
                while (targetDate <= endDate) {
                    if (!calendarInfo[curYear]) {
                        calendarInfo[curYear] = {};
                    }
                    if (!calendarInfo[curYear][curMonth]) {
                      calendarInfo[curYear][curMonth] = [];
                    }

                    calendarInfo[curYear][curMonth].push({
                      "day":curDay,
                      "date":curY,
                    });
                    targetDate.setDate(targetDate.getDate() + 1);
                    curYear = startDate.getFullYear();
                    curMonth = startDate.getMonth() + 1;
                    curDay = startDate.getDate();
                    curY = startDate.getDay();
                    //dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ][curY]
                }
                var monthend = 0
                var quarter = moment(this.startDate).quarter() -1
                var i=0
                var quartermonth=null
                var quarter = 2
                var length = 0
                var lastmonth = 0
                var lastyear = 0
                var lastquartermonth = 0
                var monthlength = 0
                var curMonth = 0
                var weekcount = this.HowWeeks(this.startDate);

                if(type == 'daily'){
                    $('#first').children().remove()
                    $('#second').children().remove()
                    $('#third').children().remove()
                    var yearlength = 0
                    var j=0
                    for (var year in calendarInfo) {
                        $('#first').append('<td id=y'+year+' class="ganttcal tRow">'+year+'</td>')
                        for (var month in calendarInfo[year]){
                            $('#second').append('<td id=y'+year+'m'+month+' class="ganttcal">'+ month +'</td>')
                            ////日付描画
                            for(var i = 0; i < calendarInfo[year][month].length; i++) {
                                $('#third').append('<td id=y'+year+'m'+month+'d'+calendarInfo[year][month][i].day+' class="ganttcal">'+ calendarInfo[year][month][i].day +'</td>')
                                 yearlength++
                            }
                            $('#y'+year+'m'+month).attr("colSpan",calendarInfo[year][month].length)
                        }
                    }
                    $('#y'+year).attr("colSpan",yearlength)
                    yearlength = 0
                }else if(type == 'weekly'){
                    $('#first').children().remove()
                    $('#second').children().remove()
                    $('#third').children().remove()
                var yearlength = 0
                for (var year in calendarInfo) {
                    $('#first').append('<td id=y'+year+' class="ganttcal">'+year+'</td>')
                        for (var month in calendarInfo[year]) {
                          //月描画↓
                        $('#second').append('<td id=y'+year+'m'+month+' class="ganttcal">'+ month +'</td>')
                          //月描画↑
                      var checkpoint = 0;
                      var first = true
                      var monthsum = calendarInfo[year][month].length
                          for(var i = 0; i < calendarInfo[year][month].length; i++) {
                            if(calendarInfo[year][month][i].date == '土' && calendarInfo[year][month][i].day!=1 && first){
                              $('#third').append('<td id='+'y'+year+'m'+month+'w'+weekcount+' class="ganttcal"></td>')
                              $('#y'+year+'m'+month+'w'+weekcount).attr("colSpan",i+1)
                              $('#y'+year+'m'+month+'w'+weekcount).text("第"+(weekcount)+"週")
                              weekcount++
                              checkpoint = i
                              first = false
                            }else if(calendarInfo[year][month][i].date == '土' && calendarInfo[year][month][i].day!=1){
                              $('#third').append('<td id='+'y'+year+'m'+month+'w'+weekcount+' class="ganttcal"></td>')
                              $('#y'+year+'m'+month+'w'+weekcount).attr("colSpan",7)
                              $('#y'+year+'m'+month+'w'+weekcount).text("第"+(weekcount)+"週")
                              weekcount++
                              checkpoint = i
                            }
                            else if(i == calendarInfo[year][month].length -1){
                              $('#third').append('<td id='+'y'+year+'m'+month+'w'+weekcount+' class="ganttcal"></td>')
                              $('#y'+year+'m'+month+'w'+weekcount).attr("colSpan",calendarInfo[year][month].length-checkpoint-1)
                              $('#y'+year+'m'+month+'w'+weekcount).text("第"+(weekcount)+"週")
                              weekcount = 1
                              checkpoint = i
                            }
                            yearlength++
                          }
                          weekcount = 1
                          first = true
                          $('#y'+year+'m'+month).attr("colSpan",calendarInfo[year][month].length)
                        }
                        $('#y'+year).attr("colSpan",yearlength)
                        yearlength = 0
                  }
                }else if(type == 'monthly'){
                    $('#first').children().remove()
                    $('#second').children().remove()
                    $('#third').children().remove()
                  var yearlength = 0
                  for (var year in calendarInfo) {
                    $('#first').append('<td id=y'+year+' class="ganttcal">'+year+'</td>')
                        for (var month in calendarInfo[year]) {
                        $('#third').append('<td id=y'+year+'m'+month+' class="ganttcal">'+ month +'</td>')
                        $('#y'+year+'m'+month).attr("colSpan",calendarInfo[year][month].length)
                        length += calendarInfo[year][month].length
                        quartermonth = month
                        if(quartermonth %3<=2){
                          quarter = calendarInfo[year][month].length
                        }
                        lastyear = year
                        monthlength++
                        yearlength+=calendarInfo[year][month].length
                        if(month == 12){
                          monthlength = 0
                        }
                      }
                        $('#y'+year).attr("colSpan",yearlength)
                        yearlength = 0
                    }   if(quartermonth %3==0){
                          $('#second').append('<td id=y'+year+'q'+this.HowQuarter(quartermonth)+' class="ganttcal"></td>')
                          $('#y'+year+'q'+this.HowQuarter(quartermonth)).attr("colSpan",length)
                          //四半期番号
                          $('#y'+year+'q'+this.HowQuarter(quartermonth)).text("第"+this.HowQuarter(quartermonth)+"四半期")
                          length = 0
                          //lastmonth = month
                        }else if(Object.keys(calendarInfo[year]).length == monthlength && quartermonth/3 !=0){
                          $('#second').append('<td id=y'+lastyear+'q'+this.HowQuarter(quartermonth)+' class="ganttcal"></td>')
                          $('#y'+lastyear+'q'+this.HowQuarter(quartermonth)).attr("colSpan",length)
                          $('#y'+lastyear+'q'+this.HowQuarter(quartermonth)).text("第"+this.HowQuarter(quartermonth)+"四半期")
                         }
                        }
                        console.log(calendarInfo)
            }
        }
    }
</script>
<style>

</style>