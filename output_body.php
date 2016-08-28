<?php
if ('theme' == get_option('popup_style')) {
    include('style-options/theme.php');
} elseif('bootstrap' == get_option('popup_style')) {
    include('style-options/bootstrap.php');
} else {
    include('style-options/none.php');
}
?>
