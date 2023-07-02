<?php include("bees.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <title>Bees</title>
</head>

<body>
    <main>
        <div id="bees-list">
            <?php foreach ($bees_to_display as $key => $bee) : ?>
                <div class='<?= strtolower($bee['name']) ?> bee-card' id=<?= $key ?>>
                    <img class="bee-img" src="img/<?= strtolower($bee['name']) ?>.jpg" alt="bee <?= strtolower($bee['name']) ?>" />
                    <div class="card-info"> <span><?= $bee['name'] ?></span> <span class="points" id="<?= $key ?>-life"><?= $bee['life'] ?></span></div>
                </div>
            <?php endforeach ?>
        </div>
        <div id="btn-container">
            <h3>ROUND <span id="round"></span></h3><button id="hit" type="submit" value="hit">HIT</button>
            <button id="reset-game" class="hidden">RESET</button>
        </div>
    </main>

    <script>
        if (!localStorage.getItem("round")) {
            localStorage.setItem("round", 1);
        }
        const round = document.getElementById('round');
        round.innerText = localStorage.getItem("round");
        const buttonHit = document.getElementById('hit');
        const buttonReset = document.getElementById('reset-game');
        let liveBees = [];
        for (let i = 0; i < <?= count($bees_to_display) ?>; i++) {
            liveBees[i] = i + 1;
        }

        buttonHit.addEventListener('click', hitBee);
        buttonReset.addEventListener('click', resetGame);
    </script>
</body>


</html>