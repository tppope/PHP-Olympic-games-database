<?php
require_once "controllers/OlympicAthletesController.php";
$controller = new OlympicAthletesController();
$update = null;
$deleteAchievement = null;
if (isset($_POST["submit"])){
    $athleteId = (int)$_POST["athleteId"];
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $birthDayArray = explode('.',trim($_POST["birth-day"]));
    $birthDay = ltrim($birthDayArray[0],'0').".".ltrim($birthDayArray[1],'0').".".$birthDayArray[2];
    $birthPlace = trim($_POST["birth-place"]);
    $birthCountry = trim($_POST["birth-country"]);
    $deathDay = trim($_POST["death-day"]);
    if ($deathDay){
        $deathDayArray = explode('.',$deathDay);
        $deathDay = ltrim($deathDayArray[0],'0').".".ltrim($deathDayArray[1],'0').".".$deathDayArray[2];
    }
    $deathPlace = trim($_POST["death-place"]);
    $deathCountry = trim($_POST["death-country"]);
    $update = $controller->editAthlete($athleteId,$name,$surname,
        $birthDay,$birthPlace,$birthCountry,
        ($deathDay == '' ? null: $deathDay),($deathPlace == '' ? null: $deathPlace),($deathCountry == '' ? null: $deathCountry));
}

if ($update != -1){
    $deleteAchievement = $_POST["achievement"];
    if ($deleteAchievement != null)
        $deleteAchievement = $controller->deleteAchievement((int)$deleteAchievement);

}
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Potvrdenie úpravy</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        <?php
        if ($update > 0 || $deleteAchievement > 0)
            echo "Športovec <span>bol úspešne</span> upravený";
        else
            echo "Športovec <span>nebol úspešne</span> upravený";
        ?>
    </h1>
</header>
<section id="section-delete">
    <?php
    if ($update > 0 || $deleteAchievement > 0)
        echo "<lottie-player src='https://assets4.lottiefiles.com/packages/lf20_pGuYSm.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>";
    elseif($update == -1)
        echo "<lottie-player src='https://assets4.lottiefiles.com/packages/lf20_tC4Vir.json'  background='transparent'  speed='0.8'  style='width: 300px; height: 300px;'  loop autoplay></lottie-player>
             <span id='edit-info'>Zadali ste údaje už existujúceho športovca</span>";
    elseif($update === 0 && $deleteAchievement === null)
        echo "<lottie-player src='https://assets4.lottiefiles.com/packages/lf20_tC4Vir.json'  background='transparent'  speed='0.8'  style='width: 300px; height: 300px;'  loop autoplay></lottie-player>
             <span id='edit-info'>Neupravili ste žiaden údaj</span>";
    else
        echo "<lottie-player src='https://assets4.lottiefiles.com/packages/lf20_tC4Vir.json'  background='transparent'  speed='0.8'  style='width: 300px; height: 300px;'  loop autoplay></lottie-player>
                <span id='edit-info'>Nedoslali ste formulár</span>";
    ?>
    <span id="redirect">Za 10 sekúnd budete presmerovaný na <a id="href-index" href="index.php">hlavnú stránku</a></span>
    <script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 10000);
    </script>
</section>

</body>
</html>
