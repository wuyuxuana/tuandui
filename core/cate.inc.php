<?php
$table="ofc_Nav";
/**
 * 添加分类1的操作
 * @return string
 */
function addNav(){
    $arr=$_POST;
    if(insert("ofc_nav", $arr)){
        $mes="分类添加成功！<br /><a href='addNav.php'>继续添加</a>|<a href='listNav.php'>查看分类</a>";
    }else{
        $mes="分类添加失败！<br /><a href='addNav.php'>重新添加</a>|<a href='listNav.php'>查看分类</a>";
    }
    return $mes;
}
/**
 * 根据ID得到指定分类信息
 * @param unknown $id
 */
function getNavById($id){
    $sql="select id,name from ofc_Nav where id={$id}";
    return fetchOne($sql);
}
/**
 *修改分类
 * @param unknown $where
 */
function editNav($where){
    $arr=$_POST;
    if(update("ofc_Nav", $arr,$where)){
        $mes="分类修改成功！<br /><a href='listNav.php'>查看分类</a>";
    }else {
        $mes="分类修改失败！<br /><a href='listNav.php'>查看分类<a>";
    }
    return $mes;
}
/**
 * 删除分类
 * @param unknown $where
 * @return string
 */
function delNav($id){
    $where="id={$id}";
    $res=checkProExist($id);
    if(!$res){
        if(delete("ofc_Nav",$where)){
            $mes="删除成功!<br/><a href='listNav.php'>查看分类</a>|<a href='addNav.php'>添加分类</a>";
        }else{
            $mes="删除失败!<br/><a href='listNav.php'>请重新操作</a>";
        }
        return $mes;
    }else{
        alertMes("分类下有商品，不能删除", "listPro.php");
    }
}

/**
 * 得到所有分类
 * @return array
 */
function getAllist(){
    $sql="select * from ofc_list";
    $rows=fetchAll($sql);
    return $rows;
}



?>