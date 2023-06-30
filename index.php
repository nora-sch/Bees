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
        <input type="text" name="hit-bee" value="" hidden>
        <button id="hit" type="submit" value="hit">HIT</button>
    </form>


    <script>
        let button = document.getElementById('hit');

        function hitBee(event) {
            event.preventDefault();
            document.querySelectorAll(".selected").forEach((bee) => {
                bee.classList.remove("selected");
            })

            const randomBeeId = Math.floor(Math.random() * <?= count($beesArr) ?>) ;
            console.log(randomBeeId);
            let selectedBee = document.getElementById(randomBeeId);
            selectedBee.classList.add("selected");


            const formData = new FormData();
            formData.append('bee_id', randomBeeId);
            console.log(formData);

            let data = {
                bee_id: randomBeeId
            }
            console.log(data);
            fetch('abeilles.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=uft-8'
                },
                // body: formData
                body: JSON.stringify(data)
            }).then(response => {
                if (response.ok) {
                    // console.log(response)
                    console.log("data sent");
                    return response.json();
                } else {
                    console.log("data not sent");
                }
            }).then(data =>{
                console.log(data);
            }).catch((error) => {
                console.log(error)
            });



            // const data = {
            //     "id": randomBeeIndex
            // }
            // document.cookie=`id=${randomBeeIndex}`;

        }
        button.addEventListener('click', hitBee);
    </script>
</body>


</html>