$(document).ready(function(){
    $("#btnSubmit").click(function(){
        var dev = $("#deviceName").find('option:selected');
        var cam = $("#campusName").find('option:selected');
        var rea = $("#reason").find('option:selected');
        if (cam.val() == 0)
        {
            alert("请选择校区！");
            return false;
        }
        if (dev.val() == 0)
        {
            alert("请选择设备！");
            return false;
        }

        if (rea.val() == 0)
        {
            alert("请选择提醒原因！");
            return false;
        }
        
        $("#alert-form").submit();
    });
    $("#btnRepairSubmit").click(function(){
        var dev = $("#deviceName").find('option:selected');
        var cam = $("#campusName").find('option:selected');
        if (cam.val() == 0)
        {
            alert("请选择校区！");
            return false;
        }
        if (dev.val() == 0)
        {
            alert("请选择设备！");
            return false;
        }
        
        $("#repair-form").submit();
    });
    $("#btnAddSubmit").click(function(){
        var dev = $("#addDeviceName").find('option:selected');
        var cla = $("#classId").find('option:selected');
        if (cla.length == 0 || cla.val() == 0)
        {
            alert("请选择课室！");
            return false;
        }
        if (dev.val() == 0)
        {
            alert("请选择设备！");
            return false;
        }
        if($("#details").val().length == 0)
        {
            alert("请输入详情！");
            return false;
        }
        if($("#man").val().length == 0)
        {
            alert("请输入维修人！");
            return false;
        }
        if($("#cost").val().length == 0)
        {
            alert("请输入花费！");
            return false;
        }
        $(this).attr('disabled', 'disabled');
        $(this).attr('value', '登记中…');
        $.get("?r=device/addRepair",{ classId: cla.val(), device: dev.val(), details: $("#details").val(), man: $("#man").val(), cost: $("#cost").val() }, function(data) {
            alert(data);
            $(this).removeAttr('disabled');
            $(this).attr('value', '登记');
          }, 'text');
        
    });
});


