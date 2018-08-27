@extends('layouts.main')

@section('title', '领取会员卡')

@section('content')
<section class="addMember page" id="addForm">
    <div class="titlebox">
        <a href="javacript:;"> < </a>
        <h3 class="title">新增会员</h3>
    </div>
    <div class="form">
        {{csrf_field()}}
        <div class="input_box">
            <span class="icon icon1"></span>
            <span class="isture">*</span>
            <span class="tip">学员姓名</span>
            <input type="text" name="username" class="username" />
        </div>
        <div class="input_box">
            <span class="icon icon2"></span>
            <span class="isture">*</span>
            <span class="tip">性别</span>
            <div class="sexbox setSex flex">
                <input type="radio" name='sex1' class="checked" dataval="男" />
                <label for='sex1'>男</label>
                <input type="radio" name="sex2" class="checked" dataval="女" checked="true" />
                <label for="sex2">女</label>
            </div>
        </div>
        <div class="input_box">
            <span class="icon icon3"></span>
            <span class="isture">*</span>
            <span class="tip">生日</span>
            <div class="time">
                <input type="date" class="birthday" value ="2018-08-16" />
                <span class="icon-arrow"> > </span>
            </div>
        </div>
        <div class="input_box">
            <span class="icon icon4"></span>
            <span class="isture">*</span>
            <span class="tip">身份证号</span>
            <input type="text" name="card" class="cardId" />
        </div>
        <div class="input_box">
            <span class="icon icon5"></span>
             <span class="isture">*</span>
            <span class="tip">家庭地址</span>
            <input type="text" name="address" class="address" />
        </div>
        <div class="input_box">
            <span class="icon icon6"></span>
            <span class="isture">*</span>
            <span class="tip">在读学校</span>
            <input type="text" name="school" class="school" />
        </div>
        <div class="input_box">
             <span class="icon icon7"></span>
             <span class="isture">*</span>
            <span class="tip">联系人</span>
            <input type="text" name="user" class="user" />
        </div>
        <div class="input_box">
            <span class="icon icon8"></span>
            <span class="isture">*</span>
            <span class="tip">联系电话</span>
            <input type="tel" name="tel" class="phoneNum" minlength="11"  required />
        </div>
    </div>
    <button type="button" class="saveBtn btn">保存会员信息</button>
</section>
@endsection