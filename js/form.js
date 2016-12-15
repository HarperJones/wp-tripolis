
;(function($){

  $(document).on('submit','[data-wptripolis]',function(e) {
    console.log("SUBMIT");
    var formId     = $(this).data('wptripolis'),
        formStatus = $(this).find('[data-wptripolis-form-message]');
        payload    = {
          form: formId,
          action: 'wptripolis_form',
          fields: {}
        };

    $(this).find('[data-wptripolis-field]').each(function() {
      payload.fields[$(this).attr('id')] = $(this).val();
    });

    formStatus.html(wptripolis_forms.submitting);

    $.post(wptripolis_forms.ajaxurl,payload,function(data) {
      formStatus.html(data.message)
      if ( data.status ) {
        formStatus.addClass('success').removeClass('error');
      } else {
        formStatus.addClass('error').removeClass('success');
      }
    },'json');

    // Prevent normal submit
    e.preventDefault();
  });
})(jQuery);