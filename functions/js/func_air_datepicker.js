//based on http://t1m0n.name/air-datepicker/docs/

$(function() {
    // Make Sunday disabled
    var disabledDays = [0];   //0 = Sunday

    //input id date
    $('#date').datepicker({   
        language: 'en',
        dateFormat: 'dd/mm/yyyy',
        firstDay: 1,          //change the first date for Monday
        minDate: new Date(), // minDate = today - Now can select only dates, which goes after today
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