$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

function isInteger(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode < 48 || charCode > 57)
	return false;
	return true;
}  


function isDoubleRound(evt,ctrl,roundNo)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return false;

	//ctrl.value=(+ctrl.value).toFixed(roundNo);
	parts=ctrl.value.toString().split('.');
	if(parts.length ==1){
		
	}else{
		if(parts[1].length >= roundNo){
			return false;
		}
	}
	return true;
}   

function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return false;
	return true;
}  


function isNumericKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return true;
	return false;
} 


$(document).ready(function () {
	//Select2 Init
	$('.select2').select2();

	//Date time picker
	$('.date-time-field').each(function( index ) {
		var date = moment($(this).val(), 'YYYY-MM-DD HH:mm').toDate();
		$(this).datetimepicker({date:date , format: 'YYYY-MM-DD HH:mm'});
	});	
	$('.date-field').each(function( index ) {
		var date = moment($(this).val(), 'YYYY-MM-DD').toDate();
		$(this).datetimepicker({date:date , format: 'YYYY-MM-DD'});
	});

	$('.time-field').each(function( index ) {
		var date = moment($(this).val(), 'LT').toDate();
		$(this).datetimepicker({date:date , format: 'LT'});
	});

	$('.datetimepicker-input').attr('autocomplete', 'off');

	setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 3000);

});