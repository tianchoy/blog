/**
 * Created by tianchao on 16/4/3.
 */
$(document).ready(function(){
    $(".submit").click(function(){
        var user = $(".user").val();
        var content = $(".content").val();
        if( user == ''){
            $(".name-prompt").html("<a style='color:red'>您怎么称呼?</a>");
            return false;
        }else if(user.length > 20){
            $(".name-prompt").html("<a style='color:red'>您是俄罗斯人吗?名字这么长?</a>");
            return false;
        }else if(content == ''){
            $(".content-prompt").html("<a style='color:red'>您没有想跟我说的话吗?</a>");
            return false;
        }else if(content.length > 400){
            $(".content-prompt").html("<a style='color:red'>留言的内容不可超过200个字哦!</a>");
            return false;
        }
    });
});

