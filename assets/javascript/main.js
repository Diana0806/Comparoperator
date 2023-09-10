const body = document.querySelector('body');

// function getParameterByName(name) {
//     name = name.replace('/[[]/, [).replace(/[]]/, ]');
//     var regexS = '[?&] + name + =([^&#] *)';
//     var regex = new RegExp(regexS);
//     var results = regex.exec(window.location.search);
//     if (results == null)
//         return;
//     else
//         return decodeURIComponent(results[1].replace(/+/g,));
// }



const queryString = window.location.search;

function getDestinationFromQueryString(queryString) {
    const urlParams = new URLSearchParams(queryString);
    return urlParams.get('destination');
}

function getDefaultImgFromQueryString(queryString) {
    const urlParams = new URLSearchParams(queryString);
    return urlParams.get('bgImg');
}

let destination = getDestinationFromQueryString(queryString);

if(getDefaultImgFromQueryString(queryString) === '0')
{
    body.classList.add('destination-Default');
} else {
    body.classList.add('destination-' + destination);
}




// const destination = getDestinationFromQueryString(queryString);

// const backgroundImagePath = destinationBackgrounds[destination];

// if (backgroundImagePath) {
//     document.body.style.backgroundImage = `url(${backgroundImagePath})`;
// }

// console.log(getParameterByName(bgImg));

// document.body.classList.add(`destination-${destination}`);
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
