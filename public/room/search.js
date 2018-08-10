$(document).ready(function () {
    document.querySelector('html').style.fontSize = window.innerWidth / 10.80 + 'px';
});

$(window).resize(function () {
    document.querySelector('html').style.fontSize = window.innerWidth / 10.80 + 'px';
});

let stu_name, stu_num;
let peopleGen = function (name) {
    let peopleTemplate = "                    <div class=\"xxx\">\n" +
        "                        <div class=\"xxx-name\"><span>" + name + "</span></div>\n" +
        "                        <div class=\"bo\"></div>\n" +
        "                    </div>";
    $(".result-people").append(peopleTemplate);
};

let commentGen = function (name, date, content) {
    let commentTemplate = "                    <div class=\"message1\">\n" +
        "                        <div class=\"word\">\n" +
        "                            <div class=\"word1\">\n" +
        "                                <p>" + content + "</p>\n" +
        "                            </div>\n" +
        "                            <div class=\"word2\">\n" +
        "                                <p>——" + name + " " + date + "</p>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                        <div class=\"bo-b\"></div>\n" +
        "                    </div>";
    $(".message-detail").prepend(commentTemplate);
};

function isValidNum(str) {
    let match = /^[0-9]+.?[0-9]*$/;
    return (str.length === 10 && match.test(str));
}

function isVaildName(str) {
    let match = /^[\u4e00-\u9fa5]+.?[\u4e00-\u9fa5]*$/;
    return (str.length <= 10 && match.test(str));
}

$(".card-bottom button").click(function () {
    stu_name = $(".name input").val();
    stu_num = $(".num input").val();
    if (stu_num && stu_name) {
        if (isVaildName(stu_name) && isValidNum(stu_num)) {
            $.ajax({
                url: "/action/info_submit",
                type: "post",
                dataType: "json",
                data: {"name": stu_name, "num": stu_num},
                success: function (data) {
                    document.querySelector(".result-people").innerHTML = "";
                    document.querySelector(".message-detail").innerHTML = "";
                    let patternArea = new RegExp("[\u4e00-\u9fa5]{3}");
                    let patternBuilding = new RegExp("[0-9]+[\u4e00-\u9fa5]{1}");
                    let patternDorm = new RegExp("[0-9]{3}-*[0-9]*");
                    $("#yuan").html(patternArea.exec(data.room));
                    $("#she").html(patternBuilding.exec(data.room));
                    $("#hao").html(patternDorm.exec(data.room));
                    if (data.status) {
                        $('.card-display').hide(function () {
                            $('#main').css({'height': 'auto'});
                            return 1000;
                        });
                        $('.result-display').show(1000);
                        $('#qq').html(data.qq);
                        let dataObj1 = eval(data.roommate);
                        $.each(dataObj1, function (index, obj) {
                            peopleGen(obj);
                        });
                        let dataObj2 = eval(data.comment);
                        if (data.count)
                            $.each(dataObj2, function (index, obj) {
                                commentGen(obj['name'], obj['date'], obj['content']);
                            });
                        else
                            $('.kong').show(600);
                    }
                    else {
                        alert("没有找到数据，请检查您的输入是否正确")
                    }
                },
                error: function (data) {
                    console.log(data);
                    alert("连接失败");
                }
            })
        }
        else {
            alert("请正确输入学号和姓名");
        }
    } else {
        alert("请输入信息");
    }
});

//留言提交
//日期格式化
function format(Date) {
    var Y = Date.getFullYear();
    var M = Date.getMonth() + 1;
    M = M < 10 ? '0' + M : M;// 不够两位补充0
    var D = Date.getDate();
    D = D < 10 ? '0' + D : D;
    var H = Date.getHours();
    H = H < 10 ? '0' + H : H;
    var Mi = Date.getMinutes();
    Mi = Mi < 10 ? '0' + Mi : Mi;
    var S = Date.getSeconds();
    S = S < 10 ? '0' + S : S;
    return Y + '-' + M + '-' + D + ' ' + H + ':' + Mi + ':' + S;
}

$(".send span").click(function () {
    let stu_content = $("#stu-content").val();
    if (stu_content)
        $.ajax({
            url: "/action/comment_submit",
            type: "post",
            dataType: "json",
            data: {"name": stu_name, "num": stu_num, "content": stu_content},
            success: function (data) {
                if (data.status === true) {
                    let data = new Date();
                    commentGen(stu_name, format(data), stu_content)
                } else {
                    alert("留言失败，卒")
                }
            },
            error: function (data) {
                console.log(data);
                alert("连接服务器错误")
            }
        });
    else
        alert("请输入留言内容");
});
