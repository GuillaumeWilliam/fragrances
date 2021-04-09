<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-8">
                    <img src="./assets/images/<?= $productEdition->getImage(); ?>" alt="" class="img-fluid">
                </div>
                <div class="col-4 d-flex align-items-center">
                    <div class="card">
                        <div class="list-group list-group-flush">
                            <li class="list-group-item"><?= $productEdition->getName(); ?></li>
                            <li class="list-group-item"><i><?= $productEdition->getDescription(); ?></i></li>
                            <li class="list-group-item"><?= $productEdition->getPrice(); ?> €</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex align-items-center">
            <div class="card">
                <div class="card-header">
                    <h5>Confirmation</h5>
                </div>
                <div class="card-body">
                <form>
                    <input type="hidden" id="ref" value="<?= $productEdition->getId(); ?>">
                    <input type="hidden" id="description" value="<?= $productEdition->getDescription(); ?>">
                    <input type="hidden" id="name" value="<?= $productEdition->getName(); ?>">
                    <input type="hidden" id="price" value="<?= $productEdition->getPrice(); ?>">

                    <input type="email" placeholder="E-mail" id="email" class="form-control" focus>
                    <input type="number" id="quantity" placeholder="Quantité" class="form-control mt-2" min="1" value="1" max="<?= $productEdition->getQuantity(); ?>">
                    <button id="checkout-button" class="btn btn-success col-12 mt-2"><i class="fab fa-cc-visa"></i> Confirmer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>