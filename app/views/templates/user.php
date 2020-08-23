<?php 


if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == 1) {
        header('Location: ' . BASEURL . ' /admin');
        
                    exit;
    }
    
    
  }