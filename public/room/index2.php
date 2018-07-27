<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>重邮查室友</title>
    <link rel="stylesheet" href="room/search.css">
    <meta name="description" content="重庆邮电大学2018级本科新生室友查询，给你未来的室友说句话吧~~">
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
            <div class="name"><input type="text" placeholder="请输入你的姓名" onfocus="this.placeholder=''" onblur="this.placeholder='请输入你的姓名'" name="name"></div>
            <div class="num"><input type="text" placeholder="请输入你的学号(10位)" onfocus="this.placeholder=''" onblur="this.placeholder='请输入你的学号(10位)'" name="num"></div>
            <div class="card-bottom">
                <button type="button">查询</button>
            </div>
        </form>
        <div class="result result-display">
            <div class="result-detail">
                <div class="result-title2">
                    <div class="result-img2"></div>
                    <div class="result-title-p2">
                        <span id="yuan">....苑</span>
                        <span id="she">.舍</span>
                        <span id="hao">...</span>
                    </div>
                </div>
                <div class="result-people">
                    <div class="xxx">
                        <div class="xxx-name"><span>.......</span></div>
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
                        <input id="stu-content" placeholder="输入留言"><span>发送</span>
                    </div>
                </div>
                <div class="message-detail">
                    <div class="message1">
                        <div class="word">
                            <div class="word1">
                                <p>...</p>
                            </div>
                            <div class="word2">
                                <p>——..... ...-... ...:...</p>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "<?php echo csrf_token()?>"
        }
    });
</script>
<script src="room/search.js"></script>
</body>
</html>
