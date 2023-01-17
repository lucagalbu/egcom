/* Script based on the masonry package by https://masonry.desandro.com/.
This script allows to position a grid of elements in a masonry way.*/

// Use a IIFE to not pollute the global environment
// Use jQuery because wordpress doesn't expose the alias $
// (i.e., jQuery is in compatibility mode. This ensures to not have
// clashes with other packages exposing $).
(function () {
  jQuery(document).ready(() => {
    const grid = jQuery(".grid").masonry({
      itemSelector: ".grid-item",
      columnWidth: ".grid-sizer",
      gutter: ".gutter-sizer",
      percentPosition: true,
    });

    grid.imagesLoaded(function () {
      grid.masonry("layout");
    });
  });
})();
