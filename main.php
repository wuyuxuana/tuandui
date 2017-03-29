<?php
include_once 'include.php';
$list=$_REQUEST['list'];

$cid=$_REQUEST['cid'];
// var_dump($list);
// var_dump($cid);
// sleep(3000);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from ofc_list";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select l.id,l.lName,l.nId,l.list,n.name from ofc_list l join ofc_nav n on l.nId=n.nId where l.nId=$list";
// $sql="select l.id,l.lName,l.list,n.name from ofc_list l left join ofc_nav n on l.cId=n.nId ";
$rows=fetchAll($sql);
// var_dump($rows);
// sleep(300);
// $sql="select lName,list from ofc_list where nId=$list order by list asc limit {$offset},{$pageSize}";

// if(!$rows){
// 	alertMes("sorry,没有分类,请添加!","addNav.php");
// 	exit;
// }
function active($cid){
    if($row['list']==$cid)
        $active="active";
        echo $active;
}

// var_dump(active($cid));
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>新型光器件与光交换组</title>
    <link rel="stylesheet" href="styles/public.css"/>
    <link rel="stylesheet" href="styles/master.css"/>
    <link rel="stylesheet" href="styles/layout.css"/>
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/public.js"></script>
    <script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="scripts/koala.min.1.5.js"></script>
    <script type="text/javascript" src="scripts/terminator2.2.min.js"></script>

</head>
<body>
<div class="topbar">
    <div class="comWidth">
        <p class="fl guide">
            <a href="http://www.uestc.edu.cn/" target="_blank">学校首页</a>
            |
            <a href="http://www.scie.uestc.edu.cn/" target="_blank">通信学院</a>
            |
            <a href="http://www.lib.uestc.edu.cn/" target="_blank">图书馆</a>
            |
            <a href="./admin" target="_blank">后台管理</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
    </div>
    <div class="comWidth">
        <div class="searcher fr">
            <form class="fr" action="">
                <input class="searcher_01 " type="text"/>
                <input class="searcher_02 " type="button"/>
            </form>
        </div>
    </div>
</div>
<div class="header">
    <div class="comWidth">
        <div class=" container">
            <a href="./" id="logo" title="电子科技大学">
                <img src="images/logos/logo1.png" alt="电子科大学"/><span>&nbsp;&nbsp;&nbsp;新型光器件与光交换团队</span>
            </a>
        </div>
        <div class="nav" id="nav">
            <ul>
                <li class="nav_tags"><a href="./">首页</a></li>
                <li class="nav_tags">
                    <a href="main.php?list=2&cid=21" >新闻公告</a>
                    <ul class="hide">
                        <li><a href="main.php?list=2&cid=21">综合新闻</a></li>
                        <li><a href="main.php?list=2&cid=22">信息公告</a></li>
                        <li><a href="main.php?list=2&cid=23">学生活动</a></li>
                    </ul>
                </li>
                <li class="nav_tags">
                    <a href="main.php?list=3&cid=31">研究队伍</a>
                    <ul class="hide">
                        <li><a href="main.php?list=3&cid=31">研究组简介</a></li>
                        <li><a href="main.php?list=3&cid=32">研究人员</a></li>
                    </ul>
                </li>
                <li class="nav_tags">
                    <a href="main.php?list=4&cid=41">科学研究</a>
                </li>
                <li class="nav_tags">
                    <a href="main.php?list=5&cid=51">学术成果</a>
                    <ul class="hide">
                        <li><a href="main.php?list=5&cid=51">论文专著</a></li>
                        <li><a href="main.php?list=5&cid=52">专利成果</a></li>
                    </ul>
                </li>

                <li class="nav_tags">
                    <a href="main.php?list=6&cid=61">学术交流</a>
                    <ul class="hide">
                        <li><a href="main.php?list=6&cid=61">学术交流</a></li>
                        <li><a href="main.php?list=6&cid=62">科普园地</a></li>
                    </ul>
                </li>
                <li class="nav_tags">
                    <a href="main.php?list=7&cid=71">硕博招生</a>
                </li>
                <li class="nav_tags"><a href="main.php?list=8&cid=81">联系我们</a></li>
            </ul>
        </div>
    </div>

</div>
<div class="content comWidth">
    <div class="bread">
            <span>位置:</span>
            <a href="./">首页</a>
            >
            <a href=""><?php echo $rows[0]['name'];?></a>
        </div>
    <div class="bar">
            <div id="sidebar" class="fl">
                <?php foreach ($rows as $row):?>
                <div class="item">
                    <a class="<?php echo $row['list']==$cid?active:null;?>" href="main.php?list=<?php echo $row['nId'];?>&cid=<?php echo $row['list'];?>"><?php echo $row['lName']?><?php active($cid);?></a>
                </div>
                <?php endforeach;?>
            </div>
            <div class="bar_content fr">
                <?php faculty($cid);?>
            </div>
        </div>
</div>
<div class="footer">
    <div class="comWidth">
        <div class="footer_pad">
            <div class="foot_box">
                <div class="fl ">
                    <h3>友情链接</h3>
                    <ul>
                        <li><a href="http://www.uestc.edu.cn/" target="_blank">>>&nbsp;&nbsp;学校首页</a></li>
                        <li><a href="http://www.scie.uestc.edu.cn/" target="_blank">>>&nbsp;&nbsp;通信学院</a></li>
                        <li><a href="http://www.lib.uestc.edu.cn/" target="_blank">>>&nbsp;&nbsp;图书馆</a></li>
                        <li><a href="http://portal.uestc.edu.cn/" target="_blank">>>&nbsp;&nbsp;信息门户</a></li>
                        <li><a href="http://gr.uestc.edu.cn/" target="_blank">>>&nbsp;&nbsp;研究生院</a></li>
                    </ul>
                </div>
                <div class="fl"></div>
            </div>
            <div class="foot_box">
                <div class="fl ">
                    <h3>联系我们</h3>
                    <address>
                        四川省成都市高新区（西区）西源大道2006号
                        <br/>
                        电子科技大学清水河校区科研楼B区 邮编：611731
                        <br/>
                        <br/>
                        电话：028-61830268
                        <br/>
                        Email:bjwu@uestc.edu.cn
                    </address>
                </div>
            </div>
        </div>
        <div id="copyright">
            <p>2016 电子科技大学新型器件与光交换研究团队&nbsp;&nbsp;</p>
            <p>技术支持:九点的耳朵</p>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function set()
    {
        var menu=document.getElementById("nav").getElementsByTagName("li");
        for(var i=0;i<menu.length;i++)
        {
            if(menu[i].className=="nav_tags")
            {
                menu[i].onmouseover=function()
                {
                    this.getElementsByTagName("ul")[0].style.display="block";
                }
                menu[i].onmouseout=function()
                {
                    this.getElementsByTagName("ul")[0].style.display="none";
                }
            }
        }
    }
    window.onload=set;
</script>
<script type="text/javascript">
    Qfast.add('widgets', { path: "scripts/terminator2.2.min.js", type: "js", requires: ['fx'] });
    Qfast(false, 'widgets', function () {
        K.tabs({
            id: 'featured',   //焦点图包裹id
            conId: "featured_nav",  //** 大图域包裹id
            tabId:"D1fBt",
            tabTn:"a",
            conCn: '.slide', //** 大图域配置class
            auto: 1,   //自动播放 1或0
            effect: 'fade',   //效果配置
            eType: 'click', //** 鼠标事件
            pageBt:true,//是否有按钮切换页码
            bns: ['.prev01', '.next01'],//** 前后按钮配置class
            interval: 3000  //** 停顿时间
        })
    })
</script>
</html>