<?php
    function sessionUnset1($session1){
        unset($_SESSION[$session1]);
    }
    function sessionUnset2($session1, $session2){
        unset($_SESSION[$session1]);
        unset($_SESSION[$session2]);
    }
    function sessionUnset3($session1, $session2, $session3){
        unset($_SESSION[$session1]);
        unset($_SESSION[$session2]);
        unset($_SESSION[$session3]);
    }
?>