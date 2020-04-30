<html>
<head>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<script src="./assets/js/sweetalert.min.js"></script>
</head>
<?php
    function msg_success(){
        global $title;
        global $text;
        global $link;
        global $delay;
        if($link == ''){
            if($delay == ''){
                echo '<script type="text/javascript">';
                echo 'swal("'.$title.'", "'.$text.'", "success",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'swal("'.$title.'", "'.$text.'", "success", {closeOnClickOutside: false, timer: '.$delay.',button: false,});';
            echo '</script>';
        }else{
            if($delay == ''){
                $delay = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "swal({title: \"".$title."\",
                    text: \"".$text."\",
                    icon: \"success\",
                    buttons: false, closeOnClickOutside: false,
                  })\n";
            echo "setTimeout(function(){ window.location.href=\"".$link."\"; }, ".$delay.");";
            echo "</script>";
        }
    }



    function msg_error(){
        global $title;
        global $text;
        global $link;
        global $delay;
        if($link == ''){
            if($delay == ''){
                echo '<script type="text/javascript">';
                echo 'swal("'.$title.'", "'.$text.'", "error",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'swal("'.$title.'", "'.$text.'", "error", {closeOnClickOutside: false, timer: '.$delay.',button: false,});';
            echo '</script>';
        }else{
            if($delay == ''){
                $delay = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "swal({title: \"".$title."\",
                    text: \"".$text."\",
                    icon: \"error\",
                    buttons: false, closeOnClickOutside: false,
                  })\n";
            echo "setTimeout(function(){ window.location.href=\"".$link."\"; }, ".$delay.");";
            echo "</script>";
        }
    }
    


    function msg_info(){
        global $title;
        global $text;
        global $link;
        global $delay;
        if($link == ''){
            if($delay == ''){
                echo '<script type="text/javascript">';
                echo 'swal("'.$title.'", "'.$text.'", "info",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'swal("'.$title.'", "'.$text.'", "info", {closeOnClickOutside: false, timer: '.$delay.',button: false,});';
            echo '</script>';
        }else{
            if($delay == ''){
                $delay = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "swal({title: \"".$title."\",
                    text: \"".$text."\",
                    icon: \"info\",
                    buttons: false, closeOnClickOutside: false,
                  })\n";
            echo "setTimeout(function(){ window.location.href=\"".$link."\"; }, ".$delay.");";
            echo "</script>";
        }
    }



    function msg_warning(){
        global $title;
        global $text;
        global $link;
        global $delay;
        if($link == ''){
            if($delay == ''){
                echo '<script type="text/javascript">';
                echo 'swal("'.$title.'", "'.$text.'", "warning",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'swal("'.$title.'", "'.$text.'", "warning", {closeOnClickOutside: false, timer: '.$delay.',button: false,});';
            echo '</script>';
        }else{
            if($delay == ''){
                $delay = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "swal({title: \"".$title."\",
                    text: \"".$text."\",
                    icon: \"warning\",
                    buttons: false, closeOnClickOutside: false,
                  })\n";
            echo "setTimeout(function(){ window.location.href=\"".$link."\"; }, ".$delay.");";
            echo "</script>";
        }
    }
?>
</html>