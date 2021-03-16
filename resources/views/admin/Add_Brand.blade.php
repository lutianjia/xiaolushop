<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admin/css/style.css"/>
        <link rel="stylesheet" href="/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css" />
        <link href="/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/admin/assets/js/bootstrap.min.js"></script>
        <script src="/admin/assets/js/typeahead-bs2.min.js"></script>
         <script src="/admin/assets/layer/layer.js" type="text/javascript"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.speed.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/handlers.js"></script>
        <link rel="stylesheet" href="/admin/guojia/css/select_gj.css">
        <script src="/admin/js/jquery-1.7.2.min.js"></script>

</head>

<body>
<script type="text/javascript" src="/admin/guojia/js/select_gj.min.js"></script>
<script src="/admin/guojia/js/select2_1.js"></script>
<div class=" clearfix" style="margin-left:250px">
 <div id="add_brand" class="clearfix">
 <div class="left_add">
   <div class="title_name">添加品牌</div>
   <ul class="add_conent">
       <input name="id" id="id" type="hidden" class="add_text" value=""/>
    <li class=" clearfix"><label class="label_name"><i>*</i>品牌名称：</label> <input name="brand_name" id="brand_name" type="text" class="add_text" value=""/></li>
    <li class=" clearfix"><label class="label_name">品牌图片：</label>
           <div class="demo l_f">
	           <div class="logobox"><div class="resizebox"><img src="/admin/images/image.png" id="image" width="100px" alt="" height="100px"/></div></div>
               <div class="logoupload">
                   <div class="btnbox"><a id="uploadBtnHolder" class="uploadbtn" href="javascript:;">上传替换</a></div>
                  <div style="clear:both;height:0;overflow:hidden;"></div>
                  <div class="progress-box" style="display:none;">
                    <div class="progress-num">上传进度：<b>0%</b></div>
                    <div class="progress-bar"><div style="width:0%;" class="bar-line"></div></div>
                  </div>
              </div>            
                      
           </div> <div class="prompt"><p>图片大小<b>120px*60px</b>图片大小小于5MB,</p><p>支持.jpg;.gif;.png;.jpeg格式的图片</p></div>  
    </li>
         <li class=" clearfix"><label class="label_name"><i>*</i>所属地区：</label>
             <div class="head">
                 <select name="country" id="country" class="fastbannerform__country">
                     <option value="America" title="AA" >America</option>
                     <option value="Andorra" title="AD" >Andorra</option>
                     <option value="United Arab Emirates" title="AE" >United Arab Emirates</option>
                     <option value="Afghanistan" title="AF" >Afghanistan</option>
                     <option value="Antigua and Barbuda" title="AG" >Antigua and Barbuda</option>
                     <option value="Albania" title="AL" >Albania</option>
                     <option value="Armenia" title="AM" >Armenia</option>
                     <option value="Angola" title="AO" >Angola</option>
                     <option value="Argentina" title="AR" >Argentina</option>
                     <option value="Austria" title="AT" >Austria</option>
                     <option value="Australia" title="AU" >Australia</option>
                     <option value="Aruba" title="AW" >Aruba</option>
                     <option value="Azerbaijan" title="AZ" >Azerbaijan</option>
                     <option value="Bosnia and Herzegovina" title="BA" >Bosnia and Herzegovina</option>
                     <option value="Barbados" title="BB" >Barbados</option>
                     <option value="Bangladesh" title="BD" >Bangladesh</option>
                     <option value="Belgium" title="BE" >Belgium</option>
                     <option value="Burkina Faso" title="BF" >Burkina Faso</option>
                     <option value="Bulgaria" title="BG" >Bulgaria</option>
                     <option value="Bahrain" title="BH" >Bahrain</option>
                     <option value="Burundi" title="BI" >Burundi</option>
                     <option value="Benin" title="BJ" >Benin</option>
                     <option value="Bermuda" title="BM" >Bermuda</option>
                     <option value="Brunei" title="BN" >Brunei</option>
                     <option value="Bolivia" title="BO" >Bolivia</option>
                     <option value="Brazil" title="BR" >Brazil</option>
                     <option value="Bahamas" title="BS" >Bahamas</option>
                     <option value="Bhutan" title="BT" >Bhutan</option>
                     <option value="Botswana" title="BW" >Botswana</option>
                     <option value="Belarus" title="BY" >Belarus</option>
                     <option value="Belize" title="BZ" >Belize</option>
                     <option value="Canada" title="CA" >Canada</option>
                     <option value="Democratic Republic of the Congo" title="CD" >Democratic Republic of the Congo</option>
                     <option value="Central African Republic" title="CF" >Central African Republic</option>
                     <option value="Democratic Republic of the Congo" title="CG" >Democratic Republic of the Congo</option>
                     <option value="Switzerland" title="CH" >Switzerland</option>
                     <option value="Chile" title="CL" >Chile</option>
                     <option value="Cameroon" title="CM" >Cameroon</option>
                     <option value="China" title="CN" selected="selected">China</option>
                     <option value="Colombia" title="CO" >Colombia</option>
                     <option value="Costa Rica" title="CR" >Costa Rica</option>
                     <option value="Cuba" title="CU" >Cuba</option>
                     <option value="Cape Verde" title="CV" >Cape Verde</option>
                     <option value="Cyprus" title="CY" >Cyprus</option>
                     <option value="Czech Republic" title="CZ" >Czech Republic</option>
                     <option value="Germany" title="DE" >Germany</option>
                     <option value="Djibouti" title="DJ" >Djibouti</option>
                     <option value="Denmark" title="DK" >Denmark</option>
                     <option value="Dominica" title="DM" >Dominica</option>
                     <option value="Dominican Republic" title="DO" >Dominican Republic</option>
                     <option value="Algeria" title="DZ" >Algeria</option>
                     <option value="Ecuador" title="EC" >Ecuador</option>
                     <option value="Estonia" title="EE" >Estonia</option>
                     <option value="Egypt" title="EG" >Egypt</option>
                     <option value="Eritrea" title="ER" >Eritrea</option>
                     <option value="Spain" title="ES" >Spain</option>
                     <option value="Ethiopia" title="ET" >Ethiopia</option>
                     <option value="Finland" title="FI" >Finland</option>
                     <option value="Fiji" title="FJ" >Fiji</option>
                     <option value="Falkland Islands" title="FK" >Falkland Islands</option>
                     <option value="Micronesia" title="FM" >Micronesia</option>
                     <option value="Faroe Islands" title="FO" >Faroe Islands</option>
                     <option value="France" title="FR" >France</option>
                     <option value="Gabon" title="GA" >Gabon</option>
                     <option value="United Kingdom" title="GB" >United Kingdom</option>
                     <option value="Grenada" title="GD" >Grenada</option>
                     <option value="Georgia" title="GE" >Georgia</option>
                     <option value="Ghana" title="GH" >Ghana</option>
                     <option value="Gibraltar" title="GI" >Gibraltar</option>
                     <option value="Gambia" title="GM" >Gambia</option>
                     <option value="Guinea" title="GN" >Guinea</option>
                     <option value="Equatorial Guinea" title="GQ" >Equatorial Guinea</option>
                     <option value="Greece" title="GR" >Greece</option>
                     <option value="Guatemala" title="GT" >Guatemala</option>
                     <option value="Guinea-Bissau" title="GW" >Guinea-Bissau</option>
                     <option value="Guyana" title="GY" >Guyana</option>
                     <option value="Hong Kong" title="HK" >Hong Kong</option>
                     <option value="Honduras" title="HN" >Honduras</option>
                     <option value="Croatia" title="HR" >Croatia</option>
                     <option value="Haiti" title="HT" >Haiti</option>
                     <option value="Hungary" title="HU" >Hungary</option>
                     <option value="Indonesia" title="ID" >Indonesia</option>
                     <option value="Ireland" title="IE" >Ireland</option>
                     <option value="Israel" title="IL" >Israel</option>
                     <option value="India" title="IN" >India</option>
                     <option value="Iraq" title="IQ" >Iraq</option>
                     <option value="Iran" title="IR" >Iran</option>
                     <option value="IIcelandSL" title="IS" >Iceland</option>
                     <option value="Italy" title="IT" >Italy</option>
                     <option value="Jamaica" title="JM" >Jamaica</option>
                     <option value="Jordan" title="JO" >Jordan</option>
                     <option value="Japan" title="JP" >Japan</option>
                     <option value="Kenya" title="KE" >Kenya</option>
                     <option value="Kyrgyzstan" title="KG" >Kyrgyzstan</option>
                     <option value="Cambodia" title="KH" >Cambodia</option>
                     <option value="Kiribati" title="KI" >Kiribati</option>
                     <option value="Comoros" title="KM" >Comoros</option>
                     <option value="Saint Kitts and Nevis" title="KN" >Saint Kitts and Nevis</option>
                     <option value="North Korea" title="KP" >North Korea</option>
                     <option value="South Korea" title="KR" >South Korea</option>
                     <option value="Kuwait" title="KW" >Kuwait</option>
                     <option value="Cayman Islands" title="KY" >Cayman Islands</option>
                     <option value="Kazakhstan" title="KZ" >Kazakhstan</option>
                     <option value="Laos" title="LA" >Laos</option>
                     <option value="Lebanon" title="LB" >Lebanon</option>
                     <option value="Saint Lucia" title="LC" >Saint Lucia</option>
                     <option value="Liechtenstein" title="LI" >Liechtenstein</option>
                     <option value="Sri Lanka" title="LK" >Sri Lanka</option>
                     <option value="Liberia" title="LR" >Liberia</option>
                     <option value="Lesotho" title="LS" >Lesotho</option>
                     <option value="Lithuania" title="LT" >Lithuania</option>
                     <option value="Luxembourg" title="LU" >Luxembourg</option>
                     <option value="Latvia" title="LV" >Latvia</option>
                     <option value="Libya" title="LY" >Libya</option>
                     <option value="Morocco" title="MA" >Morocco</option>
                     <option value="Monaco" title="MC" >Monaco</option>
                     <option value="Moldova" title="MD" >Moldova</option>
                     <option value="Montenegro" title="ME" >Montenegro</option>
                     <option value="Madagascar" title="MG" >Madagascar</option>
                     <option value="Macedonia" title="MK" >Macedonia</option>
                     <option value="Mali" title="ML" >Mali</option>
                     <option value="Myanmar" title="MM" >Myanmar</option>
                     <option value="Mongolia" title="MN" >Mongolia</option>
                     <option value="Macao" title="MO" >Macao</option>
                     <option value="Mauritania" title="MR" >Mauritania</option>
                     <option value="Malta" title="MT" >Malta</option>
                     <option value="Mauritius" title="MU" >Mauritius</option>
                     <option value="Maldives" title="MV" >Maldives</option>
                     <option value="Malawi" title="MW" >Malawi</option>
                     <option value="Mexico" title="MX" >Mexico</option>
                     <option value="Malaysia" title="MY" >Malaysia</option>
                     <option value="Mozambique" title="MZ" >Mozambique</option>
                     <option value="Namibia" title="NA" >Namibia</option>
                     <option value="Niger" title="NE" >Niger</option>
                     <option value="Nigeria" title="NG" >Nigeria</option>
                     <option value="Nicaragua" title="NI" >Nicaragua</option>
                     <option value="Netherlands" title="NL" >Netherlands</option>
                     <option value="Norway" title="NO" >Norway</option>
                     <option value="Nepal" title="NP" >Nepal</option>
                     <option value="Nauru" title="NR" >Nauru</option>
                     <option value="New Zealand" title="NZ" >New Zealand</option>
                     <option value="Oman" title="OM" >Oman</option>
                     <option value="Panama" title="PA" >Panama</option>
                     <option value="Peru" title="PE" >Peru</option>
                     <option value="Papua New Guinea" title="PG" >Papua New Guinea</option>
                     <option value="Philippines" title="PH" >Philippines</option>
                     <option value="Pakistan" title="PK" >Pakistan</option>
                     <option value="Poland" title="PL" >Poland</option>
                     <option value="Puerto Rico" title="PR" >Puerto Rico</option>
                     <option value="Palestine" title="PS" >Palestine</option>
                     <option value="Portugal" title="PT" >Portugal</option>
                     <option value="Palau" title="PW" >Palau</option>
                     <option value="Paraguay" title="PY" >Paraguay</option>
                     <option value="Qatar" title="QA" >Qatar</option>
                     <option value="Romania" title="RO" >Romania</option>
                     <option value="Serbia" title="RS" >Serbia</option>
                     <option value="Russia" title="RU" >Russia</option>
                     <option value="Rwanda" title="RW" >Rwanda</option>
                     <option value="Saudi Arabia" title="SA" >Saudi Arabia</option>
                     <option value="Solomon Islands" title="SB" >Solomon Islands</option>
                     <option value="Seychelles" title="SC" >Seychelles</option>
                     <option value="Sudan" title="SD" >Sudan</option>
                     <option value="Sweden" title="SE" >Sweden</option>
                     <option value="Singapore" title="SG" >Singapore</option>
                     <option value="Slovenia" title="SI" >Slovenia</option>
                     <option value="Slovak Republic" title="SK" >Slovak Republic</option>
                     <option value="Sierra Leone" title="SL" >Sierra Leone</option>
                     <option value="San Marino" title="SM" >San Marino</option>
                     <option value="Senegal" title="SN" >Senegal</option>
                     <option value="Somalia" title="SO" >Somalia</option>
                     <option value="Suriname" title="SR" >Suriname</option>
                     <option value="Sao Tome and Principe" title="ST" >Sao Tome and Principe</option>
                     <option value="El Salvador" title="SV" >El Salvador</option>
                     <option value="Syria" title="SY" >Syria</option>
                     <option value="Swaziland" title="SZ" >Swaziland</option>
                     <option value="Chad" title="TD" >Chad</option>
                     <option value="Togo" title="TG" >Togo</option>
                     <option value="Thailand" title="TH" >Thailand</option>
                     <option value="Tajikistan" title="TJ" >Tajikistan</option>
                     <option value="Turkmenistan" title="TM" >Turkmenistan</option>
                     <option value="Tunisia" title="TN" >Tunisia</option>
                     <option value="Tonga" title="TO" >Tonga</option>
                     <option value="Turkey" title="TR" >Turkey</option>
                     <option value="Trinidad and Tobago" title="TT" >Trinidad and Tobago</option>
                     <option value="Tuvalu" title="TV" >Tuvalu</option>
                     <option value="Taiwan" title="TW" >Taiwan</option>
                     <option value="Tanzania" title="TZ" >Tanzania</option>
                     <option value="Ukraine" title="UA" >Ukraine</option>
                     <option value="Uganda" title="UG" >Uganda</option>
                     <option value="Uruguay" title="UY" >Uruguay</option>
                     <option value="Uzbekistan" title="UZ" >Uzbekistan</option>
                     <option value="Saint Vincent And The Grenadine" title="VC" >Saint Vincent And The Grenadine</option>
                     <option value="Venezuela" title="VE" >Venezuela</option>
                     <option value="British Virgin Islands" title="VG" >British Virgin Islands</option>
                     <option value="Vietnam" title="VN" >Vietnam</option>
                     <option value="Vanuatu" title="VU" >Vanuatu</option>
                     <option value="Wallis and Futuna" title="WF" >Wallis and Futuna</option>
                     <option value="Western Samoa" title="WS" >Western Samoa</option>
                     <option value="Yemen" title="YE" >Yemen</option>
                     <option value="South Africa" title="ZA" >South Africa</option>
                     <option value="Zambia" title="ZM" >Zambia</option>
                     <option value="Zimbabwe" title="ZW" >Zimbabwe</option>
                 </select>
             </div>
         </li>
         <li class=" clearfix"><label class="label_name">品牌描述：</label> <textarea name="remarks" id="remarks" cols="" rows="" class="textarea" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">500</span>字</span></li>
   </ul>
 </div>

 </div>
  <div class="button_brand"><input name="" type="button" onclick="submit()"  class="btn btn-warning" value="保存"/>
      <input name="" type="reset" value="取消" onclick="cancel()" class="btn btn-warning"/></div>
