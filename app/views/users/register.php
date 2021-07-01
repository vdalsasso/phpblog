<?php
    require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Registrar</h2>

        <form action="<?php echo URLROOT;?>/users/register" method="POST">
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data ['usernameError']; ?>
            </span>

            <input type="text" placeholder="Email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data ['emailError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data ['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data ['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Entrar</button>

            <p class="options">Não possui registro ainda? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</p>
        </form>
    </div>
</div>