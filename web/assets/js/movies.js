function formatGenres(genres) {
    let transformGenresObjectToArray = function(allGenres) {    
        return allGenres.name
    }
    genres = genres.map(transformGenresObjectToArray);
    genres = genres.join(', ');
    return genres;
}

function formatDate(date) {
    date = new Date(date);
    return date.toLocaleDateString();
}

function formatMoney(money) {
    if(money == 0 || money || typeof undefined || money == null) {
        return '-';
    }
    return money.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
    });

}