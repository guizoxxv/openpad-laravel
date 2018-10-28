$(document).ready(function() {

  var timeout;

  $('.name-input').on('input', function() {

    // Restart timeout countdown on input
    clearTimeout(timeout);

    $('.status-wrapper').hide();
    $('.errors-wrapper').finish().html('');

    // Default submits button are hidden
    $('.submit-load').prop('disabled', true);
    $('.submit-create').prop('disabled', true);

    // Get value from inputs
    var nameInput = $('.name-input').val();

    // Add new regular expression variable
    var pattern = new RegExp('[a-z0-9_-]{3,10}');

    // Check if input is valid
    if(pattern.test(nameInput) === true) {

      // Runs 1s after user stops typing
      timeout = setTimeout(function() {

        var loading = '<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>';

        $('.status-wrapper').html(loading).show();

        setTimeout(function() {

          // Include csrf-token by default for AJAX requests
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          // AJAX request
          $.ajax({

            type: 'post',
            url: '/check_name',
            dataType: 'json',
            data: {
              name: nameInput
            },
            success: function(data) {

              var status;

              if(data.exists === true) {

                var matchStatus = '<i class="match-status fa fa-check" aria-hidden="true"><span>Match found</span></i>';

                $('.submit-create').prop('disabled', true);
                $('.submit-load').prop('disabled', false);
                $('.status-wrapper').html(matchStatus);

              } else if(data.exists === false) {

                notMatchStatus = '<i class="no-match-status fa fa-times" aria-hidden="true"><span>No match found</span></i>';

                $('.submit-create').prop('disabled', false);
                $('.submit-load').prop('disabled', true);
                $('.status-wrapper').html(notMatchStatus);

              }

            },
            error: function(data) {

              var errors = data.responseJSON;

              if(errors === undefined) {

                alert('Request error');

              } else {

                $.each(errors, function(index, error) {
                  $('.errors-wrapper').append('<li>' + error[0] + '</li>');
                });
                $('.errors-wrapper').show().fadeOut(4000);

              }

            }

          });


        }, 500);

      }, 1000);

    }

  });

  $('.text-input').on('keyup', function() {

    // Restart timeout countdown on keyup
    clearTimeout(timeout);

    $('.status-wrapper').finish().hide();

    // Get value from inputs
    var nameInput = $('.update-name-input').val();
    var textInput = $('.text-input').val();

    // Runs 2s after user stops typing
    timeout = setTimeout(function() {

      var loading = '<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>';

      $('.status-wrapper').html(loading).show();

      setTimeout(function() {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // AJAX request
        $.ajax({

          type: 'post',
          url: '/file/update_text',
          data: {
            name: nameInput,
            text: textInput
          },
          success: function() {

            var savedStatus = '<i class="saved-status fa fa-check-circle-o fa-2x" aria-hidden="true"><span>Saved</span></i>';

            $('.status-wrapper').html(savedStatus).show().fadeOut(2000);

          },
          error: function() {

            alert('Ajax request error');

          },

        });

      }, 500);

    }, 2000);

  });

});
