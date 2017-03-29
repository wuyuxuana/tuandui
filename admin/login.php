<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>登录</title>
    <link rel="stylesheet" href="styles/login.css"/>
    <link rel="stylesheet" href="../styles/public.css"/>
    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/public.js"></script>
</head>
<body>
<div class="wallpaper">
</div>
<div class="login_box">
    <div class="header">
        <h2>OFC管理登录</h2>
    </div>
    <form class="form_login" action="doLogin.php" method="post">
        <ul>
            <li><span id="user_01"></span><input  name="username" type="text"/></li>
            <li><span id="user_02"></span><input  name="password" type="password"></li>
            <li style="border:none;background: none"><input id="user_03" name="verify" type="text"  /><img src="getVerify.php" style="height: 32px;line-height: 32px;float: left;width: 80px;" alt="验证码"/></li>
            <li style="background: #3B86BB;"><input style="width: 100%;color: #ebebeb;" type="submit" value="登录"/ ></li>
        </ul>

    </form>
</div>

</body>

</html>