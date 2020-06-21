<?php if (isset($_SESSION['mensagem'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['tipo_msg'] ?> d-flex justify-content-center">
        <?php
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
        ?>
    </div>
<?php endif; ?>