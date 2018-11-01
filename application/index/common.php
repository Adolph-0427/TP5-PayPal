<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2018/10/22
 * Time: 14:31
 */

function ajax_return($code, $message = '', $data = array())
{

    if (!is_numeric($code)) {
        return 'code 必须为数字';
    }
    if (empty($message)) {
        return 'message 不能为空';
    }
    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data
    ];
    return json($result);
}


function curl($url)
{
    if (empty($url)) {
        return 'URL 不能为空';
    }
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    return $output;
}


function pay_logs($filename, $data)
{
    file_put_contents('../log/' . $filename, date('Y-m-d H:i:s') . '-' . $data . PHP_EOL, FILE_APPEND);
}

