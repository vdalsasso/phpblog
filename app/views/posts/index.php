<?php 

    require APPROOT . '/views/includes/head.php';

?>

<div class="navbar dark">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container">
    <?php foreach($data['posts'] as $post): ?>
        <div class="container-item">
            <h2>
                <?php echo $post->title ?>
            </h2>

            <h3>
                <?php echo 'Postado em: ' . date('F j h:m', strtotime($post->created_at)); ?>
            </h3>

            <p>
                <?php
                    echo $post->body;
                ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>