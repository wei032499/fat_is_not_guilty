<?php
session_start();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>胖不是罪 甜點專賣網</title>
    <link rel="shortcut icon" href="images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!--additional method - for checkbox .. ,require_from_group method ...-->
    <script src="//jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <!--中文錯誤訊息-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    <script src="js/check.js"></script>
    <style type="text/css">
    .error {
        color: red !important;
        font-weight: normal;
        font-family: "微軟正黑體";
        display: inline;
        padding: 1px;
    }
    </style>
    <style type="text/css">
    #gotop {
        position: fixed;
        border-radius: 50px;
        right: 20px;
        bottom: 30px;
        padding: 5px;
        font-size: 25px;
        background: rgba(0, 0, 0, 0.36);
        color: #FAFCFD;
        cursor: pointer;
        z-index: 1000;
        width: 50px;
        height: 50px;
        text-align: center;
    }

    #cart {
        border-radius: 5px;
        font-size: 10px;
        background: rgba(255, 0, 0, 0.9);
        color: #FAFCFD;
        width: 20px;
        height: 20px;
        text-align: center;
    }

    .ftco-navbar-light {
        background: transparent !important;
        position: absolute;
    }
    </style>
    <script type="text/javascript">
    var xmlHttp;

    function sendRequest() {
        if (window.XMLHttpRequest) xmlHttp = new XMLHttpRequest(); //建立XMLHttpRequest物件
        else if (window.ActiveXObject) xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        var url = 'register.php?account=' + document.form1.account.value;
        xmlHttp.open('GET', url, true); //建立XMLHttpRequest連線要求
        xmlHttp.onreadystatechange = catchResult; //指定處理程式
        xmlHttp.send(null);
    }

    function catchResult() {
        if (xmlHttp.readyState == 4 || xmlHttp.readyState == 'complete') { //取得XMLHttpRequest物件的狀態值,4--動作完成
            if (xmlHttp.status == 200) { //執行狀態：200：OK 、403：Forbidden 、404：Not Found.......
                var str = xmlHttp.responseText; //接收以文字方式傳回的執行結果
                if (str == '1')
                {
                     document.getElementById('show_msg').innerHTML = '此帳號已存在!';
                     document.getElementById('same').value="";
                }
                else
                {
                    document.getElementById('show_msg').innerHTML = '';
                    document.getElementById('same').value="0";
                }
            } else {
                alert('執行錯誤,代碼:' + xmlHttp.status + '\(' + xmlHttp.statusText + '\)');
            }
        }
    }
    </script>
