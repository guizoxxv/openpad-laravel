<div class="remodal" data-remodal-id="modal-change-password">

  <button data-remodal-action="close" class="remodal-close"></button>

  <i class="i-title fa fa-lock fa-2x" aria-hidden="true"><span>Change Password</span></i>

  <form class="change-password-form" method="post" action="{{ route('change_password') }}">

    {{ csrf_field() }}

    <input type="hidden" name="name" value="{{ $file->name }}">

    <div class="hint--top hint--rounded hint--bounce" aria-label="3-10 characters. [ a-z ], [ 0-9 ] or [ !@#$%&amp;*-_+= ]">

      <input id="password-input" class="password-input" type="password" name="password" maxlength="10" pattern="[a-zA-Z0-9!@#$%&amp;*\-_+=]{3,10}" placeholder="Enter new password" required>

    </div>

    <div class="break"></div>

    <input id="password-confirmation-input" class="password-input" type="password" name="password_confirmation" maxlength="10" pattern="[a-zA-Z0-9!@#$%&amp;*\-_+=]{3,10}" placeholder="Confirm password" required>

    <div class="break"></div>

    @include('includes/errors')

    <div class="break"></div>

    <button class="remodal-confirm" type="submit" name="submit-pass">OK</button>

    <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>

  </form>

</div>