</div>
</body>
</html>
<script type="text/javascript">
    function cancel() {
        window.history.go(-1);
    }
    function submit(){
        var str = "";
        var id = $('input[name=id]').val();
        var brand_name = $('input[name=brand_name]').val();
        if(brand_name.length == 0) {
            layer.alert(str += "" + "品牌名称" + "不能为空！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        var img = document.getElementById("image").src;
        if(img == 'http://retailer.com:8080/admin/images/image.png'){
            img = '';
        }
        var select = document.getElementById("country");
        var country = select.value;

        if(country.length == 0) {
            country='CHN';
        }
        var remarks = $('textarea[name=remarks]').val();
        layer.confirm('确认要保存吗？',function(index){
             $.ajax({
            	type: 'POST',
            	url: "{{url('/service/brand_add')}}",
            	// dataType: 'json',
            	data:{id:id,brand_name:brand_name,img:img,country:country,remarks:remarks,_token: "{{csrf_token()}}"},
            	success: function(data){
                    console.log(data);
                    var data = eval('(' + data + ')');
            	    if(data.status != 0){
                        layer.msg(data.message,{icon:1,time:1000});
                    }else{
                        layer.msg(data.message,{icon:1,time:1000});
                    }
            		document.getElementById('brand_name').value='';
            		document.getElementById('country').value='';
            		document.getElementById('remarks').value='';
                    document.getElementById("image").src='/admin/images/image.png';
            	},
            	error:function(data) {
            		console.log(data);
            		layer.closeAll('dialog');
            	},
            });
        });
    }


     $(document).ready(function(){
 $(".left_add").height($(window).height()-60); 
  $(".right_add").width($(window).width()-600);
   $(".right_add").height($(window).height()-60);
  $(".select").height($(window).height()-195); 
  $("#select_style").height($(window).height()-220); 
 //当文档窗口发生改变时 触发  
    $(window).resize(function(){
		  $(".right_add").width($(window).width()-600); 
		 $(".left_add").height($(window).height()-60);
		 $(".right_add").height($(window).height()-60); 
		 $(".select").height($(window).height()-195); 
		$("#select_style").height($(window).height()-220); 
	});
	 })
	function checkLength(which) {
	var maxChars = 500;
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; // 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}
//下拉框交换JQuery
$(function(){
    //移到右边
    $('#add').click(function() {
    //获取选中的选项，删除并追加给对方
        $('#select1 option:selected').appendTo('#select2');
    });
    //移到左边
    $('#remove').click(function() {
        $('#select2 option:selected').appendTo('#select1');
    });
    //全部移到右边
    $('#add_all').click(function() {
        //获取全部的选项,删除并追加给对方
        $('#select1 option').appendTo('#select2');
    });
    //全部移到左边
    $('#remove_all').click(function() {
        $('#select2 option').appendTo('#select1');
    });
    //双击选项
    $('#select1').dblclick(function(){ //绑定双击事件
        //获取全部的选项,删除并追加给对方
        $("option:selected",this).appendTo('#select2'); //追加给对方
    });
    //双击选项
    $('#select2').dblclick(function(){
       $("option:selected",this).appendTo('#select1');
    });
});
		var user=[{"id": 1, "name": "贝德玛（Bioderma）温和卸妆水净妍/舒妍洁肤液卸妆水 ","status":"关闭"},
              {"id": 2, "name": "欧诗漫 OSM 奢华金萃臻贵娇宠礼盒","status":"关闭"},
              {"id": 3, "name": "舒蕾洗发水奢养精油套装","status":"关闭"},
              {"id": 4, "name": "雅芳小黑裙香体乳150g","status":"关闭"},
              {"id": 5, "name": "嘉媚乐（CAMENAE）玫瑰之爱保","status":"启用"},
              {"id": 6, "name": "欧莱雅男士护肤套装 劲能极速活肤液50ml","status":"启用"},
              {"id": 7, "name": "美即 面膜 净透亮肤套装面膜贴升级版","status":"启用"},
              {"id": 8, "name": "可悠然（KUYURA）美肌沐浴露（欣怡幽香）550ml ","status":"启用"},
              {"id": 9, "name": "李施德林漱口水冰蓝口味500ml双包装","status":"启用"},
              {"id": 10, "name": "吕(Ryo)滋养韧发密集莹韧[滋润型]洗护套装 ","status":"启用"},
              {"id": 11, "name": "美宝莲（MAYBELLINE）气垫BB","status":"关闭"},
              {"id": 12, "name": "I'M CONCEALER我爱水润遮瑕液 #02 自然肤色","status":"启用"},
              {"id": 13, "name": "Apple iPhone 6s (A1700) 64G 玫瑰金色 移动联通电信4G手机","status":"启用"},
              {"id": 14, "name": "小米 Max 全网通 高配版 3GB内存 64GB ROM 金色 移动联通电信4G手机 ","status":"启用"},
              {"id": 15, "name": "OPPO R9 4GB+64GB内存版 玫瑰金 全网通4G手机 双卡双待","status":"启用"},
              {"id": 16, "name": "华为 P9 全网通 3GB+32GB版 流光金 移动联通电信4G手机 双卡双待 ","status":"启用"},
              {"id": 17, "name": "华为 Mate 8 3GB+32GB版 月光银 移动联通电信4G手机 双卡双待","status":"启用"},
              {"id": 18, "name": "努比亚(nubia)【3+64GB】小牛5 Z11mini 白色 移动联通电信4G手机 双卡双待","status":"启用"},
              {"id": 19, "name": "三星 Galaxy A9 (SM-A9100) 魔幻金 全网通4G手机 双卡双待 ","status":"启用"},
              {"id": 20, "name": "华为 畅享5 梦幻金 移动联通电信4G手机 双卡双待","status":"关闭"}];
     $(document).ready(function(){
        var seach=$("#seach");
		
		seach.keyup(function(event){
		//获取当前文本框的值
        var seachText=$("#seach").val();
		 var product="<div class='title_name'>产品名称</div><select multiple='multiple' id='select1' class='select'>";
		  if(seachText!=""){			 
			  $.each(user,function(id, item){				     				    
                     //如果包含则为select赋值
                     if(item.name.indexOf(seachText)!=-1 && item.status.indexOf(seachText)!=-1 ){
                        product+="<option value="+item.id+">"+"("+item.status+")"+item.name+"</option>";
                     }
                  })								  
				  $("#select_style").html(product);
			  }
			  else{					 
				  $.each(user,function(id, item){
					name = item.name; 
					status= item.status;
				   product+="<option value="+item.id+">"+"("+item.status+")"+item.name+"</option>";				   
				  })
                  $("#select_style").html(product);
               }
			   product+"</select>";
		}) ;
					
			  var product="<div class='title_name'>产品名称</div>";
				
				 product+="<select multiple='multiple' id='select1' class='select'";
				  $.each(user,function(id, item){
					name = item.name;  
					status= item.status;
				   product+="<option value="+item.id+" title="+item.name+">"+"("+item.status+")"+item.name+"</option>";
				   
				  })
				  product+"</select>";
                  $("#select_style").html(product);
			
		      
				 
		         
	})
</script>
<script type="text/javascript">
function updateProgress(file) {
	$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
	$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
	if(parseInt(file.percentUploaded) == 100) {
		// 如果上传完成了
		$('.progress-box').hide();
	}
}

function initProgress() {
	$('.progress-box').show();
	$('.progress-box .progress-bar > div').css('width', '0%');
	$('.progress-box .progress-num > b').html('0%');
}

function successAction(fileInfo) {
	var up_path = fileInfo.path;
	var up_width = fileInfo.width;
	var up_height = fileInfo.height;
	var _up_width,_up_height;
	if(up_width > 120) {
		_up_width = 120;
		_up_height = _up_width*up_height/up_width;
	}
	$(".logobox .resizebox").css({width: _up_width, height: _up_height});
	$(".logobox .resizebox > img").attr('src', up_path);
	$(".logobox .resizebox > img").attr('width', _up_width);
	$(".logobox .resizebox > img").attr('height', _up_height);
}

var swfImageUpload;
$(document).ready(function() {
	var settings = {
		flash_url : "/admin/Widget/swfupload/swfupload.swf",
		flash9_url : "/admin/Widget/swfupload/swfupload_fp9.swf",
		upload_url: "{{url('/service/upload')}}",// 接受上传的地址
		file_size_limit : "5MB",// 文件大小限制
		file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
		file_types_description : "图片",// 说明，自己定义
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {},
		debug: false,
		// Button settings
		button_image_url: "/admin/Widget/swfupload/upload-btn.png",
		button_width: "95",
		button_height: "30 ",
		button_placeholder_id: 'uploadBtnHolder',
		button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor : SWFUpload.CURSOR.HAND,
		button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
		
		moving_average_history_size: 40,
		
		// The event handler functions are defined in handlers.js
		swfupload_preload_handler : preLoad,
		swfupload_load_failed_handler : loadFailed,
		file_queued_handler : fileQueued,
		file_dialog_complete_handler: fileDialogComplete,
		upload_start_handler : function (file) {
            // console.log(file);
			initProgress();
			updateProgress(file);
		},
		upload_progress_handler : function(file, bytesComplete, bytesTotal) {
            // console.log(file);
			updateProgress(file);
		},
		upload_success_handler : function(file, data, response) {
			// 上传成功后处理函数
            console.log(data);
			var fileInfo = eval("(" + data + ")");
			console.log(fileInfo);
            document.getElementById("image").src='/'+fileInfo.url;
			successAction(fileInfo);
		},
		upload_error_handler : function(file, errorCode, message) {
			alert('上传发生了错误！');
		},
		file_queue_error_handler : function(file, errorCode, message) {
			if(errorCode == -110) {
				alert('您选择的文件太大了。');	
			}
		}
	};
	swfImageUpload = new SWFUpload(settings);
});
</script>
