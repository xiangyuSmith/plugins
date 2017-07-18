
/**
 * PHP 分页，样式采用bootstrap，可更改样式
 * @param $url 请求地址
 * @param int $count_page 总页数
 * @param int $now_page 当前页码
 * @param int $page_size 页面数量
 * @param $link 参数
 *
 * 友情提示：如果要拼接参数，请在页码后面追加，例 &a=1
 */
function pager($url,$count_page = 1,$now_page = 1,$page_size = 10,$link = ""){
    $page_count=ceil($count_page/$page_size);
    echo '<ul class="pagination" style="float: right;">';
    if($now_page == 1){
        echo '<li class="disabled"><a href="javascript:;">&laquo;</a></li>';
    }else{
        echo '<li><a href="'.$url.'?now_page='.($now_page - 1).$link.'">&laquo;</a></li>';
    }
    if($page_count < 10){
        //总页数小于 10
        for($i = 1;$i <= $page_count;$i++){
            echo '<li ';if($now_page==$i){ echo 'class="active"';} echo '><a href="'.$url.'?now_page='.$i.$link.'">'.$i.'</a></li>';
        }
    }else{
        //当前页小于5
        if($now_page <= 5){
            for($number = 1;$number <= 10;$number++){
                echo '<li ';if($now_page==$number){ echo 'class="active"';} echo '><a href="'.$url.'?now_page='.$number.''.$link.'">'.$number.'</a></li>';
            }
        }else if($now_page > $page_count - 5){
            for($number = 9;$number >= 0;$number--){
                echo '<li ';if($now_page==($page_count-$number)){ echo 'class="active"';} echo '><a href="'.$url.'?now_page='.($page_count-$number).$link.'">'.($page_count-$number).'</a></li>';
            }
        }else{
            for($number = 5;$number >= 1;$number--){
                echo '<li><a href="'.$url.'?now_page='.($now_page-$number).$link.'">'.($now_page-$number).'</a></li>';
            }
            echo '<li class="active"><a href="'.$url.'?now_page='.$now_page.$link.'">'.$now_page.'</a></li>';
            for($number = 1;$number <= 4;$number++){
                echo '<li><a href="'.$url.'?now_page='.($now_page+$number).$link.'">'.($now_page+$number).'</a></li>';
            }
        }
    }
    if($now_page == $page_count){
        echo '<li class="disabled"><a href="javascript:;">&raquo;</a></li>';
    }else{
        echo '<li><a href="'.$url.'?now_page='.($now_page + 1).$link.'">&raquo;</a></li>';
    }
    echo '</ul>';
}
