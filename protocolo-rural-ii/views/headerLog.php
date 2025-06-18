<?php
if (!isset($_SESSION)) {
    session_start();
}
$base = '/protocolo-rural-ii';
?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Protocolo Rural</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <?php
    foreach ($style as $href) {
        echo "<link rel='stylesheet' href='$href'>";
    }
    ?>

  </head>

  <body>

  <header>
    <nav id="nav" class="navbar fixed-top min-vh-10 d-flex align-items-center bg-body-tertiary">
      <div class="container">
        <!-- Logo -->
        <div class="col-2 d-flex">
          <a class="navbar-brand" href="<?= $base ?>/painel">
            <img class="d-none d-lg-block mt-2" src="<?= $base ?>./uploads/logo.png" alt="logo" width="225" height="32" />
            <img class="d-block d-lg-none" src="<?= $base ?>./uploads/logomobile.png" alt="logo" width="30" height="32" />
          </a>
        </div>

        <!-- Menu Desktop -->
        <div class="col-8 d-none d-lg-block">
          <ul class="nav me-auto list-inline fs-5 justify-content-center">
            <li class="nav-item">
              <a class="nav-link mx-1.5 txt-gray list-hvr green-actv active pag-atual" href="<?= $base ?>/painel">Painel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-1.5 txt-gray list-hvr green-actv" href="<?= $base ?>/comoUsar">Como Usar</a>
            </li>
          </ul>
        </div>

        <!-- Login Desktop -->
        <div class="fs-5 col-2 d-none d-lg-flex justify-content-end">
          <a class="nav-link ms-2 py-2 px-3 txt-green border green-hvr green-actv-2" href="<?= $base ?>/minhaConta">Perfil</a>
          <a class="nav-link ms-2 py-2 px-3 txt-green border green-hvr green-actv-2" href="<?= $base ?>/logout">Sair</a>
       </div>

        <!-- Menu Mobile -->
        <div class="d-lg-none">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <!-- Mobile Overlay -->
      <div class="col-12 collapse text-center d-lg-none" id="navbarToggleExternalContent">
        <div id="overlay" class="p-4">
          <a class="txt-green text-decoration-none" href="<?= $base ?>/painel"><h1>Painel</h1></a>
          <a class="txt-green text-decoration-none" href="<?= $base ?>/comoUsar"><h1>Como Usar</h1></a>
          <a class="txt-green text-decoration-none" href="<?= $base ?>/minhaConta"><h1>Meu Perfil</h1></a>
          <a class="txt-green text-decoration-none" href="<?= $base ?>/logout"><h1>Sair</h1></a>
        </div>
      </div>
    </nav>

  </header>