<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>网页弹出广告窗口 boaer.com</title>
<<<<<<< HEAD
        <!-- this is a comment comment two comment three -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"> </script>
=======
>>>>>>> 2dcf8172e9e77ea22fc9cfab6cbb120b6fbdad7a
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            .floadAd {
                position: absolute;
                z-index: 999900;
                display: none;
            }
            .floadAd .item {
                display: block;
            }
            .floadAd .item img {
                vertical-align: bottom;
            }/* a img 的组合浏览器默认下边会有几个像素的空白，这里可以消除空白*/
        </style>
    </head>
    <body>
        <div id="floadAD" class="floadAd"> 
            <a class="close" href="javascript:void();" style="color: red">×关闭</a> 
            <a class="item" title='首届党建文化节' href="https://fanyi.baidu.com/#en/zh/liberal%20art" target="_blank"> 
            <img src="logo1.png" alt="首届党建文化节" /></a> 
        </div> 
        <div>
            test test
            
        </div>  
    </body>
    <script>
        FloatAd("#floadAD");
        function FloatAd(selector) {
            var obj = $(selector);
            if (obj.find(".item").length == 0)
                return;//如果没有内容，不执行 
            var windowHeight = $(window).height();//浏览器高度 
            var windowWidth = $(window).width();//浏览器宽度 
            var dirX = -1.5;//每次水平漂浮方向及距离(单位：px)，正数向右，负数向左，如果越大的话就会看起来越不流畅，但在某些需求下你可能会需要这种效果 
            var dirY = -1;//每次垂直漂浮方向及距离(单位：px)，正数向下，负数向上，如果越大的话就会看起来越不流畅，但在某些需求下你可能会需要这种效果 

            var delay = 30;//定期执行的时间间隔，单位毫秒 
            obj.css({left: windowWidth / 2 - obj.width() / 2 + "px", top: windowHeight / 2 - obj.height() / 2 + "px"});//把元素设置成在页面中间 
            obj.show();//元素默认是隐藏的，避免上一句代码改变位置视觉突兀，改变位置后再显示出来 
            var handler = setInterval(move, delay);//定期执行，返回一个值，这个值可以用来取消定期执行 

            obj.hover(function () {//鼠标经过时暂停，离开时继续 
                clearInterval(handler);//取消定期执行 
            }, function () {
                handler = setInterval(move, delay);
            });

            obj.find(".close").click(function () {//绑定关闭按钮事件 
                close();
            });
            $(window).resize(function () {//当改变窗口大小时，重新获取浏览器大小，以保证不会过界（飘出浏览器可视范围）或漂的范围小于新的大小 
                windowHeight = $(window).height();//浏览器高度 
                windowWidth = $(window).width();//浏览器宽度 
            });
            function move() {//定期执行的函数，使元素移动 
                var currentPos = obj.position();//获取当前位置，这是JQuery的函数，具体见：http://hemin.cn/jq/position.html 
                var nextPosX = currentPos.left + dirX;//下一个水平位置 
                var nextPosY = currentPos.top + dirY;//下一个垂直位置 

                if (nextPosX >= windowWidth - obj.width()) {//这一段是本站特有的需求，当漂浮到右边时关闭漂浮窗口，如不需要可删除 
                    close();
                }

                if (nextPosX <= 0 || nextPosX >= windowWidth - obj.width()) {//如果达到左边，或者达到右边，则改变为相反方向 
                    dirX = dirX * -1;//改变方向 
                    nextPosX = currentPos.left + dirX;//为了不过界，重新获取下一个位置 
                }
                if (nextPosY <= 0 || nextPosY >= windowHeight - obj.height() - 5) {//如果达到上边，或者达到下边，则改变为相反方向。             
                    dirY = dirY * -1;//改变方向 
                    nextPosY = currentPos.top + dirY;//为了不过界，重新获取下一个位置 
                }
                obj.css({left: nextPosX + "px", top: nextPosY + "px"});//移动到下一个位置 
            }

            function close() {//停止漂浮，并销毁漂浮窗口 
                clearInterval(handler);
                obj.remove();
            }
        }

    </script>
</html>