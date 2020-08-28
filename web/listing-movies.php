<section id="trending">
    <div class="movies">
       
    </div>
</section>

<script>
$(document).ready(function() {
  $.get(`${apiBaseUri}movies`, function(data) {
      let moviesHTML = '';
      data.movies.forEach(function(movie) {
        moviesHTML += loadMoviesFromTemplate(
          movie.original, 
          formatGenres(movie.original.genres),
          formatDate(movie.originalreleaseDate)
        );
      });
      $('.movies').html(moviesHTML);
  });

  function loadMoviesFromTemplate(movie, genres, releaseDate) {
    return `<a href="${apiBaseUri}/movie/${movie.id}" class="movies-item">
              <img src="https://image.tmdb.org/t/p/w220_and_h330_face/${movie.poster}">
              <div class="genders">${genres}</div>
              <h3 class="title">${movie.name}</h3>
              <time class="release-date">${releaseDate}</time>
              <div class="overview">${movie.overview}</div>
          </a>`;
  }
});

</script>