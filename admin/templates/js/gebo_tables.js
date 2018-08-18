/* [ ---- Gebo Admin Panel - tables ---- ] */

	$(document).ready(function() {
		//* datatable must be rendered first
        gebo_galery_table.init();
        //* actions for tables, datatables
        gebo_select_row.init();
		gebo_delete_rows.simple();
		gebo_delete_rows.dt();
	});

	//* select all rows
	gebo_select_row = {
		init: function() {
			$('.select_rows').click(function () {
				var tableid = $(this).data('tableid');
                $('#'+tableid).find('input[name=row_sel]').attr('checked', this.checked);
			});
		}
	};
	
	//* delete rows
	gebo_delete_rows = {
		simple: function() {
			$(".delete_rows_simple").on('click',function (e) {
				e.preventDefault();
				var tableid = $(this).data('tableid');
                if($('input[name=row_sel]:checked', '#'+tableid).length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                $('input[name=row_sel]:checked', '#'+tableid).closest('tr').fadeTo(300, 0, function () { 
                                    $(this).remove();
                                    $('.select_rows','#'+tableid).attr('checked',false);
                                });
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                }
			});
		},
        dt: function() {
			$(".delete_rows_dt").on('click',function (e) {
				e.preventDefault();
				var tableid = $(this).data('tableid'),
                    oTable = $('#'+tableid).dataTable();
                if($('input[name=row_sel]:checked', '#'+tableid).length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                        	
                        	//获取选择td的寄存参数
                        	var checked = [];
                            
                        	$('.confirm_yes').click(function(e){
                                e.preventDefault();
                                
                                //遍历获取选中的值
                                $('input:checkbox:checked').each(function() {
                                    checked.push($(this).val());
                                });
                                
                                $('input[name=row_sel]:checked', oTable.fnGetNodes()).closest('tr').fadeTo(300, 0, function () {
                                    $(this).remove();
									oTable.fnDeleteRow( this );
                                    $('.select_rows','#'+tableid).attr('checked',false);
                                });
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                }    
			});
			
			//产品属性对比功能
			$(".deal_rows_dt").on('click',function (e) {
				e.preventDefault();
				var tableid = $(this).data('tableid'),
                    oTable = $('#'+tableid).dataTable();
                if($('input[name=row_sel]:checked', '#'+tableid).length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                        	
                        	//获取选择td的寄存参数
                        	var checked = [];
                            
                        	$('.confirm_yes').click(function(e){
                                e.preventDefault();
                                
                                //遍历获取选中的值
                                //$('input:checkbox:checked').each(function() {
                                $('input[name="row_sel"]:checked').each(function() {
                                    checked.push($(this).val());
                                });
//                                alert(checked);
                                
                                $.colorbox.close();

                                //alert(checked);return;
                                location.href = "../task/taskProcess.php?action=taskUpdateVersion&checked="+checked;
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                }    
			});

            //添加到产品对比栏中
            $(".add_compare_dt").on('click',function (e) {
                e.preventDefault();
                var tableid = $(this).data('tableid'),
                    oTable = $('#'+tableid).dataTable();
                if($('input[name=row_sel]:checked', '#'+tableid).length) {

                    //获取选择td的寄存参数
                    var checked = [];
                    //遍历获取选中的值
                    $('input[name="row_sel"]:checked').each(function() {
                        checked.push($(this).val());
                    });

                    //alert(checked);

                    $.ajax({
                        type	: "get",
                        url 	: "../product/compare.php?action=productCompareAdd&checked="+checked,
                        //data    :{"action" : productCompareAdd,"checked" : checked},
                        dataType: "json",
                        success : function(rs){

                            $.colorbox({
                                initialHeight: '0',
                                initialWidth: '0',
                                href: "#add_compare_dt_dialog",
                                inline: true,
                                opacity: '0.3',
                                onComplete: function(){

                                    $('.confirm_yes').click(function(e){
                                        e.preventDefault();
                                        $.colorbox.close();

                                        location.href = "../product/compare.php?action=productCompare";
                                    });
                                    $('.confirm_no').click(function(e){
                                        e.preventDefault();
                                        $.colorbox.close();
                                    });
                                }
                            });


                        },
                        error : function(rs){
                            //alert(rs);
                            alert("添加对比篮数据出错!");
                        }
                    });

                }
            });


            //清空对比功能
            $(".trash_rows_dt").on('click',function (e) {
                e.preventDefault();
                var tableid = $(this).data('tableid'),
                    oTable = $('#'+tableid).dataTable();
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#trash_rows_dt_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){

                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                $.colorbox.close();

                                $.ajax({
                                    type	: "get",
                                    url 	: "../product/compare.php?action=productCompareTrash",
                                    dataType: "json",
                                    success : function(rs){
                                        alert("清空对比栏数据成功!");return;
                                    },
                                    error : function(rs){
                                        alert("清空对比栏数据出错!");
                                    }
                                });

                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close();
                            });
                        }
                    });
            });


		}
	};
	
    //* gallery table view
    gebo_galery_table = {
        init: function() {
           $('#dt_gal').dataTable({
				"sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
               "sPaginationType": "bootstrap",
                "aaSorting": [[ 2, "asc" ]],
				"aoColumns": [
					{ "bSortable": false },
					{ "bSortable": false },
					{ "sType": "string" },
					{ "sType": "formatted-num" },
					{ "sType": "eu_date" },
					{ "bSortable": false }
				]
			});


           $('.dt_actions').html($('.dt_gal_actions').html());


            //2015-07-20增加字段数量值，用于控制table左右移动
            //var tableColumnNum = $('#tableParamNum').val();
            //if(tableColumnNum >11){
            //    var sScrollXInner = tableColumnNum*10+'%';
            //}else{
            //    var sScrollXInner = '100%';
            //}

            //获取table中额外增加的参数数量
            var tableParamNum = $('#tableParamNum').val();
            //alert(tableParamNum);return;

            //定义table样式配置字符串
            var tableParamStr = '[{ "bSortable": false },';
            tableParamStr = tableParamStr+'{ "sType": "formatted-num" },';
            for(var i=1;i<tableParamNum;i++)
            {
                tableParamStr = tableParamStr+'{ "sType": "string" },';
            }
            tableParamStr = tableParamStr.substring(0,tableParamStr.length-1);
            tableParamStr = tableParamStr+']';
            //alert(tableParamStr);return;

            var kk=eval(tableParamStr);
           //增加产品对比报表配置
           $('#dt_st_log').dataTable({
				"sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
              "sPaginationType": "bootstrap",
               "aaSorting": [[ 1, "desc" ]],
               "sScrollX": "2500px",
               "sScrollXInner": '2500px',
               "sPaginationType": "bootstrap",
               "bScrollCollapse": true,
               "iDisplayLength" :15,
				"aoColumns":kk

			});
          $('.dt_actions').html($('.dt_st_actions').html());
        }
    };