var apikey = "d7nv9fy6ey99bmt8hhhxvmjy";
var baseUrl = "http://api.rottentomatoes.com/api/public/v1.0";
var limit = 20;
var upcomingUrl = "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?apikey="+apikey+"&page_limit="+limit;
// construct the uri with our apikey
var moviesSearchUrl = baseUrl + '/movies.json?apikey=' + apikey;
var query;


$(document).ready(function() {
    // this gets upcoming movies and displays.r
    $.ajax({
        url: upcomingUrl,
        dataType: "jsonp",
        success: searchCallback
    });


    $("#sendButton").click(function() {     // this is the search function
        query = $("#inputBox").val();
        $.ajax({
            url: moviesSearchUrl + '&q=' + encodeURI(query),
            dataType: "jsonp",
            success: searchCallback

        });
    });
});



// callback for when we get back the results (used for both the search function and upcoming function)
function searchCallback(data) {

    $(document.body).append('Found ' + data.total + ' results for ' + query);
    var movies = data.movies;

    $.each(movies, function(index, movie) {
        $(document.body).append('<h1>' + movie.title + '</h1>');
        $(document.body).append('<img src="' + movie.posters.thumbnail + '" />');
        $(document.body).append('<p>' + movie.synopsis+'</p>');
    });
}
/**
 * Created by Mattz on 7/16/14.
 */




    // Below is the format for movie info. So you we set the variable "movies" above contains an array of these
    // So when you use a for each loop (above - $.each(movies, function(index, movie) { }); is the loop
    // "movie.title" will print the first movie's title. "movie.synopsis" will print the others.
    // all of these are being grabbed from the sections below, see "posters" and we can get the thumbnail
    // image by typing "movie.posters.thumbnail" ?

    // These are JSON objects and that's how they work.
    // If you wanted to get the MPAA Rating you could type
            // movies.mpaa_rating


    // If any of this doesn't make sense, let me know. Thanks

    /*
    {
  "total": 29,
  "movies": [{
    "id": "770863875",
    "title": "Cowboys and Aliens",
    "year": 2011,
    "mpaa_rating": "PG-13",
    "runtime": "",
    "release_dates": {"theater": "2011-07-29"},
    "ratings": {
      "critics_score": -1,
      "audience_score": 94
    },
    "synopsis": "1875. New Mexico Territory. A stranger (Craig) with no memory of his past stumbles into the hard desert town of Absolution. What he discovers is that the people of Absolution don't welcome strangers, and nobody makes a move on its streets unless ordered to do so by the iron-fisted Colonel Dolarhyde (Ford). It's a town that lives in fear.  But Absolution is about to experience fear it can scarcely comprehend as the desolate city is attacked by marauders from the sky. Now, the stranger they rejected is their only hope for salvation. As this gunslinger slowly starts to remember who he is and where he's been, he realizes he holds a secret that could give the town a fighting chance against the alien force. -- (C) Official Site",
    "posters": {
      "thumbnail": "http://content8.flixster.com/movie/11/15/42/11154270_mob.jpg",
      "profile": "http://content8.flixster.com/movie/11/15/42/11154270_pro.jpg",
      "detailed": "http://content8.flixster.com/movie/11/15/42/11154270_det.jpg",
      "original": "http://content8.flixster.com/movie/11/15/42/11154270_ori.jpg"
    },
    "abridged_cast": [
      {
        "name": "Daniel Craig",
        "characters": ["Zeke Jackson"]
      },
      {
        "name": "Olivia Wilde",
        "characters": [
          "Ella",
          "Ella Swenson"
        ]
      },
      {
        "name": "Harrison Ford",
        "characters": [
          "Colonel Dolarhyde",
          "Woodrow Dolarhyde"
        ]
      },
      {
        "name": "Sam Rockwell",
        "characters": ["Doc"]
      },
      {
        "name": "Paul Dano",
        "characters": [
          "Percy",
          "Percy Dollarhyde"
        ]
      }
    ],
    "alternate_ids": {"imdb": "0409847"},
    "links": {
      "self": "http://api.rottentomatoes.com/api/public/v1.0/movies/770863875.json",
      "alternate": "http://www.rottentomatoes.com/m/cowboys_and_aliens/",
      "cast": "http://api.rottentomatoes.com/api/public/v1.0/movies/770863875/cast.json",
      "clips": "http://api.rottentomatoes.com/api/public/v1.0/movies/770863875/clips.json",
      "reviews": "http://api.rottentomatoes.com/api/public/v1.0/movies/770863875/reviews.json",
      "similar": "http://api.rottentomatoes.com/api/public/v1.0/movies/770863875/similar.json"
    }
  }],
  "links": {
    "self": "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?page_limit=1&country=us&page=1",
    "next": "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?page_limit=1&country=us&page=2",
    "alternate": "http://www.rottentomatoes.com/movie/upcoming.php"
  },
  "link_template": "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?page_limit={results_per_page}&page={page_number}&country={country-code}"
}
     */

