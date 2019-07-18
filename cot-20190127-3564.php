<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
if (isset($_GET["id"])) {
  $quotation = $quotationDao->findById($_GET["id"]);
}
?>

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8">
  <title>Cotizacion</title>
  <link rel="stylesheet" href="/css/style-template-quotation.css">
</head>

<body dir="ltr" style="max-width:215.9mm;/*argin-top:19.05mm; margin-bottom:19.05mm; margin-left:17.78mm; margin-right:17.78mm;*/ margin: 0 auto; ">
  <table border="0" cellspacing="0" cellpadding="0" class="ta1">
    <colgroup>
      <col width="114">
      <col width="114">
      <col width="114">
      <col width="114">
      <col width="114">
      <col width="114">
      <col width="114">
      <col width="148">
      <col width="17">
      <col width="123">
      <col width="179">
      <col width="114">
    </colgroup>
    <tbody>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro2">
        <td style="text-align:left;width:26.02mm; " class="Default">
          <div style="height:19.11mm;width:26.02mm; padding:0; " id="Imagen_1" class="P1">
            <p><img style="height:1,911cm;width:8,359999999999999cm;" alt="" src="data:image/png;base64,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">
            </p>
          </div>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td colspan="3" style="text-align:left;width:26.02mm; position:relative; top:24px;" class="ce21">
          <p>NIT 800,025,125-8</p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td colspan="2" style="text-align:left;width:28.22mm; " class="ce30">
          <p>&nbsp;COTIZACIÓN No</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro3">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce21">
          <p>Cra. 5 este No. 20-69 Bodega # 6</p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td colspan="2" rowspan="3" style="text-align:right; width:28.22mm; " class="ce31">
          <p><?= $quotation->getId() ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro3">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce21">
          <p>&nbsp;(57+1) 893 26 31 / 35/ 38/ 42</p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce21">
          <p>Mosquera - Cundinamarca</p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro5">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce25">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro6">
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce3">
          <p>Nombres y Apellidos</p>
        </td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce19">
          <p><?= $quotation->getNameClient() ?> <?= $quotation->getLastNameClient() ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce23">
          <p>Email</p>
        </td>
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce27">
          <p><a href="mailto:<?= $quotation->getEmail() ?>"><?= $quotation->getEmail() ?></a></p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce3">
          <p>Fecha </p>
        </td>
        <td style="text-align:right; width:40.92mm; " class="ce37">
          <p><?= date("d/m/Y", $quotation->getCreatedAt()) ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce3">
          <p>Empresa</p>
        </td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce22">
          <p><?= $quotation->getCompany() ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce23">
          <p>Direccion</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce22" colspan="2">
          <p><?= $quotation->getAddress() ?></p>
        </td>

        <td style="text-align:left;width:3.88mm; " class="ce22">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce22">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce3">
          <p>Ciudad</p>
        </td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce19">
          <p><?= $quotation->getCity() ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce23">
          <p>Celular</p>
        </td>
        <td style="text-align:right; width:26.02mm; " class="ce22">
          <p><?= $quotation->getCellphoneNumber() ?></p>
        </td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce24">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce24">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce3">
          <p>Telefono</p>
        </td>
        <td colspan="3" style="text-align:right; width:26.02mm; " class="ce19">
          <p><?= $quotation->getPhoneNumber() ?></p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce24">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro7">
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce4">
          <p>Producto</p>
        </td>
        <td colspan="5" style="text-align:left;width:26.02mm; " class="ce4">
          <p>Descripcion</p>
        </td>
        <td colspan="2" style="text-align:left;width:33.87mm; " class="ce4">
          <p>Cantidad </p>
        </td>
        <td style="text-align:left;width:28.22mm; " class="ce34">
          <p>Precio Unidad</p>
        </td>
        <td style="text-align:left;width:40.92mm; " class="ce38">
          <p>Valor Total</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <?php foreach ($quotation->getItems() as $item) { ?>
        <tr class="ro8">
          <td colspan="2" style="text-align:left;width:26.02mm; " class="ce35">
            <p><img src="<?= $item->getProduct()->getImages()[0]->getUrl() ?>" width="70" height="71"></p>
          </td>
          <td colspan="5" style="text-align: left!important;width:26.02mm; " class="ce5">
            <p>
              <span class="T1">Referencia</span><span class="T2"> <?= $item->getProduct()->getRef() ?></span>
              <br>
              <span class="T3">Material</span><span class="T4"> <?= $item->getMaterial()->getName() ?> </span>
              <br>
              <span class="T5">Medidas</span><span class="T4"> <?= $item->getMeasurement()->getWidth() ?>*<?= $item->getMeasurement()->getHeight() ?>*<?= $item->getMeasurement()->getLength() ?></span>
            </p>
          </td>
          <td colspan="2" style="text-align:right; width:33.87mm; " class="ce28">
            <p>&nbsp;<?= $item->getQuantity() ?> </p>
          </td>
          <td style="text-align:right; width:28.22mm; " class="ce35">
            <p class="money"><?= $item->getPrice() ?></p>
          </td>
          <td style="text-align:right; width:40.92mm; " class="ce39">
            <p class="money"><?= $item->calculateTotal() ?></p>
          </td>
          <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        </tr>
      <?php } ?>

      <tr class="ro9">
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce16">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">
          <p>Observaciones</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td colspan="8" rowspan="3" style="text-align:left;width:26.02mm; " class="ce8">&nbsp;<?= $quotation->getExtraInformation() ?></td>
        <td style="text-align:left;width:3.88mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">
          <p>Subtotal</p>
        </td>
        <td style="text-align:left;width:40.92mm; " class="ce40">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:3.88mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">
          <p>IVA 19%</p>
        </td>
        <td style="text-align:left;width:40.92mm; " class="ce40">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:3.88mm; " class="ce7">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">
          <p>Total</p>
        </td>
        <td style="text-align:left;width:40.92mm; " class="ce39 money">&nbsp; <?= $quotation->calculateTotal() ?></td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="ce9" colspan="6">
          <p>Condiciones de Pago</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="8" style="text-align:left;width:26.02mm; " class="ce10">
          <p>50% al realizar el pedido - 50% a contra entrega de los productos</p>
        </td>
        <td style="text-align:left;width:3.88mm; " class="ce16">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="ce9" colspan="6">
          <p>Tiempo de Entrega a partir de la aprobación</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="6" style="text-align:left;width:26.02mm; " class="ce10">
          <p>Sin impresión &nbsp;8 dias</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce41">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td colspan="6" style="text-align:left;width:26.02mm; " class="ce11">
          <p>Impresos 15 dias</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="ce9">
          <p>Vigencia</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="ce1">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro10">
        <td colspan="11" style="text-align:left;width:26.02mm; " class="ce12">
          <p> 30 días contados a partir de la fecha de la entrega de la cotizacion</p>
          <p>presente propuesta</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">
          <p>Cordialmente,</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td colspan="3" style="text-align:left;width:26.02mm; " class="ce18">
          <p>Vendedor 1</p>
        </td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro4">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">
          <p>Movil: </p>
        </td>
        <td colspan="2" style="text-align:left;width:26.02mm; " class="ce21">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
      <tr class="ro1">
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:33.87mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:3.88mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:28.22mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:40.92mm; " class="Default">&nbsp;</td>
        <td style="text-align:left;width:26.02mm; " class="Default">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <script src="/js/jquery-2.2.4.min.js"></script>
  <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
  <script src="/vendor/jquery.formatCurrency.all.js"></script>
  <script>
    $('.money').formatCurrency({
      region: 'es-CO'
    })
  </script>
</body>

</html>