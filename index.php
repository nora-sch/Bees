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
    <button id="hit" type="submit" value="hit">HIT</button>
    <script>
        let button = document.getElementById('hit');
        let liveBees = [];
        for (let i = 0; i < <?= count($beesArr) ?>; i++) {
            liveBees[i] = i + 1;
        }



        function hitBee(event) {

            event.preventDefault();
            document.querySelectorAll(".selected").forEach((bee) => {
                bee.classList.remove("selected");
            })

            const randomBeeId = liveBees[Math.floor(Math.random() * liveBees.length)];

            console.log(randomBeeId);
            let selectedBee = document.getElementById(randomBeeId.toString());
            selectedBee.classList.add("selected");

            let data = {
                bee_id: randomBeeId
            }

            console.log(data);
            fetch('script.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=uft-8'
                },
                // body: formData
                body: JSON.stringify(data)
            }).then(response => {
                if (response.ok) {
                    console.log("data sent");
                    return response.json();
                } else {
                    console.log("data not sent");
                }
            }).then(data => {
                console.log(selectedBee);
                selectedBee.innerText = `${data[randomBeeId].name} - ${data[randomBeeId].life}`;
                if (data[randomBeeId].life <= 0) {
                    selectedBee.classList.remove("last-hit");
                    selectedBee.classList.add("defeated");
                    // if defeated - delete one from liveBees array for select this bee anymore
                    liveBees = liveBees.filter(beeIndex => beeIndex !== randomBeeId);
                } else if (data[randomBeeId].life > 0 && data[randomBeeId].life <= data[randomBeeId].damage) {
                    selectedBee.classList.add("last-hit");
                }
                console.log(liveBees);
            }).catch((error) => {
                console.log(error)
            });
        }
        button.addEventListener('click', hitBee);
    </script>
</body>


</html>