<?php
    session_start();

    if(isset($_POST['submit'])){

        $search = trim($_POST['search']);

         /*Error param*/
        $error_empty = false;

         /*success param*/
        $seccuss_login = false;

        if(empty($search)){
            $error_empty = true;
        }else{
            $_SESSION['SEARCH_NEWS_BY_KEYWORD'] = $search;
            header ("Location: ../search-news.php?search=success");     
        }

    }else{
        echo "SYSTEM ERROR";
    }
?>

<script>

     var error_empty = "<?php echo $error_empty; ?>";

        if(error_empty == true){

            var ask = confirm("No Record Found?");
            if(ask){
                window.history.go(-1);
            }
        }

</script>


