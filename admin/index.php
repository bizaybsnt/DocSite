<?php

include_once('/includes/apps_top.php');
if(!isset($_SESSION['LoggedIn']))
    {
       $url="login.php";
       $dobj->redirect_to($url);
    }
 $content = isset($_GET['_page'])?$_GET['_page']:"usermanagement";
    
    if( !file_exists("view/pages/".$content.".php")){
       $content = "404"; 
    }

?>



<?php
   include_once('view/components/page_head.php');
?>
    <?php
   include_once('view/components/aside.php');
?>

<?php

   include_once('view/pages/'.$content.'.php');
?>
 

