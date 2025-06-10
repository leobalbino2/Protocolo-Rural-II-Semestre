<?php
session_start();
$base = '/protocolo-rural-ii';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Protocolo Rural</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <?php
    foreach ($style as $href) {
        echo "<link rel='stylesheet' href='$href'>";
    }
    ?>
    
  </head>

  <body>
  <!------------------------------------------- Cabeçalho ------------------------------------------->
    <header>
        <?php $base = '/protocolo-rural-ii'; ?>
        <nav
            id="nav"
        class="navbar fixed-top min-vh-10 d-flex align-items-center bg-body-tertiary"
      >
        <div class="container justify-content-center">
          <!------------------------------------------- Logo ------------------------------------------->
          <a class="navbar-brand mx-auto" href="<?=$base?>/">
            <img
              class="d-block mt-2"
              src="./uploads/logo.png"
              alt="logo"
              width="225"
              height="32"
           />
          </a>
        </div>
        </nav>
    </header>