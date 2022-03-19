$(function() {
    $('.pop').on('click', function() {
      console.log('jQuery injected');
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');   
    });		
  });