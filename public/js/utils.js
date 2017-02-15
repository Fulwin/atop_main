$(document).ready(function(){
  var modal = new tingle.modal({
      footer: true,
      stickyFooter: false,
      closeLabel: "Close",
      cssClass: ['custom-class-1', 'custom-class-2'],
      onOpen: function() {
          console.log('modal open');
      },
      onClose: function() {
          console.log('modal closed');
      },
      beforeClose: function() {
          // here's goes some logic
          // e.g. save content before closing the modal
          return true; // close the modal
      	return false; // nothing happens
      }
  });

  // set content
  var requireForm = $('#dialog-form').html();
  modal.setContent(requireForm);

  modal.addFooterBtn('Submit', 'tingle-btn tingle-btn--primary tingle-btn--pull-right', function() {
      // here goes some logic
      let code = $("#quote-product-code").val();
      let name = $("#quote-name").val();
      let email = $("#quote-email").val();
      let message = $("#quote-message").val();
      //
      console.log(code);
      console.log(name);
      console.log(email);
      console.log(message);
      let data = {
        code: code,
        name: name,
        email: email,
        message: message
      };
      $("#request-quote-form").submit();
  });

  modal.addFooterBtn('Cancel', 'tingle-btn tingle-btn--default tingle-btn--pull-right', function(e) {
      // here goes some logic
      e.preventDefault();
      modal.close();
  });


  $("#request-btn-trigger").on('click', function(e){
    e.preventDefault();
    modal.open();
  });
});
