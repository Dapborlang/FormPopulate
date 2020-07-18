$( document ).ready(function() {

	$("#obj_head").change(function()
    {
      $.ajax({
        url: "../schemeCode/"+this.value,
        type: 'GET',
        data: {
        },
        success: function(data)
        {
        	var i;
	        var html='<option value="">--SELECT SCHEME CODE--</option>';
	        for(i=0;i<data.length;i++)
	        {
	            html+='<option value="'+data[i].scheme_code+'">'+data[i].scheme_code+'-'+data[i].scheme_name+'</option>';
	        }
	        $("#scheme_code").html(html);
        }
      });

      $.ajax({
        url: "../billType/"+this.value,
        type: 'GET',
        data: {
        },
        success: function(data)
        {
            var i;
            var html='<option value="">--SELECT BILL TYPE--</option>';
            for(i=0;i<data.length;i++)
            {
                html+='<option value="'+data[i].bill_type+'">'+data[i].bill_type+'-'+data[i].bill_desc+'</option>';
            }
            $("#bill_type").html(html);
        }
      });
    });

    $("#obj_head1").change(function()
    {
      $.ajax({
        url: "../../schemeCode/"+this.value,
        type: 'GET',
        data: {
        },
        success: function(data)
        {
            var i;
            var html='<option value="">--SELECT SCHEME CODE--</option>';
            for(i=0;i<data.length;i++)
            {
                html+='<option value="'+data[i].scheme_code+'">'+data[i].scheme_code+'-'+data[i].scheme_name+'</option>';
            }
            $("#scheme_code").html(html);
        }
      });
    });


    $(".date").datepicker(
        {
        changeMonth:true,
                changeYear:true,
                dateFormat: 'yy-mm-dd',
                maxDate:'0'
    });

    $(".monthPicker").datepicker({
        dateFormat: 'yy-mm',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
        }
    });

    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
    
});