</head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <?php include("navbar.php"); ?>
    <!-- END nav -->
    <section class="ftco-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center ftco-vh-100">
                <div class="col-md-12">
                    <h1 class="ftco-heading ftco-animate mb-3">胖不是罪</h1>
                    <h2 class="h5 ftco-subheading mb-5 ftco-animate">精緻、用心、美味 甜點專賣網</h2>
                    <p><a href="" target="_blank" class="btn btn-outline-white btn-lg ftco-animate" data-toggle="modal" data-target="#login">會員登入</a> <a href="" target="_blank" class="btn btn-outline-white btn-lg ftco-animate" data-toggle="modal" data-target="#Create">加入會員</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="ftco-section bg-light" id="section-offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 ftco-animate">
                    <h4 class="ftco-sub-title">Featured Today</h4>
                    <h2 class="display-4"><!--Offers &amp; -->本日精選</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">為您挑選「最適合今天」的精緻美味甜點</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel ftco-owl">
                        <?php
                            $link = mysqli_connect('localhost', 'root', 'root123456', 'group_15');
                            mysqli_query($link, 'SET CHARACTER SET utf8');
                            mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
                            if (!$link) {
                                echo "連結錯誤代碼: " . mysqli_connect_errno() . "<br>"; //顯示錯誤代碼
                                echo "連結錯誤訊息: " . mysqli_connect_error() . "<br>"; //顯示錯誤訊息
                                exit();
                            }
                            $result = mysqli_query($link, "SELECT * FROM products");
                                for ($i=0; $i < 6 ; $i++) {
                                    echo "<div class=\"item\">";



                                            $row = mysqli_fetch_assoc($result);
                                            if(!is_null($row))
                                            {
                                                echo "<div class=\"media d-block mb-4 text-center ftco-media ftco-animate border-0\">";
                                                echo "<img class=\"mr-3\" src=\"images/products/".$row["image_name"]."\" height=\"400px\">";
                                                echo "<div class=\"media-body p-4\">";
                                                echo "<h5 class=\"text-primary\">$".$row["price"]."</h5>";
                                                echo "<h5 class=\"mt-0 h4\">".$row["name"]."</h5>";
                                                echo "<p class=\"mb-4\">".$row["description"]."</p>";
                                                echo "<p class=\"mb-0\"><a href=\"cart.php?id=" .$row["id"]. "\" class=\"btn btn-primary btn-sm\">馬上訂購</a></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }

                                    echo "</div>";
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="ftco-section" id="section-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 ftco-animate">
                    <h4 class="ftco-sub-title">products</h4>
                    <h2 class="display-4"><a href="products.php"  style="color: black">商品專區</a></h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">本店提供各類甜點，無論是蛋糕、鬆餅、或是小甜食，所有您想吃的都在這裡。
                                <br/>保證能滿足您挑剔的味蕾。</p>
                        </div>
                    </div>
                    <a href="products.php">查看更多 More...</a>
                </div>
                <div class="col-md-12 text-center">
                    <ul class="nav ftco-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <li class="nav-item ftco-animate">
                            <a class="nav-link active" id="pills-breakfast-tab" data-toggle="pill" href="#pills-breakfast" role="tab" aria-controls="pills-breakfast" aria-selected="true">蛋糕</a>
                        </li>
                        <li class="nav-item ftco-animate">
                            <a class="nav-link" id="pills-lunch-tab" data-toggle="pill" href="#pills-lunch" role="tab" aria-controls="pills-lunch" aria-selected="false">泡芙</a>
                        </li>
                        <li class="nav-item ftco-animate">
                            <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">鬆餅</a>
                        </li>
                    </ul>
                    <div class="tab-content text-left">
                        <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                            <div class="row">
                                <?php

$link = mysqli_connect('localhost', 'root', 'root123456', 'group_15');
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (!$link) {
    echo "連結錯誤代碼: " . mysqli_connect_errno() . "<br>"; //顯示錯誤代碼
    echo "連結錯誤訊息: " . mysqli_connect_error() . "<br>"; //顯示錯誤訊息
    exit();
}
$result = mysqli_query($link, "SELECT * FROM products");
                                for ($i=0; $i < 2 ; $i++) {
                                    echo "<div class=\"col-md-6 ftco-animate\">";


                                        for ($j=0; $j < 3 ; $j++) {
                                            $row = mysqli_fetch_assoc($result);
                                            if(!is_null($row))
                                            {
                                                echo "<div class=\"media menu-item\">";
                                                echo "<img class=\"mr-3\" src=\"images/products/".$row["image_name"]."\" class=\"img-fluid\">";
                                                echo "<div class=\"media-body\">";
                                                echo "<h5 class=\"mt-0\">".$row["name"]."</h5>";
                                                echo "<p>".$row["description"]."</p>";
                                                echo "<h6 class=\"text-primary menu-price\">$".$row["price"]."</h6>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                    }
                                    echo "</div>";
                                }


?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-lunch" role="tabpanel" aria-labelledby="pills-lunch-tab">
                            <div class="row">
                                <?php

$link = mysqli_connect('localhost', 'root', 'root123456', 'group_15');
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (!$link) {
    echo "連結錯誤代碼: " . mysqli_connect_errno() . "<br>"; //顯示錯誤代碼
    echo "連結錯誤訊息: " . mysqli_connect_error() . "<br>"; //顯示錯誤訊息
    exit();
}
$result = mysqli_query($link, "SELECT * FROM products");
                                for ($i=0; $i < 2 ; $i++) {
                                    echo "<div class=\"col-md-6 ftco-animate\">";


                                        for ($j=0; $j < 3 ; $j++) {
                                            $row = mysqli_fetch_assoc($result);
                                            if(!is_null($row))
                                            {
                                                echo "<div class=\"media menu-item\">";
                                                echo "<img class=\"mr-3\" src=\"images/products/".$row["image_name"]."\" class=\"img-fluid\">";
                                                echo "<div class=\"media-body\">";
                                                echo "<h5 class=\"mt-0\">".$row["name"]."</h5>";
                                                echo "<p>".$row["description"]."</p>";
                                                echo "<h6 class=\"text-primary menu-price\">$".$row["price"]."</h6>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                    }
                                    echo "</div>";
                                }


?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dinner" role="tabpanel" aria-labelledby="pills-dinner-tab">
                            <div class="row">
                                <?php

$link = mysqli_connect('localhost', 'root', 'root123456', 'group_15');
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (!$link) {
    echo "連結錯誤代碼: " . mysqli_connect_errno() . "<br>"; //顯示錯誤代碼
    echo "連結錯誤訊息: " . mysqli_connect_error() . "<br>"; //顯示錯誤訊息
    exit();
}
$result = mysqli_query($link, "SELECT * FROM products");
                                for ($i=0; $i < 2 ; $i++) {
                                    echo "<div class=\"col-md-6 ftco-animate\">";


                                        for ($j=0; $j < 3 ; $j++) {
                                            $row = mysqli_fetch_assoc($result);
                                            if(!is_null($row))
                                            {
                                                echo "<div class=\"media menu-item\">";
                                                echo "<img class=\"mr-3\" src=\"images/products/".$row["image_name"]."\" class=\"img-fluid\">";
                                                echo "<div class=\"media-body\">";
                                                echo "<h5 class=\"mt-0\">".$row["name"]."</h5>";
                                                echo "<p>".$row["description"]."</p>";
                                                echo "<h6 class=\"text-primary menu-price\">$".$row["price"]."</h6>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                    }
                                    echo "</div>";
                                }


?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-primary" style="text-align: right"><a href="products.php">查看更多 More...</a></h3>
        </div>
    </section>
    <!-- END section -->
    <section class="ftco-section bg-light" id="section-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 ftco-animate">
                    <h4 class="ftco-sub-title">news & events</h4>
                    <h2 class="display-4" style="margin-bottom: 50px"><!--News &amp; -->活動快訊</h2>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href=""><img class="d-block w-100" src="images/ad_1.jpg" alt="First slide" height="289px" width=""></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100" src="images/ad_2.jpg" alt="Second slide" height="289px" width="1110px"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100" src="images/ad_3.jpg" alt="Third slide" height="289px" width="1110px"></a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="ftco-section" id="section-about">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ftco-animate mb-5">
                    <h4 class="ftco-sub-title">Our Story</h4>
                    <h2 class="ftco-primary-title display-4">Welcome</h2>
                    <p>甜食，可以是一種享受、一種信仰，更可以是一種態度。</p>
                    <p class="mb-4">吃吧！盡情的吃吧！減肥這種事就留給明天的自己，一生只有一次，何不好好享受當下呢？</p>
                    <p><a href="#" class="btn btn-secondary btn-lg">Our Story</a></p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate img" data-animate-effect="fadeInRight">
                    <img src="images/about_img_1.jpg" height="500px">
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="ftco-section bg-light" id="section-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 ftco-animate">
                    <h4 class="ftco-sub-title">Contact Us</h4>
                    <h2 class="display-4">聯繫我們</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">本店致力於提供客戶最滿意的服務。
                                <br/>若有任何的問題，還望您不吝指教。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-5 ftco-animate">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="姓名 (Enter your name)">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="信箱 (Enter your email)">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="內容 (Write your message)"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg" value="傳送訊息">
                        </div>
                    </form>
<?php
$link = mysqli_connect("localhost","root","root123456","group_15")
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link,"SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['name']))
{
  $sql="insert into comment (name,email,message) values ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['message']."')";

  if ( $result = mysqli_query($link, $sql) ) // 送出查詢的SQL指令
    $msg= "<span style='color:#0000FF'>資料新增成功!<br>影響記錄數: ". mysqli_affected_rows($link) . "筆</span>";
  else
    $msg= "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" .mysqli_error($link) ."</span>";

  echo $msg;
}
mysqli_close($link); // 關閉資料庫連結

?>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md ftco-animate">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">The Shop</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#section-about" class="py-2 d-block">About Us</a></li>
                                    <li><a href="#section-news" class="py-2 d-block">Events</a></li>
                                    <li><a href="#section-contact" class="py-2 d-block">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md ftco-animate">
                            <div class="ftco-footer-widget mb-4">
                                <!--<h2 class="ftco-heading-2">Communities</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">Support</a></li>
                                    <li><a href="#" class="py-2 d-block">Sharing is Caring</a></li>
                                    <li><a href="#" class="py-2 d-block">Better Web</a></li>
                                    <li><a href="#" class="py-2 d-block">Good Template</a></li>
                                </ul>-->
                            </div>
                        </div>
                        <div class="col-md ftco-animate">
                            <div class="ftco-footer-widget mb-4">
                                <!--<h2 class="ftco-heading-2">Useful links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">Bootstrap 4</a></li>
                                    <li><a href="#" class="py-2 d-block">jQuery</a></li>
                                    <li><a href="#" class="py-2 d-block">HTML5</a></li>
                                    <li><a href="#" class="py-2 d-block">Sass</a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="facebook.html"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="instagram.html"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md text-left">
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade member" id="login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"><!--reservationModalLabel-->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);background-position : center ;"></div>
                        <div class="col-lg-8 p-5">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <small>CLOSE </small><span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="mb-4">登入</h1>
                            <form action="#" method="post" id="form2">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="account_login">帳號</label>
                                        <input type="text" class="form-control" id="account_login" name="account_login" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="password_login">密碼</label>
                                        <input type="password" class="form-control" id="password_login" name="password_login" required>
                                    </div>
                                </div>
                                <div>
                                    <?php
$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (isset($_POST['account_login']) && isset($_POST['password_login'])) {
// 送出查詢的SQL指令
    $id=$_POST['account_login'];
    $pw=$_POST['password_login'];
$result = mysqli_query($link, "SELECT * FROM account where account = '$id'");
$row = @mysqli_fetch_row($result);
if ($row[0] == $id && $row[1] == $pw) {
//將帳號寫入session，方便驗證使用者身份

} else {
echo "<script>
$(function(){
$('#login').modal({
show:true,
})
});
</script>" . "<span style=\"color:red\">帳號或密碼錯誤</span>";
}
}
mysqli_close($link); // 關閉資料庫連結
?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="登入">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <!-- Modal -->
    <div class="modal fade member" id="Create" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"><!--reservationModalLabel-->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);background-position : center ;"></div>
                        <div class="col-lg-8 p-5">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <small>CLOSE </small><span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="mb-4">註冊</h1>
                            <form action="#" method="post" id="form1" name="form1">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="account">帳號</label> <label id="account-error" class="error" for="account"></label>
                                        <input type="text" class="form-control" id="account" name="account" value="" placeholder="4-10字元" onkeyup=sendRequest();>
                                        <span id='show_msg' style="color:red"></span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label id="same-error" class="error" for="same"></label>
                                        <input type="text" id="same" name="same" style="visibility: hidden;width: 1px">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="pwd">密碼</label> <label id="pwd-error" class="error" for="pwd"></label>
                                        <input type="password" class="form-control" id="pwd" name="pwd" value="" placeholder="8-12字元">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="m_lname">密碼確認</label> <label id="pwd2-error" class="error" for="pwd2"></label>
                                        <input type="password" class="form-control" id="pwd2" name="pwd2" value="" placeholder="需與密碼相符">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="m_email">Email</label> <label id="email-error" class="error" for="email"></label>
                                        <input type="email" class="form-control" id="email" name="mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="m_email">地址</label> <label id="addr-error" class="error" for="addr"></label>
                                        <input type="text" class="form-control" name="addr" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="checkbox" name="news" value="1" checked>　訂閱商品/活動訊息
                                        <br/>
                                        <font size="2px">不定期透過email通知最新商品活動及優惠資訊。</font>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="註冊">
                                    </div>
                                </div>
                            </form>
<?php
$link = mysqli_connect("localhost","root","root123456","group_15")
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link,"SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['account']))
{
  $sql="insert into account values ('" . $_POST['account'] . "','" . $_POST['pwd'] . "','" . $_POST['mail']. "','" . $_POST['addr'] ."','" . $_POST['news'] ."',0)";

  if ( $result = mysqli_query($link, $sql) ) // 送出查詢的SQL指令
    $msg= "<span style='color:#0000FF'>資料新增成功!<br>影響記錄數: ". mysqli_affected_rows($link) . "筆</span>";
  else
    $msg= "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" .mysqli_error($link) ."</span>";


}
mysqli_close($link); // 關閉資料庫連結

?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    $("#gotop").click(function() {
        jQuery("html,body").animate({
            scrollTop: 0
        }, 500);
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });
    </script>
</body>

</html>
