<?php ob_start(); ?>

<div class="container">
    <h1>Conditions générales</h1>
    <h1>Politique de confidentialité</h1>
    <p>Ce site a été réalisé dans le cadre de l'ECF7.</p>
</div>

<?php
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>