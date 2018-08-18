/* [ ---- Gebo Admin Panel - extended form elements ---- ] */

	$(document).ready(function() {
		//* masked inputs
//		gebo_mask_input.init();
		//* datepicker
		gebo_datepicker.init();
		//* timepicker
//		gebo_timepicker.init();

		//* autosize for textareas
		//gebo_auto_expand.init();
		
		//* enhanced select 控制下拉框的样式
		gebo_chosen.init();
	});
	
	//* masked input
	gebo_mask_input = {
		init: function() {
			$("#mask_date").inputmask("9999-99-99",{placeholder:"yyyy-mm-dd"});
			$("#mask_phone").inputmask("(999) 999-9999");
			$("#mask_ssn").inputmask("999-9999-9999");
			$("#mask_product").inputmask("AA-999-A999");
		}
	};
	
	//* bootstrap datepicker
	gebo_datepicker = {
		init: function() {
			$('#dp1').datepicker();
			$('#dp2').datepicker();
			
			$('#dp_start').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				
				var endDateTextBox = $('#dp_end input');
				if (endDateTextBox.val() != '') {
					var testStartDate = new Date(dateText);
					var testEndDate = new Date(endDateTextBox.val());
					if (testStartDate > testEndDate) {
						endDateTextBox.val(dateText);
					}
				}
				else {
					endDateTextBox.val(dateText);
				};
				$('#dp_end').datepicker('setStartDate', dateText);
				$('#dp_start').datepicker('hide');
			});
			$('#dp_end').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				var startDateTextBox = $('#dp_start input');
				if (startDateTextBox.val() != '') {
					var testStartDate = new Date(startDateTextBox.val());
					var testEndDate = new Date(dateText);
					if (testStartDate > testEndDate) {
						startDateTextBox.val(dateText);
					}
				}
				else {
					startDateTextBox.val(dateText);
				};
				$('#dp_start').datepicker('setEndDate', dateText);
				$('#dp_end').datepicker('hide');
			});
			$('#dp_modal').datepicker();
		}
	};
	
	//* bootstrap timepicker
	gebo_timepicker = {
		init: function() {
			$('#tp_1').timepicker({
				defaultTime: 'current',
				minuteStep: 10,
				disableFocus: true,
				template: 'modal',
				showMeridian: false
			});
			$('#tp_2').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});
			$('#tp_modal').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});
		}
	};
	
	//* enhanced select elements
	gebo_chosen = {
		init: function(){
			$(".chzn_a").chosen({
				allow_single_deselect: true
			});
		}
	};
	
	
	
	
	