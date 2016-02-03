        <div class="tab-title-top">
            <h1>Login Member</h1>
        </div>

        <div class="login-page">
            <div class="row">
                <div class="col-sm-6 login">
                    <div class="login-wrap">
                        <h1>Sudah punya akun? Silahkan login</h1>
                        <form action="{{url('member/login')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{url('member/forget-password')}}" class="forgot">Lupa Password?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="login-desc">
                        <h1>Segeralah mendaftar</h1>
                        <span>Dengan mendaftar, anda dapat berbelanja dengan lebih cepat!!</span>
                    </div>
                    <div class="tabs-btn-login">
                        <a href="{{url('member/create')}}" class="register">Register</a>
                    </div>
                </div>
            </div>
        </div>