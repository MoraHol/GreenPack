<div class="sidebar" data-color="green" data-background-color="black" data-image="/admin/assets/img/sidebar-2.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="javascript:;" class="simple-text logo-normal">
      <img src="/images/greenpack_logo.png" alt="Greenpack">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <?php
      require_once dirname(dirname(__DIR__)) . "/model/Admin.php";
      $admin = unserialize($_SESSION["admin"]);
      if ($admin->getRole() == 2) { ?>
      <li class="nav-item active  ">
        <a class="nav-link" href="/admin/">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <?php } ?>
      <?php if ($admin->getRole() == 3 || $admin->getRole() == 2) { ?>
      <li class="nav-item " id="blog-item">
        <a class="nav-link" href="/admin/blog/">
          <i class="material-icons">book</i>
          <p>Blog</p>
        </a>
      </li>
      <li class="nav-item" id="text-item">
        <a href="/admin/texts" class="nav-link">
          <i class="fas fa-font"></i>
          <p>Personalizar</p>
        </a>
      </li>
      <li class="nav-item" id="email-item">
        <a href="/admin/email_marketing.php" class="nav-link">
          <i class="fas fa-mail-bulk"></i>
          <p>Email Marketing</p>
        </a>
      </li>
      <?php } ?>
      <?php if ($admin->getRole() == 2) { ?>
      <li class="nav-item" id="product-item">
        <a href="/admin/products/" class="nav-link">
          <i class="fas fa-shopping-bag"></i>
          <p>Productos</p>
        </a>

      </li>
      <li class="nav-item" id="material-item">
        <a href="/admin/materials" class="nav-link">
          <i class="fab fa-battle-net"></i>
          <p>Materiales</p>
        </a>
      </li>
      <li class="nav-item" id="users-item">
        <a href="/admin/users" class="nav-link">
          <i class="fas fa-users"></i>
          <p>Administrador</p>
        </a>
      </li>

      <?php } ?>
      <?php if ($admin->getRole() == 2 || $admin->getRole() == 1) { ?>
      <li class="nav-item" id="quotations-item">
        <a href="/admin/quotations/" class="nav-link">
          <i class="fas fa-cart-plus"></i>
          <p>Cotizaciones</p>
        </a>
      </li>
      <?php } ?>
      <!-- your sidebar here -->
    </ul>
  </div>
</div>