
// window.onload = () => {
//     // On va chercher toutes les étoiles
//     const stars = document.querySelectorAll(".la-star");

//     // On va aller chercher l'input (note)
//     const note = document.querySelectorAll("#note");
   

//     // On boucle sur les étoiles pour ajouter des écouteurs d'évènements
//     for (star of stars) {
//         // On écoute le survol
//         star.addEventListener("mouseover", function () {
//             resetStars();
//             this.style.color = "yellow";
//             this.classList.add("las");
//             this.classList.remove("lar");

//             // L'élément précédent dans le DOM (de même niveau)
//             let previousStar = this.previousElementSibling;

//             while(previousStar) {
//                 // on passe l'étoile qui précède en rouge
//             previousStar.style.color = "yellow";
//             previousStar.classList.add("las");
//             previousStar.classList.remove("lar");
//             // on récupère l'étoile qui précède
//             previousStar = previousStar.previousElementSibling;
//             }
//         });

//         // On écoute le click
//         star.addEventListener("click" ,function() {
//             note.value = this.dataset.operatorId;
//             const note = document.querySelector(`.note[data-operator-id="${operatorID}"]`);
//             note.value = this.dataset.value;


//         });

//         star.addEventListener ("mouseout", function() {
//             resetStars(note.value);
            
//         })
//     }

//     function resetStars(note = 0) {
//         for (star of stars) {
//             if(star.dataset.value > note){
//             star.style.color="black";
//             star.classList.add("lar");
//             star.classList.remove("las");
//         } else{
//             star.style.color = "yellow";
//             star.classList.add("las");
//             star.classList.remove("lar");
//         }
//     }
// }
// }

window.onload = () => {
    const starsContainers = document.querySelectorAll(".stars");

    for (const starsContainer of starsContainers) {
        const stars = starsContainer.querySelectorAll(".la-star");
        const note = starsContainer.querySelector(".note");

        stars.forEach(star => {
            star.addEventListener("mouseover", function () {
                const value = this.dataset.value;
                highlightStars(stars, value);
            });

            star.addEventListener("click", function () {
                const value = this.dataset.value;
                note.value = value;
                highlightStars(stars, value);
            });
        });

        starsContainer.addEventListener("mouseout", function () {
            const selectedValue = note.value;
            highlightStars(stars, selectedValue);
        });
    }

    function highlightStars(stars, value) {
        stars.forEach(star => {
            if (star.dataset.value <= value) {
                star.style.color = "yellow";
                star.classList.add("las");
                star.classList.remove("lar");
            } else {
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }
        });
    }
};

