$(function() {
  $('*[data-auto-controller]').each(function() {
    var plg;
    var result;
    controllers = $(this).data('auto-controller').split(" ");
    for (i = 0; i < controllers.length; ++i) {
      if ((plg = $(this)['attach' + controllers[i]])) {
        result = plg.call($(this));
      }
    }
    return result;
  });
});