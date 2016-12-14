
$(document).ready(function(){
    $(".submit").click(function(){
        var user = $(".username").val();
        var content = $(".content").val();
        if( user == ''){
            alert('你怎么称呼?');
            return false;
        }else if(user.length > 20){
            alert('你是俄罗斯人吗?名字这么长?');
            return false;
        }else if(content == ''){
            alert('随便说点');
            return false;
        }else if(content.length > 200){
            alert('评论的内容不可超过200个字!');
            return false;
        }
    });

    //404
    var check = $(".blog-title").text();
    if(check == ''){
        window.location.href='404.php';
    }
});