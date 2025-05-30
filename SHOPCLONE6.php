<?php
define("IN_SITE", true);
require_once(__DIR__.'/libs/db.php');
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/libs/helper.php');
$CMSNT = new DB();




    $list_addon = $CMSNT->get_list("SELECT * FROM `addons`");
    //print_r($list_addon);
    foreach ($list_addon as $addon){
        $id = $addon['id'];
        $domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
        $purchase_key = md5($domain.'|'.$id);
        $status = $CMSNT->update("addons",[
            'purchase_key'  => $purchase_key
        ], " `id` = '$id' ");
        echo '<p>Active Success Addon: ' . $addon['name']. "</p>";
    }
    die('<h1>Script Crack By Mai Huy Bảo</h1><h1>https://t.me/MaiHuyBao</h1>');
?>
