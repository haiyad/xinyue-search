<?php

$pattern = '/https:\/\/\d{6}\.com\/s\/[a-zA-Z0-9-]+(\?提取码:[a-zA-Z0-9]+)?/';

$urls = [
    'https://123684.com/s/oec7Vv-61IWh?提取码:ZY4K',
    'https://123912.com/s/U8f2Td-X8OX?提取码:cRvH',
    'https://123865.com/s/u9izjv-mISWv',
    'https://123456.com/s/ABC123-xyz789?提取码:abc123',
];

echo "测试正则表达式: " . $pattern . "\n\n";

foreach ($urls as $url) {
    $text = "链接是: " . $url;
    if (preg_match($pattern, $text, $match)) {
        echo "✅ 匹配成功: " . $match[0] . "\n";
    } else {
        echo "❌ 匹配失败: " . $url . "\n";
    }
}

echo "\n测试JSON格式的文本:\n";
$jsonText = '{"url":"https://123684.com/s/oec7Vv-61IWh?提取码:ZY4K","title":"测试资源"}';
if (preg_match($pattern, $jsonText, $match)) {
    echo "✅ JSON匹配成功: " . $match[0] . "\n";
} else {
    echo "❌ JSON匹配失败\n";
}
