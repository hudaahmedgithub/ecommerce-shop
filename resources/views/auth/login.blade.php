@guest
<div class="user_login">
    <!-- Login The User -->
 <!-- Modal -->
    <div class="modal fade" id="Login_Modal" tabindex="-1" role="dialog" aria-labelledby="Login_ModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="Login_ModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon" for="the_email">
                                    <i class="fa fa-envelope"></i>
                                </label>
                                <input name="email" class="form-control input-lg " id="the_email" required type="email" placeholder="Your Email">
                            </div>
                        </div>

                        @error('email')
                            <div class="invalid-feedback alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon" for="the_pass">
                                    <i class="fa fa-lock"></i>
                                </label>
                                <input name="password" class="form-control  input-lg" id="the_pass" required type="password" placeholder="Your Password">
                            </div>
                        </div>

                        @error('password')
                            <div class="invalid-feedback alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        

                        <button class="btn btn-success btn-block btn-lg">
                            <i class="fa fa-sign-in"></i> Log in
                        </button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Login The User -->
</div>
@endguest
