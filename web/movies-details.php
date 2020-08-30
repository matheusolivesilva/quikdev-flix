<?php require_once 'header.php'; ?>

<!-- <section id="movies-details" class="custom-background" style="background: url(https://image.tmdb.org/t/p/w1920_and_h800_multi_faces/mW7JzeknqbrhSojVMA2Fawd8F1x.jpg)">
    <div class="poster">
        <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/crqgqsWcWh9neR4MZg7fgiobWaX.jpg" alt="">
    </div>
    <div class="details">
        <h2 class="name">Bill & Ted Face the Music (2020)</h2>
        <div class="meta-details">
            <span class="release-date"><date>28/08/2020</date</span> 
            <span class="category">Comedy, Science Fiction, Adventure</span>
            <span class="runtime">1h32m</span>
        </div>
        <em>The future awaits</em>
        <h3>Overview</h3>
        <p>Yet to fulfill their rock and roll destiny, the now middle aged best friends Bill and Ted set out on a new adventure when a visitor from the future warns them that only their song can save life as we know it. Along the way, they will be helped by their daughters, a new batch of historical figures, and a few music legends — to seek the song that will set their world right and bring harmony in the universe.</p>
        <ul class="facts-icons">
            <li><span class="fact-value">Status</span><h3>Released</h3></li>
            <li><span class="fact-value">Original Language</span><h3>English</h3></li>
            <li><span class="fact-value">Budget</span><h3>$25,000,000.00</h3></li>
            <li><span class="fact-value">Revenue</span><h3>-</h3></li>
        </ul>
    </div>
</section> -->

<script>
let movieId = <?= $_GET['id'] ?? 0 ?>;
$.get(`${apiBaseUri}movie/${movieId}`, function(data) {
    appendMoviesToHtml(data);
  });

  function appendMoviesToHtml(movie) {
    let movieHTML = '';
    movieHTML += loadMovieFromTemplate(
        movie, 
        formatGenres(movie.genres),
        formatDate(movie.releaseDate),
        formatMoney(movie.budget)
    );
    $('.header').after(movieHTML);
  }

function loadMovieFromTemplate(movie, genres, releaseDate, budget) {
    let backgroundImage =  `https://image.tmdb.org/t/p/w1920_and_h800_multi_faces/${movie.backgroundImage}`;
    let posterImage = `https://image.tmdb.org/t/p/w300_and_h450_bestv2/${movie.poster}`;
    return `<section id="movies-details" class="custom-background" style="background: url(${backgroundImage})">
            <div class="poster">
                <img src="${posterImage}" alt="${movie.name}">
            </div>
            <div class="details">
                <h2 class="name">${movie.name}</h2>
                <div class="meta-details">
                    <span class="release-date"><date>${releaseDate}</date></span> -
                    <span class="category">${genres}</span> -
                    <span class="runtime">${movie.durationInMinutes} Minutes</span>
                </div>
                <em>${movie.tagline}</em>
                <h3>Overview</h3>
                <p>${movie.overview}</p>
                <ul class="facts-icons">
                    <li><span class="fact-value">Status</span><h3>${movie.status}</h3></li>
                    <li><span class="fact-value">Vote Average</span><h3>${movie.voteAverage}</h3></li>
                    <li><span class="fact-value">Vote Count</span><h3>${movie.voteCount}</h3></li>
                    <li><span class="fact-value">Budget</span><h3>${budget}</h3></li>
                </ul>
            </div>
        </section>`;
}
</script>
<?php require_once 'footer.php'; ?>