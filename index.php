<?php
 include_once('admin/includes/apps_top.php');
 include_once('view/header.php');
 $contentPage = isset($_GET['_page'])?$_GET['_page']:"home";
    if( !file_exists("view/".$contentPage.".php"))
    {
       $contentPage = "404"; 
    }

?>


<?php
    include_once("view/".$contentPage.".php");
?>
<?php
 include_once('view/footer.php');
?>





	
	