	var tianchao = {
		face:function(_this){
			var target = $(_this).html();
			if(target.length < 5){
				$(_this).html("<img src='../images/face/"+target+".gif' />")
			}
		},
		faceimg:'',
		imgs:function(min,max){
			for(i=min;i<max;i++){  //通过循环创建60个表情，可扩展
        		tianchao.faceimg+='<li><a href="javascript:void(0)"><img src="../images/face/'+(i+1)+'.gif" face="<emt>'+(i+1)+'</emt>"/></a></li>';
    		};
		},
		cur:0
	}
	$('.list li emt').each(function(){
		tianchao.face(this);
	});
	$('.send a.btn').on('click',function(){
		var content = $('.send textarea').val();
        $('.list').append("<li>"+content+"</li>");
		var s = $('.send textarea').val('');
		$('.list emt').each(function(){
			var target = $(this).html();
			if(target.length < 5){
				$(this).html("<img src='../images/face/"+target+".gif' />")
			}
		});
	});
	$('.send .faces').on('click',function(){
		if(tianchao.cur == 0){
			$(this).addClass('on');
			tianchao.cur =1;
			$('.face').show(0);
		}else if(tianchao.cur == 1){
			$(this).removeClass('on');
			$('.face').hide(0);
			tianchao.cur =0;
		}
	})
    tianchao.imgs(0,60);
    $('.face').append(tianchao.faceimg);
    $('.face li img').on('click',function(){
		var target = $(this).attr('face');
		var htmls = $('.send textarea').val();
		$('.send textarea').val(htmls+target);
		$(this).parents('.face').hide(0);
		$('.send .faces').removeClass('on');
		tianchao.cur =0;
	});
$(".donate a").click(function(){
    $(".donate img").slideToggle();
});
function b(){
	h = 50;
	t = $(document).scrollTop();
	if(t > h){
		$(".blog-side").css("position","fixed");
		$(".blog-side").css("top","0");
		$(".blog-side").css("margin-left","830px");
	}else{
		$(".blog-side").css("position","absolute");
		$(".blog-side").css("top","50px");
		$(".blog-side").css("margin-left","830px");
	}
}
$(window).scroll(function(e){
	b();
})
//隐藏留言未回复

    $('.lgi').find('.re_con').each(function(){
        if($(this).text() == ''){
            $(this).parent('.ly_reply').css('display','none');
        }else{
            $(this).parent('.ly_reply').css('display','block');
        }
    });