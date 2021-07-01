<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/index">HOME</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/about">Sobre</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/projects">Projetos</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/blog">Blog</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/contact">Contato</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>