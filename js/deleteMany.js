$(document).ready(function(){
   $("#submitBtn").click(function(){
       var dev = $("#deviceName").find('option:selected');
       var cam = $("#campusName").find('option:selected');
       var bul = $("#buildingName").find('option:selected');
       if(cam.val() == 0)
       {
           alert("请选择校区！");
           return false;
       }
       if(bul.val() == 0)
       {
           alert("请选择教学楼！");
           return false;
       }
       if(confirm("确定删除“"+cam.html()+bul.html()+"”的数据吗？删除后不可还原！"))
       {
           $(this).attr("disabled","disabled");
           $.post("?r=device/ajaxDeleteMany",{deviceName:dev.val(), campusName:cam.val(), buildingName:bul.val()},function(data){
               alert(data.toString());
               window.location.reload();
           },"text");
       }
       else
          return false;
   });
});
