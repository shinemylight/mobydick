$.fn.extend({
    formify: function(success, error) {
      var url = $(this).attr('action');
      $(this).attr('action', 'javascript:void(null);');
      $(this).submit(function() {
        var fields = [];
        $(this)
            .find('input')
            .each(function(i, e) {
                fields.push({
                    name: $(e).attr('name'),
                    value: $(e).val() 
                });
            });
        $.ajax({
           type: 'POST',
           url: url,
           data: fields,
           success: function(data) {
               success(data);
           },
           error: function(xhr) {
               error(xhr);
           }
        });
      });
    } 
});