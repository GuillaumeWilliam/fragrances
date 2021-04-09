<?php ob_start(); ?>

<div class="container">
    <h1>À propos</h1>
    <p>Ce site a été réalisé dans le cadre de l'ECF7.</p>
</div>

<?php
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>