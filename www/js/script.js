$(function(){

  $('*[data-auto-controller]').each(function() {
      var plg;
      if ((plg = $(this)['attach' + $(this).data('auto-controller')])) {
        return plg.call($(this));
      }
  });
});