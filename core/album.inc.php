<?php

function addAlbum($arr){
    insert("imooc_album",$arr);
}



/***
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
    $sql="select albumPath from imooc_album where Pid={$id} limit 1";
    $rows=fetchOne($sql);
    return $rows;
}

/**
 *根据商品id得到所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
    $sql="select albumPath from imooc_album where Pid={$id}";
    $rows=fetchAll($sql);
    return $rows;
}


?>
