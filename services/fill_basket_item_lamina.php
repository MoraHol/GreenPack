<div class="cont-info-item ng-star-inserted"><strong><?= $item->getProduct()->getName(); ?></strong>
    <p class="description-product">
        <span class="text-primary">Impresion: </span><span>&nbsp;<?= $item->isPrinting() ? "SI" : "NO"; ?></span>
        <br>
        <span class="text-primary">Tipo de Producto:</span><span>&nbsp;<?= $item->getTypeProduct() ?></span>
        <br>
        <span class="text-primary">Medidas:</span>
        <br>
        &nbsp;&nbsp;
        <span class="text-primary">Ancho:</span><span>&nbsp; <?= $item->getMeasurement()->getWidth(); ?></span>&nbsp;
        <span class="text-primary">Largo:</span><span>&nbsp; <?= $item->getMeasurement()->getHeight(); ?></span>&nbsp;
    </p>
    <span class="topping-product"></span>
    <span class="delete" onclick="deleteItem('<?= $item->getId() ?>')">Eliminar</span>
</div>