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