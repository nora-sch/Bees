<?php include("./abeilles.php"); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Bees</title>
</head>

<body>
    <?php $beesArr = $beesToDisplay;
    foreach ($beesArr as $key => $bee) : ?>
        <div class=<?= strtolower($bee['name']) ?> id=<?= $key ?>><?= $bee['name'] ?> - <?= $bee['life'] ?> </div>
    <?php endforeach ?>

    <form class="form-send-bee" action='index.php' method="post">
        <input type="text" name="hit-bee" hidden>
        <button id="hit" type="submit" value="hit">HIT</button>
    </form>

    <?php if (isset($_POST['hit-bee'])) {
        echo ('hit the bee');
        $random_bee_id = rand(0, count($beesArr) - 1);
        $beesArr = hitOrReset($random_bee_id, $bees);
    }
    ?>
    <script>
        let button = document.getElementById('hit');

        function hitBee(event) {
            // event.preventDefault();
            document.querySelectorAll(".selected").forEach((bee) => {
                bee.classList.remove("selected");
            })


            // let selectedBee = document.getElementById(<?= $random_bee_id ?>);
            // selectedBee.classList.add("selected");


            // const formData = new FormData();
            // formData.append('bee_id', randomBeeIndex);
            // console.log(formData);
            // fetch('abeilles.php', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json'
            //     },
            //     body: formData
            // }).then(response => {
            //     if (response.ok) {
            //         console.log(response)
            //         console.log("data sent");
            //     } else {
            //         console.log("data not sent");
            //     }
            // }).catch((error) => {
            //     console.log(error)
            // });


            // const data = {
            //     "id": randomBeeIndex
            // }
            // document.cookie=`id=${randomBeeIndex}`;

        }
        button.addEventListener('click', hitBee);
    </script>
</body>


</html>