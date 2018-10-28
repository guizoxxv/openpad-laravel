$(document).ready(function() {

  $('textarea').each(function() { // Resize textarea on load
    this.style.height = (this.scrollHeight+2)+ 'px'; // scrollHeight is js to element height considering scroll. 2 accounts for border
  });

  $('.text-input').on('input', function() { // Resize textarea on input
    $(this).css('height', '0px'); // Reset height, so that it not only grows but also shrinks
    this.style.height = (this.scrollHeight+2) + 'px'; // Set new height
  });

  // Display and fadeout .fader when not empty on page load
  if($('.fader').children().length > 0) {

    $('.fader').show().fadeOut(4000);

  }

  $('.more-less-btn').click(function() {

    $('.more-less-btn').toggleClass('fa-minus-square').toggleClass('fa-plus-square'); // Toggle .more-less-btn icon

    // Toggle .more-less-btn title
    if($('.more-less-btn').prop('title') === 'Show less') {
      $('.more-less-btn').attr('title', 'Show more');
    } else {
      $('.more-less-btn').attr('title', 'Show less');
    }

    $('header, .inner-header, .password-wrapper, .submit-create, footer').slideToggle(500);
    $('textarea').toggleClass('textarea-full');

    $('.text-input').css('height', '0px'); // Reset height, so that it not only grows but also shrinks
    document.getElementsByClassName('text-input').style.height = (this.scrollHeight+2) + 'px'; // Set new height

  });

  // Front-end validate if password is confirmed
  $('.change-password-form').submit(function(e) {

    var pass1 = $('#password-input').val();
    var pass2 = $('#password-confirmation-input').val();

    if(pass1 !== pass2) {

      var msg = '<li>Passwords did not match</li>';

      $('.errors-wrapper').finish().html(msg).show().fadeOut(4000);
      e.preventDefault();

    }

  });

  // Clear modal when closed
  $(document).on('closed', '.remodal', function(e) {

    $('.remodal input').val('');
    $('.errors-wrapper').finish();

  });

  var clipboard = new Clipboard('.copy-btn');

  clipboard.on('success', function(e) {

    $classes = 'hint--bottom hint--always hint--rounded';
    $ariaLabel = 'Copied!';

    e.clearSelection(); // Remove selection from target text

    $(e.trigger).addClass($classes); // Add hint tooltip classes
    $(e.trigger).attr('aria-label', $ariaLabel); // Add text to be displayed

    setTimeout(function() {

      $(e.trigger).removeClass($classes);
      $(e.trigger).removeAttr('aria-label');

    }, 2500); // Run after 2.5s

  });

});
