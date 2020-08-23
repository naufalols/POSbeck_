<?php 

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == 2) {
        header('Location: ' . BASEURL . ' /home');
        
                    exit;
    }
  
    
  }