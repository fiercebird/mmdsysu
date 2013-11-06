/*时钟+下面部分的高度*/
function tick() {
    /*下面部分的高度，等于body-top的高度*/
    var h = (document.body.offsetHeight-document.getElementById("top").offsetHeight) + "px";
    document.getElementById("left").style.height = h;
    
    /*时钟*/
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
}
window.onload = tick;

/*收缩侧边栏*/
function switchSysBar() {
    var getObj=document.getElementById('frmTitle');
    var attr;
    if(document.all)//如果为IE浏览器
    {
        attr = getObj.currentStyle.display;
    }
    else if(window.getComputedStyle)//如果为FF或者其他浏览器
    {
        attr = window.getComputedStyle(getObj,null).display;
    }
            
    if (attr == "block" || attr == "table-cell") {
            	
        document.getElementById('frmTitle').style.display = "none";
    }
    else {
        document.getElementById('frmTitle').style.display = "";
    }
} 

/*左边导航栏初始化*/
ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
