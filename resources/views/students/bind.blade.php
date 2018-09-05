<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="no"/>
    <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/index.css')) }}{{ $STATIC_VERSION }}" />
    <title>登录</title>
</head>
<body>
<div class="wrap">
    <div class="header_logo">
        <img src="/img/logo-bind.png" alt="logo"/>
    </div>
    <div class="formBox">
        <form action="" method="post">
            {{csrf_field()}}
            <div class="input_group">
                <label class="icon iconphone"></label>
                <input type="text" class="mobile" placeholder="请输入手机号码" />
            </div>
            <div class="input_group">
                <label class="icon iconEdit"></label>
                <input type="text" class="card_number" placeholder="请输入卡号" />
            </div>
            <button type="submit" class="btn btn-submit">绑定会员卡</button>
        <form>
    </div>
</div>
</body>
</html>