<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
  把用户输入的文本转义（主要针对特殊符号和emoji表情）
 */
function userTextEncode($str){
    if(!is_string($str))return $str;
    if(!$str || $str=='undefined')return '';

    $text = json_encode($str); //暴露出unicode
    $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i",function($str){
        return addslashes($str[0]);
    },$text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
    return json_decode($text);
}
/**
  解码上面的转义
 */
function userTextDecode($str){
    $text = json_encode($str); //暴露出unicode
    $text = preg_replace_callback('/\\\\\\\\/i',function($str){
        return '\\';
    },$text); //将两条斜杠变成一条，其他不动
    return json_decode($text);
}



/*
  对emoji进行转义
*/
function emoji2str($str){
    $strEncode = '';
 
    $length = mb_strlen($str,'utf-8');
 
    for ($i=0; $i < $length; $i++) {
        $_tmpStr = mb_substr($str,$i,1,'utf-8');
        if(strlen($_tmpStr) >= 4){
            $strEncode .= '[[EMOJI:'.rawurlencode($_tmpStr);
        }else{
            $strEncode .= $_tmpStr;
        }
    }
    return $strEncode;
}


/*
读数据后重新转换成emoji返回
*/
function str2emoji($str){
    $str_arr = explode("[[EMOJI:", $str);
    $new_str = "";
 
    foreach ($str_arr as $key => $val){
        $new_str .= $val;
    }
 
    return $new_str;
}


function utf8_to_unicode_str($utf8)
{
    $return = '';

    for ($i = 0; $i < mb_strlen($utf8); $i++) {

        $char = mb_substr($utf8, $i, 1);

        // 3字节是汉字，不转换，4字节才是 emoji
        if (strlen($char) > 3) {
            $char = trim(json_encode($char), '"');
        }
        $return .= $char;
    }
    return $return;
}