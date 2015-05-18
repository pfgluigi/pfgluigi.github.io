/*
 * Here is an example of how to use Backstretch as a slideshow.
 * Just pass in an array of images, and optionally a duration and fade value.
 */

  // Duration is the amount of time in between slides,
  // and fade is value that determines how quickly the next image will fade in
  $("#home").backstretch([
      "images/header-background.jpg"
    , "https://wallwidehd.com/wp-content/uploads/Clound-Code-Rain-Black-Wallpaper.jpg"
    , "images/back3.jpg"
  ], {duration: 5500, fade: 1250});
