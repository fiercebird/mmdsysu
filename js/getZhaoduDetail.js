$(document).ready(function(){
    $(".aZhaodu").live("click",function(){
        if($(".zhaodu").css("display") == "none")
        {
            $(this).data('zhaodu',$(this).html());
            $(this).html("关闭");
            //$(".zhaodu").html("加载中……");
            
            var lid = $(this).parent().parent().children(".lid").html().toString();
            var top = $(this).offset().top + 13 + "px";
            var left = $(this).offset().left - 720 + "px";
            $(".zhaodu").css("top", top)
            $(".zhaodu").css("left", left);
            var url = '?r=lamp/line&lid=' + lid;
            loadImage(url, imgLoaded);
            $(".zhaodu").show(100,function(){
                /*
                $.get("?r=lamp/line&lid=" + lid, "", function($data){
                    $(".zhaodu").html($data);
                }, "text")*/
            	 //$(".zhaodu").html("加载中……");
            	//$(".zhaodu").html("<img src='?r=lamp/line&lid=" + lid + "' />");
            }); 
            return false;
        }
        else
        {
        	$("#img2").css("display", 'none');
            $(this).html($(this).data('zhaodu'));
            $(".zhaodu").hide(100);
            $("#img1").css('display', 'block');
            return false;
        }
    });
});

function loadImage(url, callback) {
	var img = new Image();
	img.src = url;
	 if (img.complete) { // 如果图片已经存在于浏览器缓存，直接调用回调函数
        callback.call(img);
        return; // 直接返回，不用再处理onload事件
     }

     img.onload = function () { //图片下载完毕时异步调用callback函数。
        callback.call(img);//将回调函数的this替换为Image对象
     };
}
function imgLoaded() {
	$("#img1").css('display', 'none');
	//$("#img2").css("display", 'none');
	$("#img2").attr("src", this.src);
	$("#img2").show();
	//$('#img1').css("margin-left", 0);
}