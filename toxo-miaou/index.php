
 <?php 
    require './view/header.php';

    if(isset($_GET['url']) && $_GET['url']=='error'){
        include './view/error.php';
        
    } elseif(isset($_GET['url']) && $_GET['url']=='user_profile'){
        include './view/user_profile.php';

    } elseif(isset($_GET['url']) && $_GET['url']=='product_profile'){
        include './view/product_profile.php';

    } elseif(isset($_GET['url']) && $_GET['url']=='agency'){
        include './view/agency.php';

    } elseif(isset($_GET['url']) && $_GET['url']=='dbtest'){
        include './view/dbtest.php';
        
    } else {
        include './view/home.php';
    }
    
    require './view/footer.php'; 
        
        ?>