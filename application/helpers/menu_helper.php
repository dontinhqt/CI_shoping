<?php
function callMenu($data,$parent=0,$text=" ",$select=0){
    foreach($data as $k=>$value){
        if($value['cate_parent'] == $parent){
            $id=$value['cate_id'];
            if($select != 0 && $id == $select){
                echo "<option value='$value[cate_id]' selected='selected'>".$text.$value['cate_title']."</option>";
            }else{
                echo "<option value='$value[cate_id]'>".$text.$value['cate_title']."</option>";
            }
            unset($data[$k]);
            callMenu($data,$id,$text." |-- ",$select);
        }
    }
}

function category($parent = 0,$data = null,$step=""){
    global $category;
    if(isset($data) && is_array($data)){
        foreach ($data as $key => $value) {
            if($value['cate_parent']==$parent){
                if($value['cate_parent']==0){
                    $category[$value['cate_id']]= $step."<span class='text-red text-uppercase page-header'>".$value['cate_title']."</span>";
                    category($value['cate_id'],$data,$step."<span class='glyphicon glyphicon-arrow-right text-green'> </span> ");
                }else{
                    $category[$value['cate_id']]= $step.$value['cate_title'];
                    category($value['cate_id'],$data,$step."<span class='glyphicon glyphicon-arrow-right text-green'> </span> ");
                }
            }
        }
    }
    return $category;
}