$(document).ready(function(){
    $(".aRepair").live("click",function(){
        if($(".repair").css("display") == "none")
        {
            $(this).data('zhaodu',$(this).html());
            $(this).html("关闭");
            $(".repair").html("加载中……");
            var mid = $(this).parent().parent().children(".mid").html().toString();
            var top = $(this).offset().top + 13 + "px";
            var left = $(this).offset().left - 320 + "px";
            $(".repair").css("top", top)
            $(".repair").css("left", left);
            $(".repair").show(100,function(){
                $.get("?r=midControl/getRepairDetails&mid=" + mid, "", function(data){
                    var content = "";
                    $.each(data.res, function(index, item){
                        var num = index + 1;
                        content += num + ". " + item.details + "<br />";
                        content += "&nbsp;&nbsp;&nbsp;&nbsp;维修人： " + item.man + "<br />";
                        content += "&nbsp;&nbsp;&nbsp;&nbsp;花费： " + item.cost + "<br />";
                        content += "&nbsp;&nbsp;&nbsp;&nbsp;时间： " + item.time + "<br /><br />";
                    });
                    $(".repair").html(content);
                }, 'json')
            });
            return false;
        }
        else
        {
            $(this).html($(this).data('zhaodu'));
            $(".repair").hide(100);
            return false;
        }
    });
});