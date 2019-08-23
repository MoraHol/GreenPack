<?php
require_once(dirname(__DIR__) . "/model/Quotation.php");
require_once(dirname(__DIR__) . "/model/Item.php");
require_once(dirname(__DIR__) . "/model/ItemBox.php");
require_once(dirname(__DIR__) . "/model/ItemBag.php");
require_once(dirname(__DIR__) . "/model/Category.php");
require_once(dirname(__DIR__) . "/model/product.php");
require_once(dirname(__DIR__) . "/model/measurement.php");
require_once(dirname(__DIR__) . "/model/material.php");
require_once(dirname(__DIR__) . "/model/Image.php");
session_start();
if (isset($_SESSION["cart"])) {
  $cart = unserialize($_SESSION["cart"]);
  if (count($cart->getItems()) > 0) {
    ?>
<!-- html -->
<div class="cont-products-basket">
  <ul>
    <li class="ng-star-inserted">
      <div class="cont-product-header ng-star-inserted">
        <div class="store-basket-products">
          <? foreach ($cart->getItems() as $item) { ?>
          <!-- producto individual -->
          <div class="ng-star-inserted">
            <app-product-basket>
              <div class="item-basket hover-calculator">
                <div class="cont-img">
                  <div class="width-img"><img src="<?php echo $item->getProduct()->getImages()[0]->getUrl(); ?>">
                  </div>
                </div>
                <div class="product-basket-stores">
                  <div class="align-content">
                    <div class="cont-info-item ng-star-inserted"><strong><?php echo $item->getProduct()->getName(); ?></strong>
                      <p class="description-product">
                        <span class="text-primary">Impresion: </span><span>&nbsp;<?php echo $item->isPrinting() ? "SI" : "NO"; ?></span>
                        <br>
                        <span class="text-primary">Material:</span><span>&nbsp;<?php echo $item->getMaterial()->getName(); ?></span>
                        <br>
                        <span class="text-primary">Medidas:</span>
                        <br>
                        &nbsp;&nbsp;
                        <span class="text-primary">Alto:</span><span>&nbsp; <?php echo $item->getMeasurement()->getWidth(); ?></span>&nbsp;
                        <span class="text-primary">Largo:</span><span>&nbsp; <?php echo $item->getMeasurement()->getHeight(); ?></span>&nbsp;
                        <span class="text-primary">Ancho:</span><span>&nbsp; <?php echo $item->getMeasurement()->getLength(); ?></span>&nbsp;
                      </p>
                      <span class="topping-product"></span>
                      <span class="delete" onclick="deleteItem('<?php echo $item->getId() ?>')">Eliminar</span>
                    </div>
                    <div class="cont-calculator ng-star-inserted">
                      <app-counter-product>
                        <div class="calculator"><button class="subtract" onclick="subtractQty('<?php echo $item->getId(); ?>')">
                            <div><span class="ng-star-inserted"><i class="iconf-delete"></i></span></div>
                          </button>
                          <div class="number" contenteditable="true" id="qty<?php echo $item->getId(); ?>"><?php echo $item->getQuantity(); ?></div><button class="plus" onclick="sumQty('<?php echo $item->getId(); ?>')">
                            <div>+</div>
                          </button>
                        </div>
                      </app-counter-product>
                    </div>
                  </div>
                </div>
              </div>
            </app-product-basket>
          </div>
          <!-- producto individual -->
          <?php
              } ?>
        </div>
      </div>
    </li>
  </ul>
</div>
<script src="/vendor/jquery.number.min.js"></script>
<script>
  $('#submit-order').prop('disabled', false)
  $('.number').number(true, 0, ',', '.')
  calculateWidthNumber()
  var editables = document.getElementsByClassName('number');
  for (let index = 0; index < editables.length; index++) {
    // editables[index].addEventListener('input', function() {
    //   console.log('Hey, somebody changed something in my text!');
    //   console.log(this)
    // });
    editables[index].addEventListener('focus', function() {
      $('.number').number(true, 0, '', '')
    });
    editables[index].addEventListener('focusout', function() {
      $('.number').number(true, 0, ',', '.')
      calculateWidthNumber()
      console.log(this.id)
      changeQuantity(this.id)
    });
  }

  function calculateWidthNumber() {
    if ($('.number').text().length > 5) {
      $('.number').css('width', '108px')
    }
  }
</script>
<?php
  } else {
    ?>

<div class="content-basket-empty ng-star-inserted">
  <div><i class="iconf-car-2-icon"></i>
    <p><strong>No tienes productos cotizados</strong></p>
    <p><a href="/shop">Te invitamos a cotizar</a></p>
  </div>
</div>

<?php
  }
} else {
  $cart = new Quotation();
  $cart->setItems([]);
  $_SESSION["cart"] = serialize($cart); ?>
<div class="content-basket-empty ng-star-inserted">
  <div><i class="iconf-car-2-icon"></i>
    <p><strong>No tienes productos cotizados</strong></p>
    <p><a href="/shop">Te invitamos a cotizar</a></p>
  </div>
</div>
<script>
  $('#submit-order').prop('disabled', true)
</script>
<?php } ?>