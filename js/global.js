jQuery(document).ready(function($) {

$("img.lazy").lazyload({
  effect : "fadeIn"
});

$("img.lazy-article").lazyload({
  effect : "fadeIn",
  event : "sporty"
});

$('.ideas-list__item__inner').magnificPopup({
   removalDelay: 300,
  mainClass: 'mfp-fade',
  type:'inline',
  midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
  gallery:{
    enabled:true
  },

  callbacks: {
    open: function() {
      // this - is Magnific Popup object
      var str = this.currItem.src.substr(1)
      window.location.hash = '#!/'+str;

      $("img.lazy-article").trigger("sporty");
    },
    close: function() {
      window.location.hash = '';
    },
    change: function() {
      var str = this.currItem.src.substr(1)
      window.location.hash = '#!/'+str;
    }
  }

});


if (window.location.hash) {
  var hash = window.location.hash.substring(3);
  $('[data-mfp-src="#'+hash+'"]').trigger('click');
}

});