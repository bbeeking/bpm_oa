/**
 * 图表封装函数
 * @author BEE LEUNG 2014-04-17
 */
function initChart(widths,heights,borders,chartbox,charttype,xvalue,series,title,ytitle,steps,unit,enableds,stacked,marbottom,tbcolor,linecolors,pointWidth) 
//图表宽度，图表高度，表格边框，边框图标ID，图标类型，x轴的数据，图标数据，图标标题，y轴标题,x轴标签的相隔显示的步长，数据的单位，是否显示图列说明，是否堆积，图表据底部的距离，图柱的颜色，曲线的颜色，柱子的大小
{
		chart = new Highcharts.Chart
		({
			chart: {
				renderTo: chartbox,    //显示报表的ID
				type: charttype,      //显示报表的类型 line,column,bar
				marginBottom: marbottom,      //图表据底部的距离
				width: widths,
				height: heights,
				borderWidth: borders,
				borderRadius:0,
				borderColor:"#DFDFDF"
			},
			title: {
				text: title,         //表格的名称
				x: -20, //center      //距x轴的距离
				style:{ 
					fontSize:"12px"
				},
			},
			subtitle: {
				//text: 'jqddsjfx',
				x: -20               //据x轴的距离
			},
			xAxis: {
				labels:{
						step:steps    //标签的相隔显示的步长
				},    
				 categories: xvalue,  //x轴的数据
				 maxPadding : 0.05,  //最大内边距
			     minPadding : 0.05,  //最小内边距
			     tickWidth:1,//刻度的宽度  
			     lineWidth :1,//自定义x轴宽度  
			     gridLineWidth:0//默认是0，即在图上没有纵轴间隔线  
//			     lineColor : '#990000' //X轴的颜色
			},
			yAxis: {
				min: 0,       //最小值
				title: {
					text: ytitle    //y轴标题
				},
				plotLines: [{      //标线属性
					value: 0,      //值为0的标线
					width: 2,      //宽度为2的标线
					color: '#808080'  //颜色
				}]
			},
			legend: {
				align: 'center',     //图例说明显示框居中
				verticalAlign: 'bottom',//图例说明显示框居下
				borderWidth: 0,         //图例说明显示框边框
				enabled: enableds         //是否显示图列说明
			},
			tooltip: {
				formatter: function() {
					return ''+
						this.x +': '+ this.y + unit;  //鼠标经过显示的x和y和单位的
				}
			},	
			plotOptions: {
				column: {
						stacking: stacked, //是否堆积  percent与null
						color:tbcolor,
						borderWidth:0,
						pointWidth: pointWidth,
						dataLabels: { //图上是否显示数据标签
									enabled: true,
									align: "center",
									verticalAlign:"top",
									formatter: function()
									{
									return this.y 
									},
									x:0,
									y:-5
							},
					},
				line: {
						color:linecolors,
						borderWidth:0
					}
			},
			
			series: series             //图片的数据
		});
}