<?php /*a:5:{s:69:"D:\project\github\xinyue-search\public/views\qfadmin\admin\index.html";i:1772387193;s:71:"D:\project\github\xinyue-search\public/views\qfadmin\common\header.html";i:1772439894;s:69:"D:\project\github\xinyue-search\public/views\qfadmin\common\menu.html";i:1772387193;s:71:"D:\project\github\xinyue-search\public/views\qfadmin\common\footer.html";i:1772387193;s:72:"D:\project\github\xinyue-search\public/views\qfadmin\component\view.html";i:1772387193;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlentities($node['node_title']); ?></title>
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

    <el-form :inline="true">
        <el-form-item>
            <el-button icon="el-icon-plus" size="small" @click="clickAdd" plain>添加</el-button>
        </el-form-item>
        <el-form-item>
            <el-button icon="el-icon-delete" size="small" @click="postMultDelete" plain>批量删除</el-button>
        </el-form-item>
        <div style="float:right">
            <el-form-item>
                <el-select placeholder="请选择状态" size="small" v-model="search.admin_status">
                    <el-option value="" label="全部用户">
                    </el-option>
                    <el-option value="0" label="正常用户">
                    </el-option>
                    <el-option value="1" label="禁用用户">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item style="width:120px;">
                <el-select placeholder="筛选类别" size="small" v-model="search.filter">
                    <el-option value="admin_id" label="用户ID">
                    </el-option>
                    <el-option value="admin_name" label="用户昵称">
                    </el-option>
                    <el-option value="admin_account" label="用户帐号">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item>
                <el-input placeholder="输入关键词搜索" size="small" v-model="search.keyword"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" icon="el-icon-search" size="small" @click="getList_search" plain>搜索</el-button>
            </el-form-item>
        </div>
    </el-form>
    <el-table :data="dataList.data" @selection-change="changeSelection" v-loading="loading">
        <el-table-column type="selection" width="50">
        </el-table-column>
        <el-table-column prop="admin_id" label="ID" width="100">
        </el-table-column>
        <el-table-column prop="admin_account" label="帐号">
        </el-table-column>
        <el-table-column prop="admin_name" label="昵称">
        </el-table-column>
        <el-table-column prop="group_name" label="用户组">
        </el-table-column>
        <el-table-column prop="admin_ipreg" label="注册IP" width="150">
        </el-table-column>
        <el-table-column label="最后活跃" width="120">
            <template slot-scope="scope">
                {{time2string(scope.row.admin_updatetime)}}
            </template>
        </el-table-column>
        <el-table-column label="注册时间" width="120">
            <template slot-scope="scope">
                {{time2string(scope.row.admin_createtime)}}
            </template>
        </el-table-column>
        <el-table-column label="禁用" width="80">
            <template slot-scope="scope">
                <el-switch v-model="scope.row.admin_status==1?true:false" active-color="#ff4949"
                    @change="clickStatus(scope.row)">
                </el-switch>
            </template>
        </el-table-column>
        <el-table-column label="操作" width="180">
            <template slot-scope="scope">
                <el-link type="primary" @click="clickEdit(scope.row)" :underline="false">编辑</el-link>&nbsp;
                <el-link type="danger" @click="clickDelete(scope.row)" :underline="false">删除</el-link>
            </template>
        </el-table-column>

    </el-table>


    <div class="page">
        <el-pagination @size-change="handleSizeChange" :page-sizes="[10, 20, 50, 100,200,500]" :page-size="10"
            layout="total, sizes, prev, pager, next, jumper" background @current-change="changeCurrentPage"
            :current-page="dataList.current_page" :page-count="dataList.last_page" :total="dataList.total">
        </el-pagination>
    </div>



    <!-- 添加框 -->
    <el-dialog title="添加用户" :visible.sync="dialogFormAdd" :modal-append-to-body='false' append-to-body :close-on-click-modal='false'>
        <el-form :model="formAdd" status-icon :rules="rules" ref="formAdd">
            <el-form-item label="帐号" :label-width="formLabelWidth" prop="admin_account">
                <el-input size="medium" autocomplete="off" v-model="formAdd.admin_account"></el-input>
            </el-form-item>
            <el-form-item label="密码" :label-width="formLabelWidth" prop="admin_password">
                <el-input size="medium" show-password="true" autocomplete="off" v-model="formAdd.admin_password">
                </el-input>
            </el-form-item>
            <el-form-item label="昵称" :label-width="formLabelWidth" prop="admin_name">
                <el-input size="medium" autocomplete="off" v-model="formAdd.admin_name"></el-input>
            </el-form-item>
            <el-form-item label="邮箱" :label-width="formLabelWidth" prop="admin_email">
                <el-input size="medium" autocomplete="off" v-model="formAdd.admin_email"></el-input>
            </el-form-item>
            <el-form-item label="身份证" :label-width="formLabelWidth" prop="admin_idcard">
                <el-input size="medium" autocomplete="off" v-model="formAdd.admin_idcard"></el-input>
            </el-form-item>
            <el-form-item label="真实姓名" :label-width="formLabelWidth">
                <el-input size="medium" autocomplete="off" v-model="formAdd.admin_truename"></el-input>
            </el-form-item>
            <el-form-item label="用户组" :label-width="formLabelWidth">
                <el-select size="medium" placeholder="请选择用户组" v-model="formAdd.admin_group">
                    <el-option v-for="group_add in groupList" :value="group_add.group_id" :label="group_add.group_name">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
            <el-button type="primary" @click="postAdd">确认添加</el-button>
        </div>
    </el-dialog>
    <!-- 修改框 -->
    <el-dialog title="修改用户" :visible.sync="dialogFormEdit" :modal-append-to-body='false' append-to-body :close-on-click-modal='false'>
        <el-form :model="formEdit" status-icon :rules="rules" ref="formEdit">
            <el-form-item label="帐号" :label-width="formLabelWidth" prop="admin_account">
                <el-input size="medium" autocomplete="off" v-model="formEdit.admin_account"></el-input>
            </el-form-item>
            <el-form-item label="密码" :label-width="formLabelWidth" prop="new_password">
                <el-input size="medium" show-password="true" autocomplete="off" v-model="formEdit.new_password"
                    placeholder="不修改请留空">
                </el-input>
            </el-form-item>
            <el-form-item label="昵称" :label-width="formLabelWidth" prop="admin_name">
                <el-input size="medium" autocomplete="off" v-model="formEdit.admin_name"></el-input>
            </el-form-item>
            <el-form-item label="邮箱" :label-width="formLabelWidth" prop="admin_email">
                <el-input size="medium" autocomplete="off" v-model="formEdit.admin_email"></el-input>
            </el-form-item>
            <el-form-item label="身份证" :label-width="formLabelWidth" prop="admin_idcard">
                <el-input size="medium" autocomplete="off" v-model="formEdit.admin_idcard"></el-input>
            </el-form-item>
            <el-form-item label="真实姓名" :label-width="formLabelWidth">
                <el-input size="medium" autocomplete="off" v-model="formEdit.admin_truename"></el-input>
            </el-form-item>
            <el-form-item label="用户组" :label-width="formLabelWidth">
                <el-select size="medium" placeholder="请选择用户组" v-model="formEdit.admin_group">
                    <el-option v-for="group_edit in groupList" :value="group_edit.group_id"
                        :label="group_edit.group_name"></el-option>
                </el-select>
            </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
            <el-button type="primary" @click="postEdit">确认修改</el-button>
        </div>
    </el-dialog>

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
                this.getList();
                return {
                    search: {
                        admin_status: "",
                        keyword: "",
                        filter: "admin_id"
                    },
                    formLabelWidth: '80px',
                    dialogFormAdd: false,
                    dialogFormEdit: false,
                    loading: true,
                    dataList: [],
                    groupList: [],
                    selectList: [],
                    form: {
                        page: 1,
                        per_page: 10
                    },
                    formAdd: {
                        admin_group: 1
                    },
                    formEdit: {
                        admin_group: 1
                    },
                    rules: {
                        admin_account: [
                            { required: true, message: '帐号必须填写', trigger: 'blur' },
                        ],
                        admin_name: [
                            { required: true, message: '昵称必须填写', trigger: 'blur' },
                        ],
                        admin_password: [
                            { required: true, message: '密码必须填写', trigger: 'blur' },
                            // { required: true, pattern: /^(?=.*[a-z])(?=.*\d).{6,16}$/, message: '密码必须包含字母和数字(6-16位)', trigger: 'blur' },
                        ],
                        new_password: [
                            { required: true, message: '密码必须填写', trigger: 'blur' },
                            // { pattern: /^(?=.*[a-z])(?=.*\d).{6,16}$/, message: '密码必须包含字母和数字(6-16位)', trigger: 'blur' },
                        ],
                        admin_email: [
                            { pattern: /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/, message: '邮箱格式不正确', trigger: 'blur' },
                        ],
                        admin_idcard: [
                            { pattern: /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/, message: '身份证格式不正确', trigger: 'blur' },
                        ],
                    }
                }
            },
            methods: {
                getList_search() {
                    this.form.page = 1;
                    this.getList();
                },
                time2string(timestamps) {
                    var now = new Date(timestamps * 1000),
                        y = now.getFullYear(),
                        m = now.getMonth() + 1,
                        d = now.getDate();
                    // return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d) + " " + now.toTimeString().substr(0, 8);
                    return (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d) + " " + now.toTimeString().substr(0, 5);
                },
                handleSizeChange(per_page) {
                    this.form.per_page = per_page;
                    this.getList();
                },
                postMultDelete() {
                    var that = this;
                    if (that.selectList.length == 0) {
                        that.$message.error('未选择任何用户！');
                        return;
                    }
                    this.$confirm('即将删除选中的用户, 是否确认?', '批量删除', {
                        confirmButtonText: '删除',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        axios.post('/admin/admin/delete', Object.assign({}, PostBase, {
                            admin_id: that.selectList.join(",")
                        }))
                            .then(function (response) {
                                that.getList();
                                if (response.data.code == CODE_SUCCESS) {
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
                    }).catch(() => {
                    });
                },
                changeSelection(list) {
                    var that = this;
                    that.selectList = [];
                    for (var index in list) {
                        that.selectList.push(list[index].admin_id);
                    }
                },
                postEdit() {
                    var that = this;
                    that.$refs['formEdit'].validate((valid) => {
                        if (!valid) {
                            that.$message.error('仔细检查检查，是不是有个地方写得不对？');
                            return;
                        }
                        axios.post('/admin/admin/update', Object.assign({}, PostBase, that.formEdit))
                            .then(function (response) {
                                that.getList();
                                if (response.data.code == CODE_SUCCESS) {
                                    that.$message({
                                        message: response.data.message,
                                        type: 'success'
                                    });
                                    that.dialogFormEdit = false;
                                } else {
                                    that.$message.error(response.data.message);
                                }
                            })
                            .catch(function (error) {
                                that.$message.error('服务器内部错误');
                                console.log(error);
                            });
                    });
                },
                postAdd() {
                    var that = this;
                    that.$refs['formAdd'].validate((valid) => {
                        if (!valid) {
                            that.$message.error('仔细检查检查，是不是有个地方写得不对？');
                            return;
                        }
                        axios.post('/admin/admin/add', Object.assign({}, PostBase, that.formAdd))
                            .then(function (response) {
                                that.getList();
                                if (response.data.code == CODE_SUCCESS) {
                                    that.$message({
                                        message: response.data.message,
                                        type: 'success'
                                    });
                                    that.dialogFormAdd = false;
                                } else {
                                    that.$message.error(response.data.message);
                                }
                            })
                            .catch(function (error) {
                                that.$message.error('服务器内部错误');
                                console.log(error);
                            });
                    });
                },
                clickAdd() {
                    var that = this;
                    that.formAdd = {
                        admin_group: 1
                    };
                    axios.post('/admin/group/getList', Object.assign({}, PostBase))
                        .then(function (response) {
                            that.groupList = response.data.data;
                            if (response.data.code == CODE_SUCCESS) {
                                that.dialogFormAdd = true;
                            } else {
                                that.$message.error(response.data.message);
                            }
                        })
                        .catch(function (error) {
                            that.$message.error('服务器内部错误');
                            console.log(error);
                        });
                },
                clickDelete(row) {
                    var that = this;
                    this.$confirm('即将删除这个用户, 是否确认?', '删除提醒', {
                        confirmButtonText: '删除',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        axios.post('/admin/admin/delete', Object.assign({}, PostBase, {
                            admin_id: row.admin_id
                        }))
                            .then(function (response) {
                                that.getList();
                                if (response.data.code == CODE_SUCCESS) {
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
                    }).catch(() => {
                    });
                },
                clickStatus(row) {
                    var that = this;
                    axios.post(row.admin_status ? '/admin/admin/enable' : '/admin/admin/disable', Object.assign({}, PostBase, {
                        admin_id: row.admin_id
                    }))
                        .then(function (response) {
                            that.getList();
                            if (response.data.code == CODE_SUCCESS) {
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
                clickEdit(row) {
                    var that = this;
                    that.formEdit = row;
                    axios.post('/admin/group/getList', Object.assign({}, PostBase))
                        .then(function (response) {
                            if (response.data.code == CODE_SUCCESS) {
                                that.groupList = response.data.data;
                                axios.post('/admin/admin/detail', Object.assign({}, PostBase, {
                                    admin_id: row.admin_id
                                }))
                                    .then(function (response) {
                                        if (response.data.code == CODE_SUCCESS) {
                                            that.formEdit = response.data.data;
                                            that.dialogFormEdit = true;
                                        } else {
                                            that.$message.error(response.data.message);
                                        }
                                    })
                                    .catch(function (error) {
                                        that.$message.error('服务器内部错误');
                                        console.log(error);
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
                changeCurrentPage(page) {
                    this.form.page = page;
                    this.getList();
                },
                getList() {
                    var that = this;
                    that.loading = true;
                    axios.post('/admin/admin/getList', Object.assign({}, PostBase, that.form, that.search))
                        .then(function (response) {
                            that.loading = false;
                            if (response.data.code == CODE_SUCCESS) {
                                that.dataList = response.data.data;
                            } else {
                                that.$message.error(response.data.message);
                            }
                        })
                        .catch(function (error) {
                            that.loading = false;
                            that.$message.error('服务器内部错误');
                            console.log(error);
                        });
                },
            }
        })
    </script>


</html>