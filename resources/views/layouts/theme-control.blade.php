<?php if(isset($_GET['theme'])){ ?>
    <script>
        <?php if($_GET['theme']=='dark-theme'){ ?>

            console.log("Dark");
            $("html").attr("class", "light-theme");
            localStorage.setItem("theme",'light-theme');

        <?php }else if($_GET['theme']=='semi-dark'){ ?>

            console.log("Semi Dark");
            $("html").attr("class", "light-theme");
            localStorage.setItem("theme",'light-theme');

        <?php }else{ ?>

            console.log("Light");
            $("html").attr("class", "light-theme");
            localStorage.setItem("theme","light-theme");

        <?php } ?>
    </script>
    <?php } ?>