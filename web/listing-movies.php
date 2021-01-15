<section id="trending">
    <div class="filter-by-categories">
      <h2>Search by category:</h2>
      <select id="categories">
       <option>Action</option> 
       <option>Adventure</option> 
       <option>Horror</option> 
      </select>
    </div>
    <div class="movies">
       
    </div>
</section>

<script>
let allGenres = {};
$.get(`${apiBaseUri}genres`, function(data) {
    allGenres = data; 
    loopGenresAndAppendToHtml(data.genres);
  });


  let allMovies = {};
  $.get(`${apiBaseUri}movies`, function(data) {
    allMovies = data; 
    loopMoviesAndAppendToHtml(data.movies);
  });


  function loopGenresAndAppendToHtml(genresArray) {
    
    let genresHTML = '<option value="all">All</option>';
    genresArray.forEach(function(genre) {
      genresHTML += loadGenresFromTemplate(
        genre
      );
    });
    $('#categories').html(genresHTML);

  }
  function loopMoviesAndAppendToHtml(moviesArray) {
    let moviesHTML = '';
    moviesArray.forEach(function(movie) {
      moviesHTML += loadMoviesFromTemplate(
        movie.original, 
        formatGenres(movie.original.genres),
        formatDate(movie.original.releaseDate)
      );
    });
    $('.movies').html(moviesHTML);
  }
  
  function loadMoviesFromTemplate(movie, genres, releaseDate) {
    return `<a href="${'<?= WEB_URL ?>'}movies-details.php?id=${movie.id}" class="movies-item" title="${movie.name}">
              <img src="https://image.tmdb.org/t/p/w220_and_h330_face/${movie.poster}" alt="${movie.name}">
              <div class="genders">${genres}</div>
              <h3 class="title">${movie.name}</h3>
              <time class="release-date">${releaseDate}</time>
              <div class="overview">${movie.overview}</div>
          </a>`;
  }
  
  function loadGenresFromTemplate(genre) {
    return `<option value="${genre}">${genre}</option>`;
  }

</script>