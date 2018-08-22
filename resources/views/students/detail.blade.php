@extends('layouts.main')

@section('title', '会员详情')

@section('content')
<section class="setMember page" id="editForm">
    <div class="titlebox">
        <a href="javacript:;"> < </a>
        <h3 class="title">会员页面</h3>
    </div>
    <div class="cardbox">
        <a href="javascript:;">
          <img src="/img/hCard.jpg"/>
        </a>
    </div>
    <div class="form">
        <div class="input_box">
            <span class="icon icon1"></span>
            <span class="tip">学员姓名</span>
            <input type="text" name="username" value="王某某" class="username" />
        </div>
        <div class="input_box flex">
            <span class="icon icon2"></span>
            <span class="tip">性别</span>
            <div class="sexbox getSex">
                <span id="1">男</span>
            </div>
            <div class="sexbox setSex flex">
                <input type="radio" name='sex1' class="checked" checked="true" id="1" />
                <label for='sex1'>男</label>
                <input type="radio" name="sex2" class="checked" id="2"/>
                <label for="sex2">女</label>
            </div>
        </div>
        <div class="input_box flex">
            <span class="icon icon3"></span>
            <span class="tip">生日</span>
            <div class="time flex">
                <input type="date" class="bothDate"  value ="2018-08-16" />
                <span class="icon-arrow hidden"> > </span>
            </div>
        </div>
        <div class="input_box">
            <span class="icon icon4"></span>
            <span class="tip">身份证号</span>
            <input type="text" name="card"  class="cardId" placeholder="421022XXXXXXXXXXX"  />
        </div>
        <div class="input_box">
            <span class="icon icon5"></span>
            <span class="tip">家庭地址</span>
            <input type="text" name="address"  class="address" placeholder="XX市XX路XX号" />
        </div>
        <div class="input_box">
            <span class="icon icon6"></span>
            <span class="tip">在读学校</span>
            <input type="text" name="school" class="school" placeholder="XXXX小学"  />
        </div>
        <div class="input_box">
             <span class="icon icon7"></span>
            <span class="tip">联系人</span>
            <input type="text" name="user" class="user" placeholder="XXX" />
        </div>
        <div class="input_box">
            <span class="icon icon8"></span>
            <span class="tip">联系电话</span>
            <input type="tel" minlength="11" required name="tel" class="phoneNum" placeholder="1851618xxxx"  />
        </div>
    </div>
    <button type="button" class="exitBtn btn">修改会员信息</button>
</section>
@endsection