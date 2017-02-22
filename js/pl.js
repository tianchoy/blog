/**
 * Created by tianchao on 16/4/3.
 */
$(document).ready(function(){
    $(".submit").click(function(){
        var user = $(".username").val();
        var content = $(".content").val();
        var reg = new RegExp("^[A-Za-z0-9]+$");

        if(user.match(/^\s+$/g)){
            $(".name-prompt").html("<a style='color:red'>用户名不可为全为空格！</a>");
            return false;
        }
        if(content.match(/^\s+$/g)){
            $(".content-prompt").html("<a style='color:red'>留言内容不可全为空格！</a>");
            return false;
        }
        if(reg.test(user)){
            $(".name-prompt").html("<a style='color:red'>用户名不可为数字或者字母</a>");
            return false;
        }
        if(reg.test(content)){
            $(".content-prompt").html("<a style='color:red'>留言内容天不可全为数字或者字母</a>");
            return false;
        }
        if(user == ''){
            $(".name-prompt").html("<a style='color:red'>您怎么称呼?</a>");
            return false;
        }else if(user.length < 2){
            $(".name-prompt").html("<a style='color:red'>姓名不可少于2个字</a>");
            return false;
        }else if(user.length > 20){
            $(".name-prompt").html("<a style='color:red'>您是俄罗斯人吗?名字这么长?</a>");
            return false;
        }else if(content == ''){
            $(".content-prompt").html("<a style='color:red'>您没有想跟我说的话吗?</a>");
            return false;
        }else if(content.length < 10){
            $(".content-prompt").html("<a style='color:red'>留言的内容不可少于10个字哦!</a>");
            return false;
        }
    });
});

