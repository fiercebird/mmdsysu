
jQuery(document).ready(function(){
    setSize()
    tick();
    jQuery(window).resize(function(){
        setSize()
    });
});

function setSize(){
    var h = jQuery(window).height() - 103 + "px";
    var w = jQuery(window).width() - 169 + "px";
    jQuery("#midDiv").css("height", h);
    jQuery("#mainContent").css("width", w);
    jQuery("#mainFrame").css("height", h);
    jQuery("#mainFrame").css("width", w);
};

function tick() {
    var hours, minutes, seconds;
    var intHours, intMinutes, intSeconds;
    var today;
    today = new Date();
    intYear = today.getFullYear();
    intMonth = today.getMonth() + 1;
    intDay = today.getDate();
    intHours = today.getHours();
    intMinutes = today.getMinutes();
    intSeconds = today.getSeconds();

    if (intHours == 0) {
        hours = "00:";
    } else if (intHours < 10) {
        hours = "0" + intHours + ":";
    } else {
        hours = intHours + ":";
    }

    if (intMinutes < 10) {
        minutes = "0" + intMinutes + ":";
    } else {
        minutes = intMinutes + ":";
    }
    if (intSeconds < 10) {
        seconds = "0" + intSeconds + " ";
    } else {
        seconds = intSeconds + " ";
    }
    timeString = intYear + "年" + intMonth + "月" + intDay + "日" + " " + hours + minutes + seconds;
    Clock.innerHTML = timeString;
    window.setTimeout("tick();", 1000);
};