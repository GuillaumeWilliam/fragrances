<?php ob_start(); ?>

<?php if (isset($_GET['payment_success']) && $_GET['payment_success'] == true ) : ?>
  <div class="alert alert-success" role="alert">
    Achat réalisé avec succès.
  </div>
<?php endif; ?>

<div class="container">
  <div class="col-6">
    <div class="row"> 
      <div id="carouselExampleControls" class="carousel slide col-8" data-bs-ride="carousel">
        <div class="col-12 carousel-inner">
          <!-- Utilizar un for para mostrar n cantidad de elementos -->
          <?php for ($i = 0; $i < $productsAmount; $i++) : ?>
          <?php if ($i == 0) : ?>
          <div class="carousel-item active">
            <?php else : ?>
            <div class="carousel-item">
              <?php endif; ?>
              <img src="./assets/images/<?= $allProducts[$i]->getImage(); ?>" class="d-block w-100" style="height:350px"
                alt="<?= $allProducts[$i]->getName(); ?>">
            </div>
            <?php endfor; ?>
            <!-- Utilizar un for para mostrar n cantidad de elementos -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="text-dark"><i class="fas fa-2x fa-angle-left"></i></i></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="text-dark"><i class="fas fa-2x fa-angle-right"></i></span>
          </button>
        </div>
      </div>
      <div class="col-12 mt-4 text-center">
        <h3><i>Découvrez vite nos nouveautés...</i></h3>
      </div>
    </div>

    <div class="row my-4">
      <div class="col-7">
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <?php foreach ($allProducts as $product) { ?>
          <div class="col">
            <div class="card">
              <img src="./assets/images/<?= $product->getImage(); ?>" class="card-img-top" height="250" alt="...">
              <div class="card-body">
                <h5 class="bg-secondary text-center text-white card-title">
                  <?= strtoupper($product->getName()); ?>
                </h5>
                <p class="card-text">
                  <?= $product->getDescription(); ?>
                </p>
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Parfum:
                    <span class="badge text-primary rounded-pill">
                      <?= $product->getName(); ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Prix:
                    <span class="badge bg-primary rounded-pill">
                      <?= $product->getPrice(); ?> €
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Disponibilité:
                    <span class="badge bg-primary rounded-pill">
                      <?= $product->getQuantity(); ?>
                    </span>
                  </li>
  
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <!-- <form action="index.php?action=checkout" method="post"> -->
                      <?php if ($product->getQuantity() > 0) : ?>
                        <a href="index.php?action=checkout&id=<?=$product->getId()?>" class="btn btn-success">Acheter</a>
                      <?php else: ?>
                        <strong class="badge rounded-pill">
                          <p class="btn btn-secondary text-white">
                            En réapprovisionnement
                          </p>
                        </strong>
                      <?php endif; ?>
                    <!-- </form> -->
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php } ?>
  
        </div>
      </div>
      <!--end cards-->
      <div class="col-3">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
          <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
          <button type="submit" class="btn btn-outline-secondary" name="submitted"><i
              class="fas fa-search"></i></button>
        </form>
        <div class="card mt-2">
          <ul class="list-group list-group-flush">
            <?php foreach ($allProducts as $product) { ?>
            <li class="list-group-item text-center">
              <a class="btn text-center" href="index.php?id=<?= $product->getId(); ?>">
                <?= ucfirst($product->getName()); ?>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

    <?php
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
    ?>