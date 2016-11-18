var 
	oLoading = $('.loading'),
	oUser    = $('.loading-wrap .user');

setTimeout(function(){
	oLoading.css({display:'none'})
},2000)

window.onload=function(){
	oUser.css({transform: 'rotate(500deg)'})
}

/*sWiper动画*/
setTimeout(function(){
	var mySwiper = new Swiper ('.swiper-container', {
	    direction: 'vertical',
	    onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
	                swiperAnimateCache(swiper); //隐藏动画元素
	                swiperAnimate(swiper); //初始化完成开始动画
	            },
	    onSlideChangeEnd: function(swiper){
	                swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
	    }
  	}) 
},1000)
