<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once "sdk/jssdk.php";
$jssdk = new JSSDK("", "");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<title>无标题文档</title>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
    debug: true,// 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
	 'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
	] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});

wx.ready(function(){
    var btn=document.getElementById("getphone");
	btn.onclick=function(){
		wx.chooseImage ({
            success : function(res){
                var localIds = res.localIds; 
                // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
            }
        });
	}
	
	
	wx.onMenuShareAppMessage({
	    title: 'zz-1609分享好友', // 分享标题
	    desc: '这是我的第一个温馨分享好友', // 分享描述
	    link: 'www.baidu.com', // 分享链接
	    imgUrl: 'http://cdnq.duitang.com/uploads/item/201501/26/20150126083010_zxfaN.jpeg ', // 分享图标
	    type: '', // 分享类型,music、video或link，不填默认为link
	    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	        alert('中国第一美女，鬼才信呢！')
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});
	
})



</script>
</head>

<body>
<button id="getphone">拍照</button>
</body>
</html>
