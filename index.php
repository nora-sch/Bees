<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js" type="module"></script>
    <title>Bees</title>
</head>

<body>
    <?php include("./abeilles.php"); ?>

    <?php foreach ($beesToSend as $key => $bee) : ?>
        <div class=<?= strtolower($bee['name']) ?> id=<?= $key ?>><?= $bee['name'] ?> - <?= $bee['life'] ?> </div>
    <?php endforeach ?>

    <form class="form-send-bee" action='abeilles.php' method="post">
        <!-- <input type="text" id="bee-id" name="bee-id" value="<?= isset($email) ? $email : ''; ?>"> -->
        <button id="hit" type="submit" value="hit">HIT</button>
    </form>
    <script>
        let button = document.getElementById('hit');

        function hitBee(event) {
            event.preventDefault();
                        document.querySelectorAll(".selected").forEach((bee) => {
                bee.classList.remove("selected");
            })

            let randomBeeIndex = Math.floor(Math.random() * <?= count($beesToSend) ?>)
            console.log(randomBeeIndex);
            event.preventDefault();
            let selectedBee = document.getElementById(randomBeeIndex);
            selectedBee.classList.add("selected");


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