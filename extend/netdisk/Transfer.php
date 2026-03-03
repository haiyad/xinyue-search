<?php

namespace netdisk;

class Transfer
{
    public function __construct()
    {
        // 原 Open 类的构造函数内容
        $this->url = ""; // 资源地址
        $this->expired_type = 1; //有效期 1分享永久 2临时
        $this->ad_fid = ""; //夸克专用 - 分享时带上这个文件的fid
        $this->code = ""; //分享码
        $this->isType = 0; //0 转存并分享后的资源信息  1直接获取资源信息 
    }

    public function getFiles($type = 0, $pdir_fid = 0)
    {
        $panTypes = config('pan_types');
        
        $className = 'QuarkPan';
        foreach ($panTypes as $config) {
            if ($config['id'] == $type) {
                $className = $config['class_name'] ?? 'QuarkPan';
                break;
            }
        }
        
        $fullClassName = "\\netdisk\\pan\\$className";
        
        if (class_exists($fullClassName)) {
            $pan = new $fullClassName();
            return $pan->getFiles($pdir_fid);
        }
        
        $pan = new \netdisk\pan\QuarkPan();
        return $pan->getFiles($pdir_fid);
    }

    public function transfer($urlData = [])
    {
        $url = $urlData['url'] ?? '';
        $config = [
            'isType' => $urlData['isType'] ?? input('isType') ?? 0,
            'url' => $url,
            'code' => $urlData['code'] ?? input('code') ?? '',
            'expired_type' => $urlData['expired_type'] ?? input('expired_type') ?? 1,
            'ad_fid' => $urlData['ad_fid'] ?? input('ad_fid') ?? "",
            'stoken' => $urlData['stoken'] ?? '',
        ];

        if (strpos($url, '?entry=') !== false) {
            $entry = preg_match('/\?entry=([^&]+)/', $url, $matches) ? $matches[1] : '';
            $url = preg_match('/.*(?=\?entry=)/', $url, $matches) ? $matches[0] : '';
        }

        $substring = strstr($url, 's/');
        if ($substring !== false) {
            $pwd_id = substr($substring, 2);
        } else {
            return jerr2("资源地址格式有误");
        }

        $url_type = -1;
        $panTypes = config('pan_types');
        
        foreach ($panTypes as $panConfig) {
            $domains = $panConfig['domain'] ?? [];
            if (!is_array($domains)) {
                $domains = [$domains];
            }
            
            foreach ($domains as $domain) {
                if (strpos($url, $domain) !== false) {
                    $url_type = $panConfig['id'];
                    break 2;
                }
            }
        }

        $this->url = $url;

        $className = 'QuarkPan';
        foreach ($panTypes as $config) {
            if ($config['id'] == $url_type) {
                $className = $config['class_name'] ?? 'QuarkPan';
                break;
            }
        }
        $fullClassName = "\\netdisk\\pan\\$className";
        
        if (class_exists($fullClassName)) {
            $pan = new $fullClassName($config);
            return $pan->transfer(strtok($pwd_id, '#'));
        }
        
        return jerr2("资源地址格式有误");
    }


    public function deletepdirFid($type = 0, $filelist)
    {
        $panTypes = config('pan_types');
        
        $className = 'QuarkPan';
        foreach ($panTypes as $config) {
            if ($config['id'] == $type) {
                $className = $config['class_name'] ?? 'QuarkPan';
                break;
            }
        }
        $fullClassName = "\\netdisk\\pan\\$className";
        
        if (class_exists($fullClassName)) {
            $pan = new $fullClassName();
            return $pan->deletepdirFid($filelist);
        }
        
        $pan = new \netdisk\pan\QuarkPan();
        return $pan->deletepdirFid($filelist);
    }
}
