"use strict";
$(function(){
    //リロード対応用
    //checked=tureのものすべて取得
    $("#chkform :checked").each(function(){
        //checkboxのidを取得
        let isl = $(this).attr("id");
        //labelに対しスタイル追加
        $("label[for="+isl+"]").css({"font-weight":"bold","color":"red"});
    });
    //checkboxがクリックされたら…
    $("#chkform :checkbox").click(function() {
        //checkboxのidを取得
        let isl = $(this).attr("id");
        if($(this).attr('checked') == true) {
            //checked=tureであればスタイル追加
            $("label[for="+isl+"]").css({"font-weight":"bold","color":"red"});
        } else {
            //checked=tureでなければスタイルを空に
            $("label[for="+isl+"]").css({"font-weight":"","color":""});
        }
    });
});
