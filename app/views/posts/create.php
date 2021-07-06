<?php 

    require APPROOT . '/views/includes/head.php';

?>

<div class="navbar dark">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Criar um novo post
    </h1>

    <form action="<?php echo URLROOT; ?>/posts/create">
        <div class="form-item">
            <input type="text" name="title" placeholder="Título...">
            <span class="invalidFeedback">
                    <?php echo $data ['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="body" placeholder="Digite o seu texto..."></textarea>
            <span class="invalidFeedback">
                    <?php echo $data ['bodyError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Cadastrar</button>
    </form>
</div>