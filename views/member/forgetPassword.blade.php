            <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1">
                <h1 class="member-title">Lupa Password</h1>
                <p class="deskripsi">Masukkan email untuk mengatur kembali password anda.</p>
                <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control" name="recoveryEmail" placeholder="Email Anda" required>
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="submit">Reset Password</button>
                        </span>
                    </div>
                    <br><br>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1">
                <h1 class="member-title">Pelanggan Baru</h1>
                <p class="deskripsi">Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</p>
                <div class="input-group">
                    <a href="{{url('member/create')}}" class="btn btn-danger">Daftar</a>
                </div>
                <br><br>
            </div>
            
