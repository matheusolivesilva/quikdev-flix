$(document).ready(function() {
  $('#search input').on('input', function(e) {
    e.preventDefault();
    searchMovies();
    isNotFoundMovies();
  });

  $('#search input').on('input',function() {
    if($(this).val().length > 0) {
        $('#search button span').text('Clear');
        $('#search button').addClass('clear-search-field');
        $('#search button i').removeClass('fas fa-search');
        $('#search button i').addClass('fas fa-times');
        return;
    } 
    $('#search button').trigger('click');    
  });

  $('#search button').on('click', function() {
    if($(this).hasClass('clear-search-field')) {
      $('#search input').val('');
      $('#search button').removeClass('clear-search-field');
      $('#search button span').text('Search');
      $('#search button i').removeClass('fas fa-times');
      $('#search button i').addClass('fas fa-search');    
      isNotFoundMovies();
      jQuery('.not-found').hide(300);
    }
  });

  function searchMovies() {
    let keyword = $("#search input").val().toLowerCase();
    let foundMovies = allMovies.movies.filter(function(movie) {
	    let movieName = movie.original.name.toLowerCase();
      return movieName.indexOf(keyword) !== -1;
    });
    loopMoviesAndAppendToHtml(foundMovies);
  }

  function isNotFoundMovies() {
    if(jQuery('.movies').children().length === 0) {
        jQuery('.not-found').show(300);
        return;
    }
    jQuery('.not-found').hide(300);
  }
});