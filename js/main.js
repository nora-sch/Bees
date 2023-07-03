function hitBee(event) {
  event.preventDefault();
  document.querySelectorAll(".selected").forEach((bee) => {
    bee.classList.remove("selected");
  });

  const randomBeeId = liveBees[Math.floor(Math.random() * liveBees.length)];

  let selectedBee = document.getElementById(randomBeeId.toString());
  selectedBee.classList.add("selected");
  let cardInfoLife = document.getElementById(randomBeeId.toString() + "-life");
  let data = {
    bee_id: randomBeeId,
  };

  fetch("script.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=uft-8",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (response.ok) {
        return response.json();
      } else {
        console.log("data not sent");
      }
    })
    .then((data) => {
      cardInfoLife.innerText = data[randomBeeId].life;
      if (
        data[randomBeeId].life > 0 &&
        data[randomBeeId].life <= data[randomBeeId].damage
      ) {

        cardInfoLife.classList.add("last-hit");
      } else if (data[randomBeeId].life <= 0) {
        if (data[randomBeeId].name === "Queen") {
          const beesSection = document.getElementById("bees-list");
          beesSection.innerHTML = "";
          for (let i = 0; i < Object.keys(data).length; i++) {
            beesSection.insertAdjacentHTML(
              "beforeend",
              `<div class='${data[
                i + 1
              ].name.toLowerCase()} bee-card defeated' id=${i + 1}>
                    <img class="bee-img" src="img/${data[
                      i + 1
                    ].name.toLowerCase()}.jpg" alt="bee ${data[
                i + 1
              ].name.toLowerCase()}" />
              <div class="card-info">  <span>${
                data[i + 1].name
              }</span> <span class="points" id="${i + 1}-life">${
                data[i + 1].life
              }</span></div> 
                </div>`
            );
          }
          liveBees = [];
        }
        cardInfoLife.classList.remove("last-hit");
        selectedBee.classList.add("defeated");
        // if defeated - delete one from liveBees array for select this bee anymore
        liveBees = liveBees.filter((beeIndex) => beeIndex !== randomBeeId);
      }
      if (liveBees.length === 0) {
        buttonHit.classList.add("hidden");
        buttonReset.classList.remove("hidden");
      }
    })
    .catch((error) => {
      console.log(error);
    });
}

function resetGame(event) {
    localStorage.setItem("round", parseInt(localStorage.getItem("round"))+1)
   location.reload();
}
