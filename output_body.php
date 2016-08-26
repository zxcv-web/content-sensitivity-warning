<?php
if ('basic' == get_option('popup_style')) {
    include('style-options/basic.php');
} elseif('bootstrap' == get_option('popup_style')) {
    include('style-options/bootstrap.php');
} else {
    include('style-options/none.php');
}
?>
