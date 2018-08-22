Zepto(function($){
  //点击进入页面判断
   var getData = localStorage.getItem("data")?localStorage.getItem("data"):"";
    if(getData!==""){
       var formdatas = JSON.parse(getData);
       $(".loading .icon_close,.loading .center").on('tap',function(){
          $(".loading").fadeOut(300);
          $(".addMember").hide();
          $(".setMember").show(300);
       });
          $("#editForm .username").val(formdatas.username);
          if(formdatas.sexId==1){
             $("#editForm .getSex span").text("男").attr("id",formdatas.sexId);
          }else {
             $("#editForm .getSex span").text("女").attr("id",formdatas.sexId);
          }
          $("#editForm .bothDate").val(formdatas.bothDate);
          $("#editForm .cardId").val(formdatas.cardId);
          $("#editForm .address").val(formdatas.address);
          $("#editForm .school").val(formdatas.school);
          $("#editForm .user").val(formdatas.user);
          $("#editForm .phoneNum").val(formdatas.phoneNum);
        }else {
          $(".loading .icon_close,.loading .center").on('tap',function(){
          $(".loading").fadeOut(300);
          $(".addMember").show(300);
          });
        }
  //回退上一次页面
    function gohistory(id){
       id.parents("section").fadeOut(300).prev("section").show(300);
     }
    $(".addMember .titlebox a").on('click',function(){
         gohistory($(this))
    })
    $(".setMember .titlebox a").on('click',function(){
         gohistory($(this))
    })
    //过滤所有表单的奇异字符
      var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】 ‘；：”“'。，、？]");
    $(".input_box input").keyup(function() {
       var inputVal = $(this).val();
      if(pattern.test(inputVal)){
        $(this).parents('.input_box').addClass("errorInput");
        alert("输入字符不能为奇异字符！");
        return false;
     }else {
        $(this).parents('.input_box').removeClass("errorInput");
     }
    });
        //单选状态
    $('.sexbox input[type="radio"]').each(function(index, el) {
         if($(this).attr('checked')){
            $(this).addClass('isActive');
        }
    });
        $('.sexbox input[type="radio"]').on('click',function(){
             $(this).attr('checked',true).siblings('.checked').removeAttr('checked');
             $(this).addClass('isActive').siblings('.checked').removeClass('isActive');
         });
        //获取表单值
        function getVal(box){
          var username=box.find(".username").val();
          var sexId = box.find(".isActive").attr("id");
          var bothDate = box.find(" .bothDate").val();
          var cardId = box.find(".cardId").val();
          var address = box.find(".address").val();
          var school = box.find(" .school").val();
          var user = box.find(" .user").val();
          var phoneNum = box.find(".phoneNum").val();
          if(username!==""&&sexId!==""&&bothDate!==""&&cardId!==""&&address!==""&&school!==""&&user!==""&&phoneNum!==""){
            var formdata={
             "username":username,
             "sexId":sexId,
             "bothDate":bothDate,
             "cardId":cardId,
             "address":address,
             "school":school,
             "user":user,
             "phoneNum":phoneNum
           }
            alert(JSON.stringify(formdata));
            //存储
            localStorage.setItem("data", JSON.stringify(formdata));
             window.location.reload();
        }else {
         alert("输入信息不能为空");
         return false;
      }
    }

  //修改页面
    $(".exitBtn").on('tap',function(){
        var _self = $(this);
        if(!$(this).hasClass('save')){
   $('#editForm input').each(function(index, el) {
      var t = $('#editForm input').eq(0).val();
                $('#editForm input').eq(0).val('').focus().val(t);
                $(".getSex").hide().siblings('.setSex').show();
          });
            _self.addClass('save');
            _self.text("保存会员信息");
        }else {
            getVal($("#editForm"));

       }
    });

    //新增表单提交
    $("#addForm .saveBtn").on('tap',function(){
         getVal($("#addForm"));
      })
})