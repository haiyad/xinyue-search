<?php /*a:5:{s:72:"D:\project\github\xinyue-search\public/views\qfadmin\source\deposit.html";i:1772523196;s:71:"D:\project\github\xinyue-search\public/views\qfadmin\common\header.html";i:1772439894;s:69:"D:\project\github\xinyue-search\public/views\qfadmin\common\menu.html";i:1772387193;s:71:"D:\project\github\xinyue-search\public/views\qfadmin\common\footer.html";i:1772387193;s:72:"D:\project\github\xinyue-search\public/views\qfadmin\component\view.html";i:1772387193;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlentities($node['node_title']); ?></title>
    <style>
        textarea {
            height: 300px;
        }
    </style>
    <meta charset="UTF-8">
<!-- import CSS -->
<link rel="stylesheet" href="/static/admin/css/element.css">
<link rel="stylesheet" href="/static/admin/css/YAdmin.css">
</head>

<body>
    <div id="app" v-cloak>
        <el-container>
            <el-header>
                <el-col style="width: auto;">
                    <el-menu class="el-menu-vertical" text-color="#333333" :default-active="'<?php if($node['node_pid']): ?><?php echo htmlentities($node['node_pid']); else: ?><?php echo htmlentities($node['node_id']); ?><?php endif; ?>'" unique-opened
                        style="border:none;" mode="horizontal" active-text-color="#333333">
                        <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if(count($item['subList'])>0): if(count($item['subList'][0]['subList'])>0): ?>
                        <el-menu-item index="<?php echo htmlentities($item['node_id']); ?>"
                            onclick="location.href='/<?php echo htmlentities($item['subList'][0]['subList'][0]['node_module']); ?>/<?php echo htmlentities($item['subList'][0]['subList'][0]['node_controller']); ?>/<?php echo htmlentities($item['subList'][0]['subList'][0]['node_action']); ?>';"
                            <?php if($menu==$item['node_id']): ?>class="is-active" <?php endif; ?>>
                            <i class="<?php echo htmlentities($item['node_icon']); ?>"></i> <?php echo htmlentities($item['node_title']); ?>
                        </el-menu-item>
                        <?php else: ?>
                        <el-menu-item index="<?php echo htmlentities($item['node_id']); ?>"
                            onclick="location.href='/<?php echo htmlentities($item['subList'][0]['node_module']); ?>/<?php echo htmlentities($item['subList'][0]['node_controller']); ?>/<?php echo htmlentities($item['subList'][0]['node_action']); ?>';" <?php if($menu==$item['node_id']): ?>class="is-active" <?php endif; ?>>
                            <i class="<?php echo htmlentities($item['node_icon']); ?>"></i> <?php echo htmlentities($item['node_title']); ?>
                        </el-menu-item>
                        <?php endif; else: if(count($item['subList'])>0 || $item['node_controller']=='index'): ?>
                            <el-menu-item index="<?php echo htmlentities($item['node_id']); ?>"
                                onclick="location.href='/<?php echo htmlentities($item['node_module']); ?>/<?php echo htmlentities($item['node_controller']); ?>/<?php echo htmlentities($item['node_action']); ?>';" <?php if($menu==$item['node_id']): ?>class="is-active" <?php endif; ?>>
                                <i class="<?php echo htmlentities($item['node_icon']); ?>"></i> <?php echo htmlentities($item['node_title']); ?>
                            </el-menu-item>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </el-menu>
                </el-col>

                <el-col style="width: 240px;float: right;">
                    <span class="topArea">
                        <el-link :underline="false" class="el-icon-full-screen menuicon" onclick="requestFullScreen()"></el-link>
                        <!-- <el-link :underline="false" class="el-icon-brush menuicon"></el-link> -->
                        <el-dropdown>
                            <el-link :underline="false">&nbsp;<?php echo htmlentities($adminInfo['admin_account']); ?><i class="el-icon-arrow-down"></i></el-link>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item onclick="location.href='/qfadmin/admin/updatemyinfo';">修改资料
                                </el-dropdown-item>
                                <el-dropdown-item onclick="location.href='/qfadmin/admin/motifypassword';">修改密码
                                </el-dropdown-item>
                                <el-dropdown-item onclick="location.href='/qfadmin/system/clean';">清除缓存
                                </el-dropdown-item>
                                <el-dropdown-item  onclick="logout()">退出登录</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </span>
                </el-col>
            </el-header>
            <el-container class="body">
                <?php if($menuLists): ?>
<el-aside width="160px">
    <a class="titlehome" href="/qfadmin" style="display: block;height: 62px;line-height: 62px;text-align: center;"><img
            src="/static/admin/images/logo.png" width="40px" style="vertical-align: middle;" /></a>
    <el-menu class="el-menu-vertical-demo" text-color="#333333" default-active="'<?php echo htmlentities($node['node_pid']); ?>-<?php echo htmlentities($node['node_id']); ?>'"
        :collapse="false" :default-openeds="['<?php echo htmlentities($node['node_pid']); ?>']">
        <?php if(is_array($menuLists) || $menuLists instanceof \think\Collection || $menuLists instanceof \think\Paginator): $i = 0; $__LIST__ = $menuLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if(count($item['subList'])>0): ?>
        <el-submenu index="<?php echo htmlentities($item['node_id']); ?>">
            <template slot="title">
                <i <?php if($item['node_icon']): ?>class="<?php echo htmlentities($item['node_icon']); ?>" <?php else: ?>class="el-icon-menu" <?php endif; ?>></i>
                <?php echo htmlentities($item['node_title']); ?>
            </template>
            <?php if(is_array($item['subList']) || $item['subList'] instanceof \think\Collection || $item['subList'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['subList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subItem): $mod = ($i % 2 );++$i;?>
            <el-menu-item
                onclick="location.href='/<?php echo htmlentities($subItem['node_module']); ?>/<?php echo htmlentities($subItem['node_controller']); ?>/<?php echo htmlentities($subItem['node_action']); ?>';"
                index="<?php echo htmlentities($item['node_id']); ?>-<?php echo htmlentities($subItem['node_id']); ?>" <?php if($subItem['node_controller']==strtolower($controller) && $subItem['node_action']==strtolower($action)): ?>class="is-active" <?php endif; ?>><?php echo htmlentities($subItem['node_title']); ?></el-menu-item>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </el-submenu>
        <?php else: if($item['node_controller']=='' && $item['node_action']==''): ?>
        <el-menu-item index="<?php echo htmlentities($item['node_id']); ?>" onclick="testalert('暂无该功能')">
            <i <?php if($item['node_icon']): ?>class="<?php echo htmlentities($item['node_icon']); ?>" <?php else: ?>class="el-icon-menu" <?php endif; ?>></i>
            <?php echo htmlentities($item['node_title']); ?>
        </el-menu-item>
        <?php else: ?>
        <el-menu-item index="<?php echo htmlentities($item['node_id']); ?>"
            onclick="location.href='/<?php echo htmlentities($item['node_module']); ?>/<?php echo htmlentities($item['node_controller']); ?>/<?php echo htmlentities($item['node_action']); ?>';" <?php if($item['node_controller']==strtolower($controller) && $item['node_action']==strtolower($action)): ?>class="is-active" <?php endif; ?>>
            <i <?php if($item['node_icon']): ?>class="<?php echo htmlentities($item['node_icon']); ?>" <?php else: ?>class="el-icon-menu" <?php endif; ?>></i>
            <?php echo htmlentities($item['node_title']); ?>
        </el-menu-item>
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div style="height: 120px;"></div>
    </el-menu>
    <div class="version">资源管理系统<br> Version 3.6</div>
</el-aside>
<?php else: ?>
<div
    style="position: absolute;top: -72px;left: 0;width: 160px;background-color: #ffffff;box-shadow: 0 0 12px 0 rgb(47 75 168 / 6%);border-radius: 12px;">
    <a class="title" href="/admin" style="display: block;height: 62px;line-height: 62px;text-align: center;"><img
            src="/static/admin/images/logo.png" width="40px" style="vertical-align: middle;" /></a>
</div>
<?php endif; ?>
                <el-main>
    <el-card class="box-card" shadow="never">
        <el-tabs v-model="activeName">
            <el-tab-pane label="夸克网盘" name="0">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>夸克网盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置cookie">
                                <el-input style="width: 100%;" v-model="form.quark_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(0)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">cookie修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.quark_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.quark_file" :props="quark_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.quark_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.quark_file_time" :props="quark_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="阿里云盘" name="1">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>阿里云盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置Token">
                                <el-input style="width: 100%;" v-model="form.Authorization" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(1)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">token修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.ali_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.ali_file" :props="ali_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.ali_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.ali_file_time" :props="ali_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                        <p>Tips：转存目录不能为空，为空将无法转存; <font color=orangered>阿里网盘禁止香港及海外服务器调用分享接口</font>
                        </p>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="百度网盘" name="2">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>百度网盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置cookie">
                                <el-input style="width: 100%;" v-model="form.baidu_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(2)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">cookie修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%;" v-model="form.baidu_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.baidu_file" :props="baidu_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%;" v-model="form.baidu_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.baidu_file_time" :props="baidu_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="UC网盘" name="3">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>UC网盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置cookie">
                                <el-input style="width: 100%;" v-model="form.uc_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(3)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">cookie修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.uc_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.uc_file" :props="uc_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.uc_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.uc_file_time" :props="uc_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="迅雷云盘" name="4">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>迅雷云盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置refresh_token">
                                <el-input style="width: 100%;" v-model="form.xunlei_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(4)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">refresh_token修改后，请保存后再选择转存目录和检测，如何获取看文档吧</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.xunlei_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.xunlei_file" :props="xunlei_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.xunlei_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.xunlei_file_time" :props="xunlei_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="天翼网盘" name="7">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>天翼网盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置cookie">
                                <el-input style="width: 100%;" v-model="form.tianyi_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(7)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">cookie修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.tianyi_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.tianyi_file" :props="tianyi_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.tianyi_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.tianyi_file_time" :props="tianyi_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
            <el-tab-pane label="移动网盘" name="8">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>移动网盘</span>
                    </div>
                    <div style="font-size:14px;color:#666;">
                        <el-form :model="form">
                            <el-form-item label="设置cookie">
                                <el-input style="width: 100%;" v-model="form.yidong_cookie" placeholder="请输入">
                                    <el-button slot="prepend" @click="getFile(8)">账号检测</el-button>
                                </el-input>
                                <span class="f_tips">cookie修改后，请保存后再选择转存目录和检测</span>
                            </el-form-item>
                            <el-form-item label="默认转存目录">
                                <el-input style="width: 100%" v-model="form.yidong_file" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.yidong_file" :props="yidong_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="临时资源目录">
                                <el-input style="width: 100%" v-model="form.yidong_file_time" placeholder="请输入或选择">
                                    <div slot="prepend" style="position: relative;">
                                        <p>请选择</p>
                                        <el-cascader style="opacity: 0; height: 38px; position: absolute;inset: 0;"
                                            v-model="form.yidong_file_time" :props="yidong_props"></el-cascader>
                                    </div>
                                </el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">保存</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </el-tab-pane>
        </el-tabs>
    </el-card>
    </el-main>
</el-container>
</el-container>
<Uploads ref="upload"></Uploads>
<Goodslists ref="goodslist"></Goodslists>
</div>
</body>
<template id="Upload">
    <el-dialog title="图片库" :visible.sync="visible" :modal-append-to-body='false' append-to-body :close-on-click-modal="false"
        width="725px">
        <div class="upload-boxs">
            <el-upload class="upload-right" action="/admin/attach/uploadImage" :on-success="handleUploadSuccess"
                :file-list="fileList" :show-file-list="false" :before-upload="beforeUpload" :data="postData"
                v-loading.fullscreen.lock="fullscreenLoading">
                <el-button size="small" type="primary" icon="el-icon-upload">上传图片</el-button>
            </el-upload>
        </div>
        <ul class="storage-list">
            <li :class="item.select?'active':''" v-for="(item, index) in dataList.data" :key="index" @click="select(index)">
                <el-image fit="contain" :src="item.attach_path"></el-image>
                <p>{{item.attach_name}}</p>
            </li>
        </ul>
        <p v-if="dataList.data&&dataList.data.length==0" style="text-align: center;">暂无资源</p>
        <el-pagination @current-change="changeCurrentPage" layout="prev, pager, next" :current-page="dataList.current_page"
            :page-count="dataList.last_page" hide-on-single-page background>
        </el-pagination>
        <div slot="footer" class="dialog-footer">
            <div style="float: left; font-size: 13px;">
                <span v-if="multiple">
                    当前已选 <span style="color: #F56C6C;">{{selectList.length+selected_num}}</span> 个，最多允许选择 <span
                        style="color: #F56C6C;">{{total_num}}</span> 个资源
                </span>
                <span v-else>当前已选 <span style="color: #F56C6C;">{{selectList.length}}</span> 个资源</span>
            </div>
            <el-button @click="visible = false" size="small">取消</el-button>
            <el-button type="primary" @click="save" size="small">确定</el-button>
        </div>
    </el-dialog>
</template>


<template id="Single">
    <div class="slectimg" v-if="multiple">
        <block v-if="value.length>0">
            <draggable v-model="value" chosenClass="chosen" forceFallback="true" animation="600" @start="onStart"
                @end="onEnd">
                <transition-group>
                    <div class="imgs" v-for="(v, s) in value" :key="s" style="cursor: all-scroll;">
                        <el-image fit="contain" :src="v" :preview-src-list="value" :z-index="s"></el-image>
                        <!-- <el-image fit="contain" :src="v" ></el-image> -->
                        <i class="close el-icon-error" @click="deles(s)"></i>
                    </div>
                </transition-group>
            </draggable>
        </block>
        <div class="noimg" @click="selectimg()">
            <i class="el-icon-plus"></i>
        </div>
    </div>
    <div class="slectimg" v-else>
        <div class="imgs" v-if="value.length>0">
            <el-image fit="contain" :src="value" :preview-src-list="[value]"></el-image>
            <i class="close el-icon-error" @click="deles()"></i>
        </div>
        <div class="noimg" v-else @click="selectimg()">
            <i class="el-icon-plus"></i>
        </div>
    </div>
</template>

<template id="Ueditor">
    <Ueditors v-model="value" ref="Ueditor" :config="config"></Ueditors>
</template>


<template id="skuforms">
    <div>
        <div style="padding-bottom: 10px;">
            <el-input style="width: 120px;" v-if="inputVisible" v-model="inputValue" ref="saveTagInput" size="small"
                @keyup.enter.native="handleInputConfirm" placeholder="回车确定">
            </el-input>
            <el-button v-else class="button-new-tag" size="small" @click="showInput" style="width: 120px;">+添加规格组</el-button>
        </div>
        <sku-form :source-attribute="sourceAttribute" :attribute.sync="attribute" :structure="structure" :sku.sync="sku"
            ref="skuForm"></sku-form>
    </div>
</template>


<template id="Goodslist">
    <el-dialog title="商品库" :before-close="handleClose" :visible.sync="visible" :modal-append-to-body='false' append-to-body
        :close-on-click-modal="false" width="900px">
        
        <el-form :inline="true">
            <div style="float:right">
                <el-form-item style="width:100px; margin-bottom: 0;">
                    <el-cascader v-model="search.classify" placeholder="商品分类" :options="categoryList" :props="cascaderProps"
                        style="width: 100%;" filterable clearable size="small" :show-all-levels="false">
                    </el-cascader>
                </el-form-item>
                <el-form-item style="margin-bottom: 0;">
                    <el-input placeholder="输入商品名称搜索" size="small" v-model="search.keyword" @keyup.enter.native="getList_search"
                        clearable @clear="getList_search"></el-input>
                </el-form-item>
                <el-form-item style="margin-bottom: 0;">
                    <el-button type="primary" icon="el-icon-search" size="small" @click="getList_search" plain>搜索
                    </el-button>
                    <el-button icon="el-icon-refresh-left" size="small" @click="getList_search(0)" plain>重置</el-button>
                </el-form-item>
            </div>
        </el-form>

        <el-table :data="dataList.data" ref="multipleTable" @selection-change="changeSelection" row-key="goods_id" reserve-selection="true" style="min-height: 425px;" v-loading="loading">
            <el-table-column align="center" type="selection" reserve-selection="true"  width="55"></el-table-column>

            <el-table-column label="商品" prop="goods_id" min-width="380">
                <template slot-scope="scope">
                    <el-image class="goods-image" style="width: 50px;height: 50px;" :src="scope.row.picture[0]" :preview-src-list="[scope.row.picture[0]]"
                        fit="contain" lazy></el-image>

                    <div class="goods-info cs-ml">
                        <p class="action" style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;">
                            <span :title="scope.row.goods_name" class="link">{{scope.row.goods_name}}</span>
                        </p>
                    </div>
                </template>
            </el-table-column>

            <el-table-column label="本店价" prop="goods_price">
                <template slot-scope="scope">
                    <div class="action">
                        <span class="goods-shop-price">{{scope.row.goods_price}}</span>
                    </div>
                </template>
            </el-table-column>

            <el-table-column label="库存" prop="stock_total">
                <template slot-scope="scope">
                    <div class="action">
                        <span>{{scope.row.stock_total}}</span>
                    </div>
                </template>
            </el-table-column>

        </el-table>

        <div slot="footer" class="dialog-footer">
            <p style="padding-bottom: 10px;">
                <el-pagination hide-on-single-page="true" layout="prev, pager, next" background :current-page="form.page" @current-change="changeCurrentPage" :page-size="5" :total="dataList.total">
                </el-pagination>
            </p>
            <p>
                <el-button @click="cancels" size="small">取消</el-button>
                <el-button type="primary" @click="save" size="small">确定</el-button>
            </p>
        </div>
    </el-dialog>
</template>
<script src="/static/admin/js/vue-2.6.10.min.js"></script>
<script src="/static/admin/js/axios.min.js"></script>
<script src="/static/admin/js/element.js"></script>
<script src="/static/admin/js/YAdmin.js"></script>
<script src="/static/admin/js/SkuForm.umd.js"></script>
<script src="/static/admin/UEditor/vue-ueditor-wrap.min.js"></script>
<script src="/static/admin/UEditor/ueditor.config.js"></script>
<script src="/static/admin/UEditor/ueditor.all.js"></script>
<script src="/static/admin/js/component.js"></script>
<script src="/static/admin/js/Sortable.min.js"></script>
<script src="/static/admin/js/vuedraggable.umd.min.js"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data() {
                return {
                    activeName: '0',
                    configKeys: ['quark_cookie', 'quark_file', 'quark_file_time', 'baidu_cookie', 'baidu_file', 'baidu_file_time', 'Authorization', 'ali_file', 'ali_file_time', 'uc_cookie', 'uc_file', 'uc_file_time', 'xunlei_cookie', 'xunlei_file', 'xunlei_file_time', 'tianyi_cookie', 'tianyi_file', 'tianyi_file_time', 'yidong_cookie', 'yidong_file', 'yidong_file_time'],
                    form: {
                        quark_file: ''
                    },
                    quark_files: [],
                    quark_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 0,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.fid,
                                                label: item.file_name,
                                                disabled: !item.dir,
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    baidu_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 2,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.path,
                                                label: item.server_filename,
                                                disabled: !item.isdir,
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    ali_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 1,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.file_id,
                                                label: item.name,
                                                disabled: item.type != 'folder',
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    uc_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 3,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.fid,
                                                label: item.file_name,
                                                disabled: !item.dir,
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    xunlei_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 4,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.id,
                                                label: item.name,
                                                disabled: item.kind !== 'drive#folder',
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    tianyi_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 7,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.id,
                                                label: item.fileName,
                                                disabled: !item.isFolder,
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                    yidong_props: {
                        lazy: true,
                        emitPath: false,
                        checkStrictly: true,
                        lazyLoad(node, resolve) {
                            const { level, value } = node;
                            let that = this;
                            axios.post('/admin/source/getFiles', Object.assign({
                                type: 8,
                                pdir_fid: value || 0
                            }, PostBase))
                                .then(function (res) {
                                    if (res.data.code == 200) {
                                        // 只显示文件夹
                                        const nodes = (res.data.data || [])
                                            .map(item => ({
                                                value: item.fileId,
                                                label: item.fileName,
                                                disabled: !item.isFolder,
                                            }));
                                        resolve(nodes);
                                    } else {
                                        resolve([]);
                                    }
                                })
                                .catch(function (error) {
                                    console.error(error);
                                    resolve([]);
                                });
                        }
                    },
                };
            },
            created() {
                this.getData();
            },
            methods: {
                getData() {
                    let that = this
                    axios.post('/admin/conf/getBaseConfig', Object.assign({}, PostBase))
                        .then(function (response) {
                            if (response.data.code == 200) {
                                for (let item of response.data.data) {
                                    if (that.configKeys.includes(item.conf_key)) {
                                        that.$set(that.form, item.conf_key, item.conf_value)
                                    }
                                }
                            } else {
                                that.$message.error(response.data.message);
                            }
                        })
                        .catch(function (error) {
                            that.$message.error('服务器内部错误');
                        });
                },
                onSubmit() {
                    let that = this
                    axios.post('/admin/conf/updateBaseConfig', Object.assign({}, PostBase, that.form))
                        .then(function (response) {
                            if (response.data.code == 200) {
                                that.$message({
                                    message: response.data.message,
                                    type: 'success'
                                });
                            } else {
                                that.$message.error(response.data.message);
                            }
                        })
                        .catch(function (error) {
                            that.$message.error('服务器内部错误');
                            console.log(error);
                        });
                },

                getFile(type) {
                    let that = this
                    axios.post('/admin/source/getFiles', Object.assign({
                        type
                    }, PostBase))
                        .then(function (res) {
                            if (res.data.code == 200) {
                                that.$message.success("已登录，cookie可用");
                            } else {
                                that.$message.error(res.data.message);
                            }
                        })
                        .catch(function (error) {
                            that.$message.error('服务器内部错误');
                            console.log(error);
                        });
                },
            }
        })
    </script>


</html>