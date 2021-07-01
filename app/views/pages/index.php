<?php 
    //var_dump($data);

    /*foreach($data['users'] as $user) {
        echo "Information: " . $user->user_name. $user->user_email;
        echo "<br>";
    }*/
    require APPROOT . '/views/includes/head.php';
    
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>

    <div class="wrapper-landing">
        <h1>Titulo principal</h1>
        <h2>Titulo secundario</h2>
    </div>
</div>