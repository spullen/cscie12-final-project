$(document).ready(function() {
  var pageId = $('body').attr('id');
  if(pageId !== '') {
    $('#nav-' + pageId).addClass('selected');
  }
});