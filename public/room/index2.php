<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查室友</title>
    <link rel="stylesheet" href="room/search.css">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="container">
    <div id="header">
        <div class="du">
            <div class="loge">
                <img src="/room/img/logo.png">
            </div>
        </div>
        <div class="du">
            <div class="head-title">
                <img src="/room/img/title.png">
            </div>
        </div>
    </div>
    <div id="main">
        <form class="card card-display">
            <?php echo csrf_field(); ?>
            <div class="name"><input type="text" value="请输入你的姓名" onclick="this.value=''" name="name"></div>
            <div class="num"><input type="text" value="请输入你的学号" onclick="this.value=''" name="num"></div>
            <div class="card-bottom">
                <button type="button">查询</button>
            </div>
        </form>
        <div class="result result-display">
            <div class="result-detail">
                <div class="result-title2">
                    <div class="result-img2"></div>
                    <div class="result-title-p2">
                        <span id="yuan">知行苑</span>
                        <span id="she">6舍</span>
                        <span id="hao">123</span>
                    </div>
                </div>
                <div class="result-people">
                    <div class="xxx">
                        <div class="xxx-name"><span>哈</span></div>
                        <div class="bo"></div>
                    </div>
                    <div class="xxx">
                        <div class="xxx-name"><span>哈哈</span></div>
                        <div class="bo"></div>
                    </div>
                    <div class="xxx">
                        <div class="xxx-name"><span>哈哈哈</span></div>
                        <div class="bo"></div>
                    </div>
                    <div class="xxx">
                        <div class="xxx-name"><span>哈哈哈哈</span></div>
                        <div class="bo"></div>
                    </div>
                </div>
            </div>
            <div class="message">
                <div class="result-title2">
                    <div class="result-img2"></div>
                    <div class="result-title-p2">
                        <span>宿舍留言板</span>
                    </div>
                    <div class="send">
                        <p>给室友留言 | 发送</p>
                    </div>
                </div>

                <div class="message-detail">
                    <div class="message1">
                        <div class="word">
                            <div class="word1">
                                <p>
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊！
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊
                                </p>
                            </div>
                            <div class="word2">
                                <p>——木子清 7-29 22:40</p>
                            </div>
                        </div>
                        <div class="bo-b"></div>
                    </div>
                    <div class="message1">
                        <div class="word">
                            <div class="word1">
                                <p>
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊！
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊
                                </p>
                            </div>
                            <div class="word2">
                                <p>——木子清 7-29 22:40</p>
                            </div>
                        </div>
                        <div class="bo-b"></div>
                    </div>
                    <div class="message1">
                        <div class="word">
                            <div class="word1">
                                <p>
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊！
                                    你们好，我的QQ号是15742436843，看到请加我一起玩啊
                                </p>
                            </div>
                            <div class="word2">
                                <p>——木子清 7-29 22:40</p>
                            </div>
                        </div>
                        <div class="bo-b"></div>
                    </div>
                </div>

                <!-- 没有留言 -->
                <div class="kong"></div>
                <!-- 展示留言 -->
                <div class="show-word"></div>


            </div>
        </div>
    </div>

    <div id="footer">
        <div class="hot-link">
            <div class="link1">
                <div class="link-p"><p><a href="">猜猜啊</a></p></div>
                <div class="link-color1">
                    <p>去参加</p>
                </div>
            </div>
            <div class="link2">
                <div class="link-p"><p><a href="">xxxxx</a></p></div>
                <div class="link-color2">
                    <p>去参加</p>
                </div>
            </div>
        </div>
        <div class="footer-zi">
            <div class="p-left"><p>©本功能由 <span>重邮e站</span> 提供技术支持</p></div>
            <div class="p-right"><p>合作伙伴：</p></div>
            <div class="p-img"></div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://vuejs.org/js/vue.js"></script>
<script src="room/search.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "<?php echo csrf_token()?>"
        }
    });
    //提交查室友数据
    let peopleGen=function(name){
        let peopleTemplate="                    <div class=\"xxx\">\n" +
            "                        <div class=\"xxx-name\"><span>"+name+"</span></div>\n" +
            "                        <div class=\"bo\"></div>\n" +
            "                    </div>";
        $(".result-people").append(peopleTemplate);
    };
    let commentGen=function(name,date,content){
        let commentTemplate="                    <div class=\"message1\">\n" +
            "                        <div class=\"word\">\n" +
            "                            <div class=\"word1\">\n" +
            "                                <p>"+content+"</p>\n" +
            "                            </div>\n" +
            "                            <div class=\"word2\">\n" +
            "                                <p>——"+name+" "+date+"</p>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                        <div class=\"bo-b\"></div>\n" +
            "                    </div>";
        $(".message-detail").append(commentTemplate);
    };
    $(".card-bottom button").click(function () {
        $.ajax({
            url: "/action/info_submit",
            type: "post",
            dataType: "json",
            data: {"name": $(".name input").val(), num: $(".num input").val()},
            success: function (data) {
                document.querySelector(".result-people").innerHTML="";
                document.querySelector(".message-detail").innerHTML="";
                if (data.status) {
                    let dataObj1 = eval(data.roommate);
                    $.each(dataObj1, function (index,obj) {
                        peopleGen(obj['name']);
                    });
                    let dataObj2 = eval(data.comment);
                    $.each(dataObj2, function (index,obj) {
                        commentGen(obj['name'],obj['date'],obj['content']);
                    })
                }
                else{
                    alert("没有找到数据，请检查您的输入是否正确")
                }
            },
            error:function () {
                alert("连接失败");
            }
        })
    });
</script>
</body>
</html>
