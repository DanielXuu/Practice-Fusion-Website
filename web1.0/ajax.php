<?php
    if(isset($_GET['on'])) {
        onFunc();
    }
    if(isset($_GET['off'])) {
        offFunc();
    }

    function onFunc(){
        echo "Button on Clicked";
    }
    function offFunc(){
        echo "Button off clicked";
    }
?>