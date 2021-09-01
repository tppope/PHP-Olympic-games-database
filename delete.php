<?php
require_once "controllers/OlympicAthletesController.php";
$controller = new OlympicAthletesController();
$delete = null;
if (isset($_GET['id']))
    $delete = $controller->deleteAthlete($_GET['id']);
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Potvrdenie vymazania</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
   </head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        <?php
        if ($delete > 0)
            echo "Športovec <span>bol úspešne</span> odstránený";
        else
            echo "Športovec <span>nebol úspešne</span> odstránený";
        ?>
    </h1>
</header>
<section id="section-delete">
    <?php
    if ($delete > 0)
        echo "<lottie-player src='https://assets8.lottiefiles.com/packages/lf20_jP0UkE.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>";
    elseif($delete === 0)
        echo "<lottie-player src='https://assets10.lottiefiles.com/packages/lf20_y8t1nosz.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>";
    else
        echo "<lottie-player src='https://assets10.lottiefiles.com/packages/lf20_y8t1nosz.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>
              <span id='edit-info'>Nedoslali ste formulár</span>";
    ?>
    <span id="redirect">Za 5 sekúnd budete presmerovaný na <a id="href-index" href="index.php">hlavnú stránku</a></span>
    <script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 5000);
    </script>
</section>

</body>
</html>
