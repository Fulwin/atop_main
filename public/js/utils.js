$(document).ready(function(){
  if($('#dialog-form').length > 0) {
    var submitTxt = $('#submitTxt').data('txt');
    var cancelTxt = $('#cancelTxt').data('txt');
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

    modal.addFooterBtn(submitTxt, 'tingle-btn tingle-btn--primary tingle-btn--pull-right', function() {
        // here goes some logic
        var code = $("#quote-product-code").val();
        var name = $("#quote-name").val();
        var email = $("#quote-email").val();
        var message = $("#quote-message").val();
        //
        console.log(code);
        console.log(name);
        console.log(email);
        console.log(message);
        var data = {
          code: code,
          name: name,
          email: email,
          message: message
        };
        $("#request-quote-form").submit();
    });

    modal.addFooterBtn(cancelTxt, 'tingle-btn tingle-btn--default tingle-btn--pull-right', function(e) {
        // here goes some logic
        e.preventDefault();
        modal.close();
    });


    $("#request-btn-trigger").on('click', function(e){
      e.preventDefault();
      modal.open();
    });
  }
});
