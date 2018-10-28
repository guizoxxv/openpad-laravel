<div class="remodal" data-remodal-id="modal-check-password">

  <button data-remodal-action="close" class="remodal-close"></button>

  <i class="i-title fa fa-lock fa-2x" aria-hidden="true"><span>Check Password</span></i>

  <form method="post" action="{{ route('check_password') }}">

    {{ csrf_field() }}

    <input type="hidden" name="name" value="{{ $file->name }}">

    <input class="password-input" type="password" name="password" maxlength="10" pattern="[a-zA-Z0-9!@#$%&amp;*\-_+=]{3,10}" placeholder="Enter password" required>

    <div class="break"></div>

    @include('includes/errors')

    <div class="break"></div>

    <button class="remodal-confirm" type="submit" name="submit-pass">OK</button>

    <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>

    <div class="break"></div>

  </form>

</div>
