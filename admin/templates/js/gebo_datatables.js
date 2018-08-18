/* [ ---- Gebo Admin Panel - datatables ---- ] */

	$(document).ready(function() {
		//* basic
		gebo_datatbles.dt_a();
		// horizontal scroll
		gebo_datatbles.dt_b();
		//* large table
		gebo_datatbles.dt_c();
		//* hideable columns
		gebo_datatbles.dt_d();
		//* server side proccessing with hiden row
		gebo_datatbles.dt_e();
		
		//智能小报表
		peity_charts.init();
		
	});
	
	//* 智能小报表
	peity_charts = {
		init: function() {
			$.fn.peity.defaults.line = {
				strokeWidth: 1,
				delimeter: ",",
				height: 32,
				max: null,
				min: 0,
				width: 50
			};
			$.fn.peity.defaults.bar = {
				delimeter: ",",
				height: 32,
				max: null,
				min: 0,
				width: 50
			};
			$(".p_bar_up").peity("bar",{
				colour: "#6cc334"
			});
			$(".p_bar_down").peity("bar",{
				colour: "#e11b28"
			});
			$(".p_line_up").peity("line",{
				colour: "#b4dbeb",
				strokeColour: "#3ca0ca"
			});
			$(".p_line_down").peity("line",{
				colour: "#f7bfc3",
				strokeColour: "#e11b28"
			});
		}
	};
	
	//* calendar
	gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
                "sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                //"sScrollX": "100%",
                //"sScrollXInner": '110%',
				"sScrollX": "2500px",
                "sScrollXInner": '2500px',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            }
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'span6'><'span6'f>r>t<'row'<'span6'i><'span6'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                }
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'span6'><'span6'f>r>t<'row'<'span6'i><'span6'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
		},
		dt_d: function() {
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			}
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				
				//每页显示记录条数
//				"iDisplayLength" : 40,
//				"aLengthMenu" : [20, 40, 60], //更改显示记录数选项  
				//修改默认首个id字段倒序排序，删除为默认升序
				"aaSorting": [[0, 'desc']]
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_e: function(){
			if($('#dt_e').length) {
				
				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_e').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"sAjaxSource": "lib/datatables/server_side.php",
					"aoColumns": [
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_e').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		},
		
		//hr_student_info 表的配置信息
		dt_hr_student_info: function() {
			function fnShowHide( iCol ) {
				var oTable = $('#dt_hr_student_info').dataTable();
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			}
			var oTable = $('#dt_hr_student_info').dataTable({
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				
				//每页显示记录条数
				"iDisplayLength" : 50,
				"aLengthMenu" : [50, 100], //更改显示记录数选项  
				//修改默认首个id字段倒序排序，删除为默认升序
				"aaSorting": [[4, 'desc']]
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},

		//hr_student_info 表的配置信息
		dt_st_log: function() {
			//alert(123);return;
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_st_log').dataTable({
					"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"sScrollX": "2500px",
					"sScrollXInner": '2500px',
					"sPaginationType": "bootstrap",
					"bScrollCollapse": true
				});

				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			}

		}

	};
