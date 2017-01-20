/**
*  form-ui.css for form-ui.js
*	美化表单样式
*	2015-06-14
*   @author lanyue
*   QQ:1752295326;
**/
$(document).ready(function(){
	/*----------------------radio-------------------------*/
	var radioInput=$("input[type='radio'][class^='form-ui-radio']");
	var radiolength=radioInput.length;
	radioInput.wrap("<div class='radio-ui'></div>");
	$(".radio-ui").append("<div class='radio-checked'></div>");
	$(".radio-ui").wrap("<label type='radio' class='form-radio-ui' for=''></label>");
	for(var i=0;i<radiolength;i++){
		var title=$("label input[type='radio'][class^='form-ui-radio']")[i]["title"];
		var id=$("label input[type='radio'][class^='form-ui-radio']")[i]["id"];
		$("label[type='radio']").eq(i).attr("for",id);
		$("label[type='radio']").eq(i).append("<div class='radio-title'>"+title+"</div>");
	}
	
	/*----------------checkbox---------------------*/
	var checkboxInput=$("input[type='checkbox'][class^='form-ui-checkbox']");
	var checkboxlength=checkboxInput.length;
	checkboxInput.wrap("<div class='checkbox-ui'></div>");
	$(".checkbox-ui").append("<div class='checkbox-checked'></div>");
	$(".checkbox-ui").wrap("<label type='checkbox' class='form-checkbox-ui' for=''></label>");
	for(var i=0;i<checkboxlength;i++){
		var title=$("label input[type='checkbox'][class^='form-ui-checkbox']")[i]["title"];
		var id=$("label input[type='checkbox'][class^='form-ui-checkbox']")[i]["id"];
		var label=$("label[type='checkbox'][class^='form-checkbox-ui']");
		label.eq(i).attr("for",id);
		label.eq(i).append("<div class='checkbox-title'>"+title+"</div>");
	}
	/*----------------------choose---------------------*/
	//var checkboxInput=$("input[type='checkbox'][class^='form-ui-choose']");
	var checkboxInput=$("input[class^='form-ui-choose']");
	var checkboxlength=checkboxInput.length;
	checkboxInput.wrap("<div class='choose-ui'></div>");
	$(".choose-ui").append("<div class='choose-checked'><div class='select'></div></div>");
	$(".choose-ui").wrap("<label type='choose' class='form-choose-ui' for=''></label>");
	for(var i=0;i<checkboxlength;i++){
		//var input=$("label input[type='checkbox'][class^='form-ui-choose']");
		var input=$("label input[class^='form-ui-choose']");
		var title=input[i]["title"];
		var id=input[i]["id"];
		var json={};
		//var jsonstr=$("label input[type='checkbox'][class^='form-ui-choose']").eq(i).attr("data-type");
		var jsonstr=$("label input[class^='form-ui-choose']").eq(i).attr("data-style");

		if(jsonstr){
			json=JSON.parse(jsonstr.replace(/\'/g,"\""));
		}
		json["color"]=json["color"]||"#02B742";
		json["width"]=json["width"]||"60";
		json["height"]=json["height"]+"px"||"30px";
		var label=$("label[type='choose'][class^='form-choose-ui']");
		label.eq(i).attr("for",id);
		label.eq(i).append("<div class='choose-title'>"+title+"</div>");
		label.eq(i).css({
			"width":json["width"],
			"height":json["height"],
		});
		label.eq(i).children(".choose-title").css({
			"line-height":json["height"],
		});
		label.eq(i).children(".choose-ui").children(".choose-checked").css({
			"border-top": "7px solid transparent",
			"border-left": "7px solid transparent",
			"border-right": "7px solid "+json["color"],
			"border-bottom": "7px solid "+json["color"],
		});
		//初始化时默认选中样式
		if(input.eq(i).is(":checked")==true){
			label.eq(i).css({
				"border":"solid 1px "+json["color"],
			});
		}
	}
	//边框颜色改变实现
	$("label[class^='form-choose-ui'] .choose-ui").click(function(){
		var input=$(this).children("input[class='form-ui-choose']");
		var colortmp=$(this).children(".choose-checked").css("borderRightColor");
		if(input.is(":checked")==true){
			$(this).parent().css({
				"border":"solid 1px "+colortmp,
			});
		}else{
			$(this).parent().css({
				"border":"solid 1px #D3D3D3",
			});
		}
		
	});
	/*---------------------switch----------------------*/
	var switchInput=$("input[type='hidden'][class^='form-ui-switch']");
	var switchlength=switchInput.length;

	switchInput.wrap("<div class='form-switch-ui'></div>");
	$(".form-switch-ui").append("<div class='switch-ui'></div>");
	$(".form-switch-ui").each(function(e){
		var value=$(this).children("input[type='hidden'][class^='form-ui-switch']");
		if(!value.val()){
			value.val(0);
		}
		if(value.val()==1){
			$(this).children("[class^='switch-ui']").css({"left":20},100);
			$(this).children("[class^='switch-ui']").attr("class","switch-ui on");
		}else{
			$(this).children("[class^='switch-ui']").css({"left":0},100);
			$(this).children("[class^='switch-ui']").attr("class","switch-ui off");
		}
	});
	$(".form-switch-ui").click(function(){
		var value=$(this).children("input[type='hidden'][class^='form-ui-switch']");
		if(value.val()==0){
			$(this).children("[class^='switch-ui']").animate({"left":20},100);
			$(this).children("[class^='switch-ui']").attr("class","switch-ui on");
			value.val(1);
		}else{
			$(this).children("[class^='switch-ui']").animate({"left":0},100);
			$(this).children("[class^='switch-ui']").attr("class","switch-ui off");
			value.val(0);
		}
		
	});
	/*--------------------text------------------------*/
	var textInput=$("input[type='text'][class$='form-ui-text']");
	var textlength=textInput.length;
	textInput.wrap("<div class='form-text-ui'></div>");
	$(".form-text-ui").each(function(e){
		var input=$(this).children("input[type='text'][class$='form-ui-text']");
		input.after("<div class='text-title'>"+input.attr("title")+"</div>");
		//$(this).prepend("<div class='text-title'>"+title+"</div>");
	});

	/*-------------------select-----------------------------*/
	var select=$("select[class^='form-ui-select']");
	var selectlength=select.length;
	select.wrap("<div class='form-select-ui'></div>");
	$("div[class^='form-select-ui']").each(function(e){
		selected=$(this).children("select").children("option:selected");
		$(this).append('<div class="select-ui-selected">'+selected.html()+'</div>');
		$(this).append('<div class="select-ui-button"></div>');
		var options='<div class="select-ui-options">';
		$(this).children("select").children("option").each(function(i){
			if(selected.index()==i){
				options+='<span class="option selected">'+$(this).html()+'</span>';
			}else{
				options+='<span class="option">'+$(this).html()+'</span>';
			}
		});
		options+='</div>';
		$(this).append(options);
		//显示隐藏选项
		$(this).click(function(){
			var button=$(this).children(".select-ui-button");
			var optionbox=$(this).children(".select-ui-options");
			if(optionbox.css("display")=="none"){
				button.css({
					"-webkit-transform":"rotate(-90deg)",
					"-moz-transform":"rotate(-90deg)",
					"-ms-transform":"rotate(-90deg)",
					"-o-transform":"rotate(-90deg)",
					"transform":"rotate(-90deg)",
				});
				optionbox.show();
			}else{
				button.css({
					"-webkit-transform":"rotate(0deg)",
					"-moz-transform":"rotate(0deg)",
					"-ms-transform":"rotate(0deg)",
					"-o-transform":"rotate(0deg)",
					"transform":"rotate(0deg)",
				});
				optionbox.hide();
			}
		});
		//实现选择
		$(this).children(".select-ui-options").children(".option").click(function(){
			var selected=$(this);
			var select=$(this).parent(".select-ui-options").siblings(".form-ui-select").children("option");
			$(this).parent(".select-ui-options").siblings(".select-ui-selected").html($(this).html());
			$(this).parent(".select-ui-options").children(".option").each(function(i){
				if(i==selected.index()){
					select.eq(i).attr("selected",true);
					$(this).attr("class","option selected");
				}else{
					select.eq(i).attr("selected",false)
					$(this).attr("class","option");
				}
			});
		});
	});

});