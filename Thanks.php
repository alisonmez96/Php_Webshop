<?php

        setcookie('itemWinkelwagen', '');
        setcookie('itemWinkelwagen', false);
        setcookie('itemWinkelwagen', '', time() - 1);
        
        header('Location:Index.php');
?>