<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8"></meta>

        <title>高齡研究基地</title>

    </head>
    <body>

        <h1>高齡研究基地</h1>
        <ul>
            <a href="#"><li>最新消息</li></a>
            <a href="#"><li>關於中心</li></a>
            <a href="#"><li>產學合作</li></a>
            <a href="#"><li>人才培育</li></a>
            <a href="#"><li>國際交流</li></a>
            <a href="#"><li>學術研究</li></a>
            <a href="#"><li>生活實驗室</li></a>
            <a href="#"><li>文件下載</li></a>
         </ul>

         <input type="text"  placeholder="請輸入關鍵字">
         <button >搜尋</button>

        <li> <a href="#" title="中文/EN">中文/EN</a></li>

        <ul>
            <li><a  href="" title="中心成員">中心成員</a></li>
            <li><a  href="" title="教職員工">教職員工</a></li>
            <li><a  href="" title="一般民眾">一般民眾</a></li>
            <li><a  href="" title="企業人士">企業人士</a></li>
        </ul>


        <img class="mySlides" src="{{ URL::asset('images/img_lights.jpg') }}">
        <img class="mySlides" src="{{ URL::asset('images/img_mountains.jpg') }}">
        <img class="mySlides" src="{{ URL::asset('images/img_forest.jpg') }}">
        <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="display-right" onclick="plusDivs(+1)">&#10095;</button>

        <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n)
        {
            showDivs(slideIndex += n);
         }

        function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length} ;
        for (i = 0; i < x.length; i++)
        {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
        }

        </script>

        <h2>
            友站連結
        </h2>

        <li><a  href="http://www.iog.ncku.edu.tw/main.php">成大老年所</a></li>
        <li><a  href="http://www.tzuchi.com.tw/">慈濟醫院</a></li>
        <li><a  href="http://www.gaim.cyut.edu.tw/">朝陽銀髮管理系</a></li>

        <h2>
            中心新聞
        </h2>

        <li> 2019/09/20　<a href="#">【09月26日】第三季社區生活實驗室聯繫會議</a></li>
        <li> 2019/09/16　<a href="#">【10月18日】中正大學樂齡食農講師第三期</a></li>
        <li> 2019/09/04　<a href="#">【09月20日】中正社企【社區人才培育課程】招生</a></li>

        <p>62102 嘉義縣民雄大學路一段168號 創新大樓(管理學院)487室<br>聯絡信箱:deptagei@ccu.edu.tw <br>電話：05-2720411#24027(總機)或撥專線05-2729065</p>

    </body>
</html>
