<?php /*a:5:{s:65:"D:\project\github\xinyue-search\public/views\index\news\list.html";i:1772591618;s:74:"D:\project\github\xinyue-search\public/views\index\news\common\header.html";i:1772387193;s:72:"D:\project\github\xinyue-search\public/views\index\news\common\head.html";i:1772520844;s:72:"D:\project\github\xinyue-search\public/views\index\news\common\foot.html";i:1772387193;s:74:"D:\project\github\xinyue-search\public/views\index\news\common\footer.html";i:1772522393;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php if(!(empty($config['app_icon']) || (($config['app_icon'] instanceof \think\Collection || $config['app_icon'] instanceof \think\Paginator ) && $config['app_icon']->isEmpty()))): ?>
    <link rel="icon" href="<?php echo htmlentities($config['app_icon']); ?>" />
    <?php endif; ?>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1.0">
    <title><?php echo htmlentities($seo_title); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($seo_keywords); ?>" />
    <meta name="description" content="<?php echo htmlentities($seo_description); ?>" />
    <meta name="referrer" content="no-referrer">
    <link rel="stylesheet" href="/views/index/news/common/static/css/index.min.css">
    <link rel="stylesheet" href="/views/index/news/common/static/css/app.css">
    <link rel="stylesheet" href="/views/index/news/common/static/css/m.css">
    
    <?php echo $config['seo_statistics']; ?>
    
    <style>
        :root {
            --theme-color: <?php echo htmlentities((isset($config['home_color']) && ($config['home_color'] !== '')?$config['home_color']:'#3e3e3e')); ?>;
            --theme-theme: <?php echo htmlentities((isset($config['home_theme']) && ($config['home_theme'] !== '')?$config['home_theme']:'#133ab3')); ?>;
            --theme-background: <?php echo htmlentities((isset($config['home_background']) && ($config['home_background'] !== '')?$config['home_background']:'#fafafa')); ?>;
            --theme-other_background: <?php echo htmlentities((isset($config['other_background']) && ($config['other_background'] !== '')?$config['other_background']:'#ffffff')); ?>;
        }
        <?php echo htmlentities($config['home_css']); ?>
    </style>
</head>

<body>
    <div class="headBg" style="background-image: url(<?php echo htmlentities($config['home_bg']); ?>);"></div>
    <div id="app" v-cloak>
        <div class="headerBox">
    <div class="bg" <?php if(!(empty($fixed) || (($fixed instanceof \think\Collection || $fixed instanceof \think\Paginator ) && $fixed->isEmpty()))): ?>:style="{ opacity: elementOpacity }" <?php endif; ?>></div>
    <div class="box">
        <a href="/" class="logoBox" <?php if(!(empty($fixed) || (($fixed instanceof \think\Collection || $fixed instanceof \think\Paginator ) && $fixed->isEmpty()))): ?>:style="{ opacity: elementOpacity }" <?php endif; ?>>
            <?php if(!(empty($config['logo']) || (($config['logo'] instanceof \think\Collection || $config['logo'] instanceof \think\Paginator ) && $config['logo']->isEmpty()))): ?>
            <img class="logo" src="<?php echo htmlentities($config['logo']); ?>" alt="<?php echo htmlentities($config['app_name']); ?>"></img>
            <?php endif; if($config['app_name'] && $config['app_name_hide']!=1): ?>
            <div class="title"><?php echo htmlentities($config['app_name']); ?></div>
            <?php endif; ?>
        </a>
        <div class="search" <?php if(!(empty($fixed) || (($fixed instanceof \think\Collection || $fixed instanceof \think\Paginator ) && $fixed->isEmpty()))): ?>:style="{ opacity: elementOpacity }" <?php endif; ?>>
            <input type="text" v-model="keyword" placeholder="输入关键字进行搜索" @keyup.enter="searchBtn" confirm-type="search"
                @confirm="searchBtn">
            <div class="btn" @click="searchBtn">
                <i class="iconfont icon-sousuo"></i>
            </div>
        </div>
        <div class="navs">
            <?php if(!(empty($config['qcode']) || (($config['qcode'] instanceof \think\Collection || $config['qcode'] instanceof \think\Paginator ) && $config['qcode']->isEmpty()))): ?>
            <div class="item" @click="qcodeVisible = true">加入群聊</div>
            <?php endif; if(empty($config['app_demand']) || (($config['app_demand'] instanceof \think\Collection || $config['app_demand'] instanceof \think\Paginator ) && $config['app_demand']->isEmpty())): ?>
            <div class="item" @click="layerVisible = true">提交需求</div>
            <?php endif; ?>
            <div class="btns" v-html="`<?php echo htmlentities($config['app_links']); ?>`"></div>

            <div class="iconfont icon-caidan" @click="drawer = true"></div>
        </div>
    </div>
</div>
<div class="headerKox"></div>


<el-dialog v-model="qcodeVisible" width="300">
    <img src="<?php echo htmlentities($config['qcode']); ?>" style="width: 100%" />
</el-dialog>

<el-dialog v-model="layerVisible" width="300">
    <div class="layerBox">
        <div class="vname">提交需求</div>
        <el-input v-model="content" placeholder="请输入你想看的资源信息~" type="textarea" resize='none'></el-input>
        <div class="vbtn" @click="saveBtn">提交</div>
    </div>
</el-dialog>

<el-dialog v-model="drawer" width="300" center>
    <div class="drawer">
        <?php if(!(empty($config['qcode']) || (($config['qcode'] instanceof \think\Collection || $config['qcode'] instanceof \think\Paginator ) && $config['qcode']->isEmpty()))): ?>
        <div class="item" @click="qcodeVisible = true">加入群聊</div>
        <?php endif; if(empty($config['app_demand']) || (($config['app_demand'] instanceof \think\Collection || $config['app_demand'] instanceof \think\Paginator ) && $config['app_demand']->isEmpty())): ?>
        <div class="item" @click="layerVisible = true">提交需求</div>
        <?php endif; ?>
        <div class="btns" v-html="`<?php echo htmlentities($config['app_links']); ?>`"></div>
    </div>
</el-dialog>

<el-dialog title="" v-model="dialogUrl" class="dialogUrlBox" :close-on-click-modal="false">
    <div v-loading="dialogLoading" class="dialogUrl" v-if="dialogUrl">
        <div v-if="dialogItem.showUrl">
            <block v-show="pc_type!=1">
                <div class="title">请使用 <span>{{panTypeMap[dialogItem.is_type] || '夸克APP'}}</span> 扫码获取</div>
                <div class="tips">打开{{panTypeMap[dialogItem.is_type] || '夸克'}}APP- 点击搜索框中的相机 - 点击扫码</div>
            </block>
                <div class="qrcode" id="qrcode"></div>
            </block>
            <div class="nav">
                <div class="item">
                    <span class="t">{{dialogItem.title}}</span>
                </div>
                <div class="item" v-show="pc_type!=2">
                    <span>资源地址：</span>
                    <a :href="dialogItem.showUrl" target="_blank" rel="noopener noreferrer">{{dialogItem.showUrl}}</a>
                </div>
            </div>
        </div>
        <div v-else-if="!dialogLoading">
            <div class="title">获取失败</div>
            <div class="tips" style="color: #FF3F3D;">{{dialogItem.message}}</div>
        </div>
        <div class="statement">
            <div class="content">
                <p>🔔 声明：本站链接均由程序自动收集自公开网盘，不存储、不传播任何文件，跳转链接指向网盘官网。</p>
                <p>文件内容请自行辨别，如发现违规请向网盘平台举报。本站仅供学习交流，无任何收费行为。</p>
            </div>
        </div>
    </div>
</el-dialog>
        <div class="searchBox searchList">
            <div class="search">
                <div class="select" @click="selectBtn" v-if="currentSource === 1">
                    <span>{{panTypeMap[is_type] || '夸克网盘'}}</span>
                    <i class="iconfont icon-xiala" style="font-size: 3vw"></i>
                </div>
                <div class="select" @click="selectBtn" v-else>
                    <?php if($category_id == ''): ?>全部<?php endif; foreach($category as $key=>$vo): if($category_id == $vo['id']): ?><?php echo htmlentities($vo['name']); ?><?php endif; ?>
                    <?php endforeach; ?>
                    <i class="iconfont icon-xiala" style="font-size: 3vw"></i>
                </div>
                <input type="text" v-model="keyword" placeholder="输入关键字进行搜索" @keyup.enter="searchBtn"
                    confirm-type="search" @confirm="searchBtn">
                <div class="btn" @click="searchBtn">
                    <i class="iconfont icon-sousuo"></i>
                </div>
            </div>
        </div>
        <div class="listBox">
            <div class="screen">
                <div class="fixed">
                    <h3>筛选</h3>
                    <div class="box" v-if="currentSource === 1">
                        <?php foreach($displayList as $item): ?>
                        <a href="javascript:;" :class="{active: is_type==<?php echo htmlentities($item['type']); ?>}" onclick="setType(<?php echo htmlentities($item['type']); ?>)">
                            <?php echo htmlentities($item['name']); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="box" v-else>
                        <a href="/s/<?php echo htmlentities($keyword); ?>.html" class="<?php if($category_id == ''): ?>active<?php endif; ?>">全部</a>
                        <?php foreach($category as $key=>$vo): ?>
                        <a href="/s/<?php echo htmlentities($keyword); ?>-1-<?php echo htmlentities($vo['id']); ?>.html"
                            class="<?php if($category_id == $vo['id']): ?>active<?php endif; ?>"><?php echo htmlentities($vo['name']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="left">
                <?php if($config['is_quan'] == 1): ?>
                <div class="source-switch">
                    <h3>切换搜索源：</h3>
                    <div class="switch-items">
                        <a href="javascript:;" onclick="switchSource(0)" :class="{active: currentSource==0}">本地搜</a>
                        <a href="javascript:;" onclick="switchSource(1)" :class="{active: currentSource==1}">全网搜</a>
                    </div>
                </div>
                <?php else: ?>
                <h3 v-if="total_result>0">为您找到【<span><?php echo htmlentities($keyword); ?></span>】相关资源<span>&nbsp;{{total_result}}&nbsp;</span>条
                </h3>
                <h3 v-else>为您找到【<span><?php echo htmlentities($keyword); ?></span>】相关资源<span>&nbsp;<?php echo htmlentities($list['total_result']); ?>&nbsp;</span>条</h3>
                <?php endif; ?>

                <div class="box" v-show="currentSource === 0">
                    <?php if($list['total_result']>0): if($config['is_quan'] == 1): ?>
                    <div class="Qbtn">
                        <div class="btn">
                            <p v-if="total_result>0">
                                为您找到【<span><?php echo htmlentities($keyword); ?></span>】相关资源<span>&nbsp;{{total_result}}&nbsp;</span>条</p>
                            <p v-else>为您找到【<span><?php echo htmlentities($keyword); ?></span>】相关资源<span>&nbsp;<?php echo htmlentities($list['total_result']); ?>&nbsp;</span>条
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="list">
                        <?php foreach($list['items'] as $key=>$vo): ?>
                        <div class="item">
                            <a href="javascript:;" onclick="linkBtn(this)" data-index="<?php echo htmlentities($key); ?>" class="title">
                                <?php echo $vo['name']; ?>
                            </a>
                            <!-- <div class="type cate">分类：<?php echo htmlentities((isset($vo['category']['name']) && ($vo['category']['name'] !== '')?$vo['category']['name']:'其它')); ?></div> -->
                            <div class="type time"><?php echo htmlentities($vo['times']); ?></div>
                            <div class="type">
                                <?php if(isset($panTypeMap[$vo['is_type']])): ?>
                                <span>来源：<?php echo htmlentities($panTypeMap[$vo['is_type']]); ?></span>
                                <?php else: ?>
                                <span>来源：夸克网盘</span>
                                <?php endif; if(!(empty($vo['code']) || (($vo['code'] instanceof \think\Collection || $vo['code'] instanceof \think\Paginator ) && $vo['code']->isEmpty()))): ?>
                                <span>提取码：<span><?php echo htmlentities($vo['code']); ?></span></span>
                                <?php endif; ?>
                            </div>
                            <div class="btns">
                                <div class="btn"
                                    @click.stop="copyText($event,'<?php echo htmlentities(trim($vo['title'])); ?>','<?php echo htmlentities($vo['url']); ?>','<?php echo htmlentities($vo['code']); ?>')"><i
                                        class="iconfont icon-fenxiang1"></i>复制分享</div>
                                <a href="/d/<?php echo htmlentities($vo['id']); ?>.html" class="btn"><i class="iconfont icon-fangwen"></i>查看详情</a>
                                <a href="javascript:;" onclick="linkBtn(this)" data-index="<?php echo htmlentities($key); ?>" class="btn">
                                    <img src="/views/index/news/common/static/images/<?php echo htmlentities($vo['is_type']); ?>.png" class="icon"
                                        alt="立即访问" />
                                    立即访问
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="page">
                        <?php if(!(empty($list['total_result']) || (($list['total_result'] instanceof \think\Collection || $list['total_result'] instanceof \think\Paginator ) && $list['total_result']->isEmpty()))): ?>
                        <el-pagination background layout="prev, pager, next" :pager-count="3"
                            :default-current-page="<?php echo htmlentities($page_no); ?>" :default-page-size="<?php echo htmlentities($page_size); ?>"
                            :total="<?php echo htmlentities($list['total_result']); ?>" @change="changeBtn"></el-pagination>
                        <?php endif; ?>
                    </div>
                    <?php else: if($blocked == 1): ?>
                    <div style="padding-top: 16px;">
                        <el-alert title="搜索词中包含违规内容，请修改后重试" style="padding: 12px 0; font-weight: bold;" type="error"
                            center :closable="false">
                        </el-alert>
                    </div>
                    <?php endif; ?>
                    <el-empty style="margin-top: 10%;" :image-size="200" image="<?php echo isset($config['search_bg']) ? htmlentities($config['search_bg']) : ''; ?>"
                        description="<?php echo htmlentities((isset($config['search_tips']) && ($config['search_tips'] !== '')?$config['search_tips']:'未找到，可换个关键词尝试哦~')); ?>">
                        <?php if($config['is_quan'] == 1): ?>
                        <div class="vtips" onclick="switchSource(1)">请尝试切换&nbsp;“<a
                                href="javascript:;">全网搜</a>”&nbsp;获取资源</div>
                        <?php endif; ?>
                    </el-empty>
                    <?php endif; ?>
                </div>

                <div class="Ebox" v-show="currentSource === 1">
                    <div class="Qloading" v-if="QLoading">
                        <div class="loader"></div>
                    </div>
                    <div class="Qbtn">
                        <div class="btn">
                            <p>为您找到【<span><?php echo htmlentities($keyword); ?></span>】相关资源<span>&nbsp;{{QList.length}}&nbsp;</span>条</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="item" v-for="(item,index) in QList" :key="index">
                            <a href="javascript:;" onclick="getUrlBtn(this)" :data-index="index" class="title">
                                {{item.title}}
                            </a>
                            <div class="type">
                                <span>来源：{{panTypeMap[item.is_type] || '夸克网盘'}}</span>
                            </div>
                            <div class="btns2" onclick="getUrlBtn(this)" :data-index="index">
                                获取资源
                            </div>
                        </div>
                    </div>

                    <block v-if="!QLoading && QList.length==0">
                        <?php if($blocked == 1): ?>
                        <div style="padding-top: 16px;">
                            <el-alert title="搜索词中包含违规内容，请修改后重试" style="padding: 12px 0; font-weight: bold;" type="error"
                                center :closable="false">
                            </el-alert>
                        </div>
                        <?php endif; ?>
                        <el-empty style="margin-top: 10%;" :image-size="200" image="<?php echo isset($config['search_bg']) ? htmlentities($config['search_bg']) : ''; ?>"
                            description="<?php echo htmlentities((isset($config['search_tips']) && ($config['search_tips'] !== '')?$config['search_tips']:'未找到，可换个关键词尝试哦~')); ?>">
                            <?php if($config['is_quan'] == 1): ?>
                            <div class="vtips" onclick="switchSource(0)">请尝试切换&nbsp;“<a
                                    href="javascript:;">本地搜</a>”&nbsp;获取资源</div>
                            <?php endif; ?>
                        </el-empty>
                    </block>
                </div>
            </div>
            <div class="right">
                <?php if(is_array($hotList) || $hotList instanceof \think\Collection || $hotList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="nav">
                    <?php if(!(empty($vo['image']) || (($vo['image'] instanceof \think\Collection || $vo['image'] instanceof \think\Paginator ) && $vo['image']->isEmpty()))): ?>
                    <img src="<?php echo htmlentities($vo['image']); ?>" alt="<?php echo htmlentities($vo['name']); ?>">
                    <?php endif; ?>
                    <?php echo htmlentities($vo['name']); ?>
                </div>
                <div class="box">
                    <div class="list">
                        <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['list']) ? array_slice($vo['list'],0,5, true) : $vo['list']->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
                        <a href="/s/<?php echo htmlentities($vos['title']); ?>.html" class="item">
                            <p>
                                <span><?php echo htmlentities($key+1); ?></span>
                                <?php echo htmlentities($vos['title']); ?>
                            </p>
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="footerBox">
    <div class="box">
        <p><?php echo $config['footer_dec']; ?></p>
        <p>
            <?php echo $config['footer_copyright']; ?>
            <a href="/sitemap.xml" target="_blank">网站地图</a>
        </p>
    </div>
</div>
    </div>
    <script src="/views/index/news/common/static/js/vue.global.min.js"></script>
<script src="/views/index/news/common/static/js/index.full.min.js"></script>
<script src="/views/index/news/common/static/js/axios.min.js"></script>
<script src="/views/index/news/common/static/js/qrcanvas@3.js"></script>
<script>
    const { createApp, ref, onMounted, onUnmounted } = Vue;
    const { ElButton, ElMessage  } = ElementPlus;
    const app = createApp({
        setup() {
            // 定义响应式数据
            const elementOpacity = ref(0);
            const scrollThreshold = ref(150); // 动态设置的滚动阈值
            const keyword = ref('<?php echo isset($keyword) ? htmlentities($keyword) : ''; ?>');
            const qcodeVisible = ref(false);
            const layerVisible = ref(false);
            const content = ref('');
            const load = ref(false)
            const drawer = ref(false)
            const rankList = ref([]);
            const rankDj = ref([]);
            const is_m = ref(0);
            const newList = ref([]);
            const QList = ref([]);
            const QLoading = ref(false);
            const total_result = ref(0);
            const currentSource = ref(0);
            const dialogUrl = ref(false);
            const dialogLoading = ref(false);
            const dialogItem = ref({});
            const is_type = ref(0);
            const pc_type = ref(0);
            const panTypeMap = ref(<?php echo json_encode($panTypeMap ?? [], JSON_UNESCAPED_UNICODE); ?>);
            
            
            // 公共消息方法
            const showMessage = (message, type = 'info') => {
                ElMessage({
                    message,
                    type,
                    plain: true,
                });
            };


             // 滚动监听方法
            const handleScroll = () => {
                const scrollTop = window.scrollY || document.documentElement.scrollTop;
                elementOpacity.value = scrollTop >= scrollThreshold.value
                    ? Math.min((scrollTop - scrollThreshold.value) / 100, 1)
                    : Math.max(1 - (scrollThreshold.value - scrollTop) / 100, 0);
    
                const boxElement = document.querySelector('.listBox .screen .fixed .box');
                if (boxElement.style.display === 'block' && is_m.value) {
                    boxElement.style.display = 'none'; // 隐藏元素
                }
            };

            // 搜索按钮点击事件
            const searchBtn = () => {
                if (!keyword.value) {
                    return showMessage('请输入你要搜索的内容~', 'error');
                }
                const targetUrl = `/s/${keyword.value}.html`;
                window.location.href = targetUrl;
            };
            
            // 保存按钮点击事件
            const saveBtn = async () => {
                if (!content.value) {
                    return showMessage('请输入你想看的资源信息~', 'error');
                }
                if (load.value) return;
    
                load.value = true;
                try {
                    const response = await axios.post('/api/tool/feedback', { content: content.value });
                    showMessage(response.data.message, response.data.code === 200 ? 'success' : 'error');
                    if (response.data.code === 200) {
                        layerVisible.value = false;
                        content.value = '';
                    }
                } finally {
                    load.value = false;
                }
            };
            
            const setnum = (num) => (num / 10000).toFixed(2) + 'W';
            
            const goLink = (event,id) => {
                event.preventDefault();
                window.location.href = `/d/${id}.html`;
            }
            
            const changeBtn = (e) => {
                const category_id = `<?php echo htmlentities($category_id); ?>`;
                if(category_id){
                    window.location.href = `/s/${keyword.value}-${e}-${category_id}.html`;
                }else{
                    window.location.href = `/s/${keyword.value}-${e}.html`;
                }
            };
            
            const copyText = async(event,title,url,code) => {
                event.preventDefault();
                var text = '标题：'+title+'\n链接：'+url
                if (code) text += `\n提取码：${code}`;
                text += `\n由【${'<?php echo htmlentities($config['app_name']); ?>'}${window.location.hostname}】提供网盘分享链接`;
                
                
                try {
                    // 优先使用 navigator.clipboard
                    await navigator.clipboard.writeText(text);
                    showMessage('复制成功', 'success');
                } catch (err) {
                    // 如果 navigator.clipboard 失败，使用 document.execCommand 作为回退
                    const textArea = document.createElement('textarea');
                    textArea.value = text;
                    textArea.style.position = 'fixed';  // 避免滚动
                    textArea.style.opacity = 0;
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
            
                    try {
                        const successful = document.execCommand('copy');
                        if (successful) {
                            showMessage('复制成功', 'success');
                        } else {
                            throw new Error('复制失败');
                        }
                    } catch (err) {
                        showMessage('复制失败，请手动复制', 'error');
                    }
            
                    document.body.removeChild(textArea);
                }
            }
            
            const selectBtn = () => {
                if(!is_m.value) return;
                const boxElement = document.querySelector('.listBox .screen .fixed .box');
                // 切换 display 属性，显示或隐藏
                if (boxElement.style.display === 'none' || boxElement.style.display === '') {
                    boxElement.style.display = 'block'; // 显示
                } else {
                    boxElement.style.display = ''; // 隐藏
                }
            }
            
            const handleDeviceType = () => {
                const isMobile = window.matchMedia('(max-width: 768px)').matches;
                if (isMobile) {
                    // 手机端的逻辑
                    is_m.value = 1
                    pc_type.value = 1
                } else {
                    // 电脑端的逻辑
                    is_m.value = 0
                    pc_type.value = '<?php echo htmlentities($config['pc_type']); ?>';
                }
            };


            // 组件挂载时添加滚动监听
            onMounted(() => {
                handleDeviceType();
                
                window.addEventListener('scroll', handleScroll);
                window.addEventListener('resize', handleDeviceType);
            });

            // 组件卸载时移除滚动监听
            onUnmounted(() => {
                window.removeEventListener('scroll', handleScroll);
                window.removeEventListener('resize', handleDeviceType);
            });

            // 返回数据和方法
            return { elementOpacity, scrollThreshold, keyword, searchBtn, rankList,newList, setnum, qcodeVisible, layerVisible, content, saveBtn, rankDj,goLink,changeBtn,copyText,drawer,selectBtn,is_m,QList,QLoading,total_result,currentSource,dialogUrl,dialogLoading,dialogItem,is_type,pc_type,panTypeMap };
        }
    })
    .use(ElementPlus) // 使用 Element Plus
    .mount('#app'); // 挂载 Vue 实例
</script>
    <script type="text/javascript" charset="utf-8">
        app.rankList = JSON.parse('<?php echo json_encode($rankList, JSON_UNESCAPED_UNICODE); ?>');
        for (const item of app.rankList) {
            axios.get('/api/tool/ranking', {
                params: {
                    channel: item.name
                }
            })
        }

        function linkBtn(element) {
            const index = element.getAttribute('data-index');
            var jsonData = '<?php echo json_encode($list["items"], JSON_UNESCAPED_UNICODE); ?>';
            jsonData = jsonData.replace(/[\x00-\x1F\x7F]/g, '');
            var list = JSON.parse(jsonData);
            const item = list[index];
            if (app.pc_type == 1) {
                safeJump(item.url);
            } else {
                item.showUrl = item.url
                app.dialogUrl = true;
                showUrlFun(item);
            }
        }

        function safeJump(url, target = '_blank') {
            const a = document.createElement('a');
            a.href = url;
            a.rel = 'noreferrer';
            a.target = target;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function getUrlBtn(element) {
            app.dialogUrl = true;
            const index = element.getAttribute('data-index');
            const item = app.QList[index];
            if (item.url.startsWith('http') || item.url.startsWith('magnet:')) {
                item.showUrl = item.url
                showUrlFun(item);
            } else {
                app.dialogLoading = true;
                axios.post('/api/other/save_url', {
                    url: encodeURIComponent(item.url),
                    title: item.title
                }).then(res => {
                    if (res.data.code == 200) {
                        item.url = res.data.data.url
                        item.showUrl = res.data.data.url
                    } else {
                        item.showUrl = ''
                        item.message = res.data.message
                    }
                    app.dialogLoading = false;
                    showUrlFun(item)
                })
                    .catch(err => {
                        app.dialogLoading = false
                    })
            }
        }

        function showUrlFun(item) {
            app.dialogItem = item
            if (item.showUrl) {
                var canvas = qrcanvas.qrcanvas({
                    data: item.showUrl,
                    size: 120
                });
                setTimeout(() => {
                    document.getElementById('qrcode').appendChild(canvas);
                }, 200);
            }
        }

        let currentEventSource = null;
        function setType(type) {
            app.selectBtn()
            if (type == app.is_type) return
            app.is_type = type;
            app.QLoading = false
            app.QList = []
            switchSource(1)
        }
        function switchSource(source) {
            app.currentSource = source;
            if (app.currentSource == 1) {
                if (app.QLoading || app.QList.length > 0) return

                app.QLoading = true
                app.QList = []

                // 创建新的 EventSource 连接前，确保关闭旧的连接
                if (currentEventSource) {
                    currentEventSource.close();
                }

                // 创建 EventSource 连接
                const params = new URLSearchParams({
                    title: app.keyword,
                    is_type: app.is_type
                })
                currentEventSource = new EventSource(`/api/other/web_search?${params.toString()}`)

                // 监听消息
                currentEventSource.onmessage = function (event) {
                    if (event.data.includes('[DONE]')) {
                        currentEventSource.close()
                        currentEventSource = null
                        app.QLoading = false
                        return
                    }

                    try {
                        const data = JSON.parse(event.data)
                        app.QList.push(data)
                    } catch (e) {
                        console.error('解析数据失败:', e)
                    }
                }

                // 错误处理
                currentEventSource.onerror = function (error) {
                    console.error('SSE 连接错误:', error)
                    currentEventSource.close()
                    currentEventSource = null
                    app.QLoading = false
                }
            }
        }

        app.is_type = '<?php echo htmlentities($firstKey); ?>'
        if ('<?php echo htmlentities($config['is_quan']); ?>' == 1 && !'<?php echo htmlentities($blocked); ?>') {
            let listItems = JSON.parse('<?php echo json_encode($list["items"], JSON_UNESCAPED_UNICODE); ?>');
            if (listItems.length == 0) {
                switchSource(1)
            }
        }
    </script>
</body>

</html>