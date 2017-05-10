jQuery(document).ready(function(){
    jQuery('#datepicker').datepicker();

    jQuery('#date-range').datepicker({
        //toggleActive: true,
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });

    jQuery('#timepicker').timepicker({
        minuteStep: 1,
        template: 'modal',
        appendWidgetTo: 'body',
        showSeconds: false,
        showMeridian: false,
        defaultTime: false
    });

    jQuery('#touchspin').TouchSpin({
        initval: 40,
        buttondown_class: "btn btn-success",
        buttonup_class: "btn btn-success"
    });
});