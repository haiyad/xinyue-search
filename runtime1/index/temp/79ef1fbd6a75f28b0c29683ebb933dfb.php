<?php /*a:5:{s:66:"D:\project\github\xinyue-search\public/views\index\news\index.html";i:1772387193;s:74:"D:\project\github\xinyue-search\public/views\index\news\common\header.html";i:1772387193;s:72:"D:\project\github\xinyue-search\public/views\index\news\common\head.html";i:1772520844;s:72:"D:\project\github\xinyue-search\public/views\index\news\common\foot.html";i:1772387193;s:74:"D:\project\github\xinyue-search\public/views\index\news\common\footer.html";i:1772522393;}*/ ?>
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
<meta name="referrer" content="never">
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
        <div class="homeBox searchBox">
            <div class="box">
                <div class="logoBox">
                    <?php if(!(empty($config['logo']) || (($config['logo'] instanceof \think\Collection || $config['logo'] instanceof \think\Paginator ) && $config['logo']->isEmpty()))): ?>
                    <img class="logo" src="<?php echo htmlentities($config['logo']); ?>" alt="<?php echo htmlentities($config['app_description']); ?>"></img>
                    <?php endif; if($config['app_name'] && $config['app_name_hide']!=1): ?>
                    <span class="title"><?php echo htmlentities($config['app_name']); ?></span>
                    <?php endif; ?>
                </div>
                <?php if(!(empty($config['app_subname']) || (($config['app_subname'] instanceof \think\Collection || $config['app_subname'] instanceof \think\Paginator ) && $config['app_subname']->isEmpty()))): ?>
                <div class="subTitle"><?php echo htmlentities($config['app_subname']); ?></div>
                <?php endif; ?>
                <div class="search">
                    <input type="text" v-model="keyword" placeholder="输入关键字进行搜索" @keyup.enter="searchBtn"
                        confirm-type="search" @confirm="searchBtn">
                    <div class="btn" @click="searchBtn">
                        <i class="iconfont icon-sousuo"></i>
                    </div>
                </div>
            </div>
            <div class="home <?php if($config['ranking_type'] != 1): ?>homeNO<?php endif; ?>">
                <?php if(!empty($newList)): ?>
                <div class="block">
                    <div class="nav">
                        <?php if(!(empty($config['home_new_img']) || (($config['home_new_img'] instanceof \think\Collection || $config['home_new_img'] instanceof \think\Paginator ) && $config['home_new_img']->isEmpty()))): ?>
                        <img src="<?php echo htmlentities($config['home_new_img']); ?>" alt="最新更新"></img>
                        <?php endif; ?>
                        最新更新
                    </div>
                    <div class="content">
                        <?php if($config['ranking_type'] == 1): ?>
                        <div class="list">
                            <?php if(is_array($newList) || $newList instanceof \think\Collection || $newList instanceof \think\Paginator): $i = 0; $__LIST__ = $newList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false || $key <
                                $config['ranking_m_num']): ?> <a href="/d/<?php echo htmlentities($vos['id']); ?>.html" target="_blank" class="item">
                                <div class="img">
                                    <?php if(isset($vos['src']) && $vos['src'] != ''): ?>
                                    <img src="<?php echo htmlentities($vos['src']); ?>" alt="<?php echo htmlentities($vos['title']); ?>" />
                                    <span>Loading...</span>
                                    <?php else: ?>
                                    <span class="titleLoading">
                                        <?php echo htmlentities(mb_substr($vos['title'],0,20,'utf-8')); if(mb_strlen($vos['title'],'utf-8') >
                                        20): ?>...<?php endif; ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <p><?php echo htmlentities($vos['title']); ?></p>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php else: ?>
                        <div class="list">
                            <?php if(is_array($newList) || $newList instanceof \think\Collection || $newList instanceof \think\Paginator): $i = 0; $__LIST__ = $newList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false || $key <
                                $config['ranking_m_num']): ?> <a href="/d/<?php echo htmlentities($vos['id']); ?>.html" target="_blank" class="item">
                                <p>
                                    <span><?php echo htmlentities($key+1); ?></span>
                                    <?php echo htmlentities($vos['title']); ?>
                                </p>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; if(is_array($hotList) || $hotList instanceof \think\Collection || $hotList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="block">
                    <div class="nav">
                        <?php if(!(empty($vo['image']) || (($vo['image'] instanceof \think\Collection || $vo['image'] instanceof \think\Paginator ) && $vo['image']->isEmpty()))): ?>
                        <img src="<?php echo htmlentities($vo['image']); ?>" alt="<?php echo htmlentities($vo['name']); ?>">
                        <?php endif; ?>
                        <?php echo htmlentities($vo['name']); ?>
                    </div>
                    <div class="content">
                        <?php if($config['ranking_type'] == 1): ?>
                        <div class="list">
                            <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false || $key <
                                $config['ranking_m_num']): ?> <a
                                href="<?php if(isset($vos['id']) && $vos['id'] != ''): ?>/d/<?php echo htmlentities($vos['id']); ?>.html<?php else: ?>/s/<?php echo htmlentities($vos['title']); ?>.html<?php endif; ?>"
                                target="_blank" class="item">
                                <div class="img">
                                    <?php if(isset($vos['src']) && $vos['src'] != ''): ?>
                                    <img src="<?php echo htmlentities($vos['src']); ?>" alt="<?php echo htmlentities($vos['title']); ?>" />
                                    <span>Loading...</span>
                                    <?php else: ?>
                                    <span class="titleLoading">
                                        <?php echo htmlentities(mb_substr($vos['title'],0,20,'utf-8')); if(mb_strlen($vos['title'],'utf-8') >
                                        20): ?>...<?php endif; ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <p><?php echo htmlentities($vos['title']); ?></p>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php else: ?>
                        <div class="list">
                            <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false || $key <
                                $config['ranking_m_num']): ?> <a
                                href="<?php if(isset($vos['id']) && $vos['id'] != ''): ?>/d/<?php echo htmlentities($vos['id']); ?>.html<?php else: ?>/s/<?php echo htmlentities($vos['title']); ?>.html<?php endif; ?>"
                                target="_blank" class="item">
                                <p>
                                    <span><?php echo htmlentities($key+1); ?></span>
                                    <?php echo htmlentities($vos['title']); ?>
                                </p>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php endif; ?>

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
            if (item.is_sys != 1) {
                continue;
            }
            axios.get('/api/tool/ranking', {
                params: {
                    channel: item.name
                }
            })
        }
    </script>
</body>

</html>