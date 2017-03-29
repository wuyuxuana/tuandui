<?php
require_once (dirname(__FILE__).'/'."../include.php");

/**
 * 添加商品
 * @return string
 */
function addMes(){
    $arr=$_POST;
    $arr['pubTime']=time();
    $path="./uploads";
    var_dump($arr);
    $uploadFiles=uploadFile($path);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);

        }
    }
    $res=insert("ofc_mes", $arr);
    $pid=getInsertId();
    if($res&&$pid){
      foreach ($uploadFiles as $uploadFile){
          $arr1['pid']=$pid;
          $arr1['albumPath']=$uploadFile['name'];
          addAlbum($arr1);
      }
      $mes="<p>添加成功</p><a href='addMes.php'>继续添加</a>|<a href='listMes.php' target='mainFrame'>查看商品列表</a>";
    }else{
        foreach ($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
            unlink("../image_800/".$uploadFile['name']);
            }
            if(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            if(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            if(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        }
        $mes="<p>添加失败</p><a href='addMes.php'>重新添加</a>";
    }
    return $mes;
}

function editMes($id){
    $arr=$_POST;
     $path="./uploads";
    $uploadFiles=uploadFile($path);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);

        }
    }
    $where="id={$id}";
    $res=update("imooc_Mes", $arr,$where);
    $pid=$id;
    if($res&&$pid){
        if($uploadFiles &&is_array($uploadFiles)){
         foreach ($uploadFiles as $uploadFile){
             $arr1['pid']=$pid;
             $arr1['albumPath']=$uploadFile['name'];
             addAlbum($arr1);
         }
        }
        $mes="<p>编辑成功</p><a href='listMes.php' target='mainFrame'>查看商品列表</a>";
    }else{
     if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
                unlink("../image_800/".$uploadFile['name']);
            }
            if(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            if(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            if(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        }
     }
        $mes="<p>编辑失败</p><a href='listMes.php'>重新编辑</a>";
    }
    return $mes;
}

function delMes($id){
    $where="id=$id";
    $res=delete("imooc_Mes",$where);
    $MesImgs=getAllImgByMesId($id);
    if($MesImgs&&is_array($MesImgs)){
        foreach ($MesImgs as $MesImg){
            if(file_exists("uploads/".$MesImg['albumPath'])){
            unlink("uploads/".$MesImg['albumPath']);
            }
            if(file_exists("../image_50/".$MesImg['albumPath'])){
                unlink("../image_50/".$MesImg['albumPath']);
            }
            if(file_exists("../image_220/".$MesImg['albumPath'])){
                unlink("../image_220/".$MesImg['albumPath']);
            }
            if(file_exists("../image_350/".$MesImg['albumPath'])){
                unlink("../image_350/".$MesImg['albumPath']);
            }
            if(file_exists("../image_800/".$MesImg['albumPath'])){
                unlink("../image_800/".$MesImg['albumPath']);
            }
        }
    }
    $where1="pid={$id}";
    $res1=delete("imooc_album",$where1);
    if($res&&$res1){
        $mes="删除成功<br/><a href='listMes.php' target='mainFrame'>查看商品列表</a>";
    }else{
        $mes="删除失败<br/><a href='listMes.php' target='mainFrame'>重新删除</a>";

    }
    return $mes;
}


/**
 * 得到商品的所有信息
 * @return array
 */
function getAllMesByAdmin(){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_Mes as p join imooc_cate c on p.cId=c.id";
    $rows=fetchAll($sql);
    return $rows;
}
/**
 * 根据id到商品图片
 * @param unknown $id
 * @return multitype:
 */
function getAllImgByMesId($id){
    $sql="select a.albumPath from imooc_album a where pid={$id}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 根据id得到商品详细信息
 * @param int $id
 * @return array:
 */
function getMesById($id){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.Cid from imooc_Mes as p join imooc_cate c on p.cId=c.id where p.id={$id}";
    $row=fetchOne($sql);
    return $row;
}

/**
 * 检查分类下是否有产品
 * @param int $id
 * @return array
 */


function checkMesExist($id){
    $sql="select * from imooc_Mes where cId={$id}";
    $rows=fetchAll($sql);
    return $rows;

}

/**
 * 得到所有商品
 * @return array
 */
function getAllMess(){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.Cid from imooc_Mes as p join imooc_cate c on p.cId=c.id";
    $rows=fetchAll($sql);
    return $rows;
}
/**
 * 根据cid得到产品
 * @param unknown $cid
 * @return multitype:
 */
function getMesByCid($cid){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.Cid from imooc_Mes as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
    $rows=fetchAll($sql);
    return $rows;
}
/**
 * 根据cid得到下4条产品
 * @param int $cid
 * @return array
 */
function getSmallMesByCid($cid){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.Cid from imooc_Mes as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
    $rows=fetchAll($sql);
    return $rows;
}

?>
