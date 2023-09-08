const destinationBackgrounds = {
    'Rome': 'Romepage.avif',
    'Londres': 'Londonpage.avif',
    'Monaco': 'Monacopage.avif',
};

const queryString = window.location.search;

function getDestinationFromQueryString(queryString) {
    const urlParams = new URLSearchParams(queryString);
    return urlParams.get('destination');
}

const destination = getDestinationFromQueryString(queryString);

const backgroundImagePath = destinationBackgrounds[destination];

if (backgroundImagePath) {
    document.body.style.backgroundImage = `url(${backgroundImagePath})`;
}

document.body.classList.add(`destination-${destination}`);