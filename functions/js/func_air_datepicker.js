//based on http://t1m0n.name/air-datepicker/docs/

// Make Sunday disabled 
$(function() {
    
    var disabledDays = [0];   //0 = Sunday
   

    //input id date
    $('#date').datepicker({   
        language: 'en',
        dateFormat: 'dd/mm/yyyy',
        firstDay: 1,          //change the first date for Monday
        minDate: new Date(),  // minDate = today 
        onRenderCell: function (date, cellType) {
            if (cellType == 'day') {
                var day = date.getDay(),
                    isDisabled = disabledDays.indexOf(day) != -1;   //disable sunday

                return {
                    disabled: isDisabled
                }
            }
        }
    });
});