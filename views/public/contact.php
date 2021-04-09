<?php ob_start(); ?>

<div class="container">
    <h1>Contact</h1>
    <p>Formulaire de contact à venir...</p>
</div>

<?php
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>