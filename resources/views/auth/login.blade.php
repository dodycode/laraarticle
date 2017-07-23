<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Admin Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //css files -->

<!-- Theme -->
<style type="text/css">
    article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,nav.vertical ul li,section{display:block}body,h1,h2,h3,h4,h5,h6,label,ol,p,ul{margin:0}.w3ls-header,body,ol,ul{padding:0}a,abbr,acronym,address,applet,article,aside,audio,b,big,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,embed,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,mark,menu,nav,nav li,nav ul,object,ol,output,p,pre,q,ruby,s,samp,section,small,span,strike,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,tt,u,var,video{margin:0;padding:0;border:0;font:inherit;vertical-align:baseline}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}.txt-rt{text-align:right}.txt-lt{text-align:left}.copyright,.header-left-bottom p,.header-main,.header-main h2,.sign-up h2,.txt-center,h1{text-align:center}.float-rt{float:right}.float-lt{float:left}.clear{clear:both}.pos-relative{position:relative}.pos-absolute{position:absolute}.header-main,.login-check{position:relative}.vertical-base{vertical-align:baseline}.vertical-top{vertical-align:top}nav.horizontal ul li{display:inline-block}img{max-width:100%}body{-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;font-size:100%;background:url('{{ asset('images/content-website/bg6.jpg') }}') no-repeat;background-size:cover;font-family:Muli,sans-serif}a,a:hover{transition:.5s all;-webkit-transition:.5s all;-moz-transition:.5s all;-o-transition:.5s all}h1{font-size:45px;padding:28px 0;text-transform:uppercase;word-spacing:6px;color:#fff}.icon1{margin:0 0 2em;border-bottom:1px solid #525252;padding:.7em 0}.wthree li{display:inline-block}a{text-decoration:none;color:#585858;margin:0}a:hover{color:#ff4f81}.bottom{margin:3em 0 0}.header-main{padding:11em 4em 2.5em;width:25%;margin:0 auto;background:#fff;z-index:999}.header-main h2{font-size:1.6em;line-height:1.6em;color:#585858;padding:0 2em 25px;text-transform:capitalize}.sign-up{margin:2em 0}.header-left{background:#fff;padding:0}.sign-up h2{font-size:22px;color:#000;background:#fbbc05;width:40px;height:40px;line-height:1.9em;border-radius:50%;margin:0 auto}::-webkit-input-placeholder{color:#999!important}.header-left-bottom input[type=email],.header-left-bottom input[type=password]{outline:0;font-size:15px;color:#000;border:none;width:90%;display:inline-block;background:0 0;font-family:Muli,sans-serif;text-align:center;letter-spacing:2px}.header-left-bottom input[type=submit]{background:#3be8b0;color:#FFF;font-size:17px;text-transform:uppercase;padding:.5em 2em;letter-spacing:0;transition:.5s all;-webkit-transition:.5s all;-moz-transition:.5s all;-o-transition:.5s all;display:inline-block;cursor:pointer;outline:0;border:none;font-family:Muli,sans-serif}.header-left-bottom input[type=submit]:hover{background:#ff4f81;transition:.5s all;-webkit-transition:.5s all;-moz-transition:.5s all;-o-transition:.5s all}.header-left-bottom p{font-size:17px;color:#000;display:inline-block;width:100%;margin:20px 0 0;letter-spacing:1px}.header-left-bottom p a{font-size:22px;color:#dd4b39}.header-left-bottom p a:hover{color:#3be8b0;text-decoration:underline}.social{margin:1em 0 0}.heading h5{color:#000;margin-top:8px;font-size:20px}.social i.fa.fa-facebook-square:hover{color:#3b5998}.social i.fa.fa-twitter-square:hover{color:#1da1f2}.social i.fa.fa-linkedin-square:hover{color:#00a0dc}.social i.fa.fa-google-plus-square:hover{color:#dd4b39}.social i.fa{font-size:37px;margin:0 5px;transition:.5s all;color:#505050}.heading,.icons{width:50%;float:left}.checkbox i{position:absolute;top:0;left:29%;display:block;width:20px;height:18px;outline:0;border:1px solid #9c9c9c;background:#fff;border-radius:0;-webkit-border-radius:0;-moz-border-radius:0;-o-border-radius:0;cursor:pointer}.checkbox input:checked+i:after{opacity:1}.checkbox input+i:after{position:absolute;opacity:0;transition:opacity .1s;-o-transition:opacity .1s;-ms-transition:opacity .1s;-moz-transition:opacity .1s;-webkit-transition:opacity .1s;content:url(../images/tick.png);top:-2px;left:2px;width:15px;height:15px}.checkbox{position:relative;display:block;padding-left:30px;letter-spacing:0;font-size:16px;color:#000}.header-main:after,.header-main:before{content:'';position:absolute;top:0;width:0;height:0}input[type=checkboxi]{display:none}.copyright{padding:30px 0}.copyright p{font-size:15px;font-weight:100;color:#FFF;word-spacing:.2em;letter-spacing:1px}.copyright p a{font-size:15px;font-weight:400;color:#FFF}.copyright p a:hover{color:#34a853;text-decoration:none}.header-main:before{left:0;border-top:170px solid #ff4f81;border-right:322px solid transparent;border-left:0 solid transparent}.header-main:after{right:0;border-top:260px solid #3be8b0;border-right:0 solid transparent;border-left:340px solid transparent;z-index:-1}span{text-transform:lowercase;color:#ff4f81}@media (max-width:1920px){h1{padding:100px 0 30px}}@media (max-width:1680px){h1{padding:60px 0 30px}}@media (max-width:1600px){.copyright,h1{padding:20px 0}}@media (max-width:1440px){.header-main h2{padding:0 1em 25px}.checkbox i{left:27%}}@media (max-width:1366px){.header-main{width:27%}}@media (max-width:1280px){.header-main{width:30%}}@media (max-width:1080px){.header-main h1{font-size:2.1em}.header-main{width:37%}}@media (max-width:1024px){.header-main{width:39%}.sign-up h2{font-size:1.2em;width:35px;height:35px}}@media (max-width:991px){.header-main{width:37%}}@media (max-width:900px){.header-main{width:38%}}@media (max-width:800px){.header-main{width:44%}.header-left-bottom input[type=email]{width:88%}h1{font-size:40px}}@media (max-width:768px){.header-main{width:46%}.copyright{padding:30px 0}}@media (max-width:736px){.header-main{width:50%}}@media (max-width:667px){.header-main{width:54%}}@media (max-width:600px){.header-main{width:57%}h1{font-size:40px}.header-main h2{font-size:1.5em}.checkbox i{left:24%}}@media (max-width:568px){.header-main h1{font-size:2em}.copyright p{margin:0 1em}.sign-up h2{font-size:1.1em;width:32px;height:32px;line-height:2em}h1{font-size:38px}.header-left-bottom input[type=email],.header-left-bottom input[type=password],.header-left-bottom input[type=text],.header-left-bottom input[type=tel]{width:88%;font-size:14px}.header-main h2{font-size:1.4em}.checkbox i{left:24%}}@media (max-width:480px){.header-main{width:65%}h1{font-size:34px}}@media (max-width:414px){h1{font-size:32px}.checkbox{letter-spacing:0}.icon1 i.fa{font-size:1.2em}.header-left-bottom input[type=email],.header-left-bottom input[type=password],.header-left-bottom input[type=text],.header-left-bottom input[type=tel]{width:80%}.sign-up h2{font-size:1em;width:30px;height:30px}.header-left-bottom input[type=submit]{width:50%}.heading,.icons{width:100%;text-align:center;margin-bottom:20px}.header-main h2{font-size:1.3em;padding:0 .5em 25px}.header-main:before{border-right:240px solid transparent}.header-main:after{border-top:230px solid #3be8b0;border-left:250px solid transparent}.header-main{padding:10em 4em 2.5em}.checkbox i{left:20%}}@media (max-width:384px){.copyright p{font-size:.9em}.sign-up{margin:1em 0}h1{font-size:30px}.header-main{width:68%;padding:10em 3em 2.5em}.header-main h2{padding:0 0 25px}.header-left-bottom p{font-size:16px}.checkbox i{left:16%}}@media (max-width:375px){.header-main{width:70%;padding:10em 3em 2.5em}}@media (max-width:320px){.w3ls-header{padding:0}.header-main{padding:9em 2em 2.5em}.icon1{margin:0 0 1.5em}.header-left-bottom input[type=email],.header-left-bottom input[type=password],.header-left-bottom input[type=text]{font-size:13px}.copyright p a{font-size:1em}h1{font-size:25px;word-spacing:1px}.header-main h2{font-size:1.2em;padding-bottom:15px}.social i.fa{font-size:34px}.header-left-bottom input[type=submit]{font-size:15px}.header-main:before{border-right:200px solid transparent;border-top:130px solid #ff4f81}.header-main:after{border-top:180px solid #3be8b0;border-left:200px solid transparent}.checkbox i{left:14%}.header-left-bottom p a{font-size:17px}.header-left-bottom p{font-size:14.5px}}
</style>
</head>
<body>
<!-- main -->
<div class="w3ls-header">
    <h1>Login</h1>
    <div class="header-main">
            @if(Session::get('Success'))
            <h5>{{ Session::get('Success') }}</h5>
            @endif

            @if ($errors->has('email'))
            <h3>
                <strong>{{ $errors->first('email') }}</strong>
            </h3>
            @endif

            @if ($errors->has('password'))
            <h3>
                <strong>{{ $errors->first('password') }}</strong>
            </h3>
            @endif
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            {!! csrf_field() !!}
                            <div class="icon1">
                                <input id="email" type="email" placeholder="Email kamu" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="icon1">
                                <input id="password" type="password" placeholder="Password kamu" name="password" required>
                            </div>
                            <div class="bottom">
                                <input type="submit" value="Log in" />
                            </div>
                    </form> 
                    </div>
                </div>
            </div>
    </div>
</div>
<!--header end here-->
<!-- copyright start here -->
<div class="copyright">
    <p>© 2017 Anime Fanclub All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
</div>
<!--copyright end here-->
</body>
</html>