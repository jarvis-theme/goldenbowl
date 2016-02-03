        <div class="tab-title-top">
            <h1>Daftar Member</h1>
        </div>

        <div class="register-page">
            <span>Jika anda telah memiliki akun, maka anda dapat langsung menuju <a href="{{url('member')}}">halaman login</a></span>
            {{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
                <table class="col-xs-10 col-md-6">
                    <tr>
                        <td>Nama</td><td><input type="text" class="field-reg" name="nama" value="{{Input::old('nama')}}" required></td>
                    </tr>
                    <tr>
                        <td>Email</td><td><input type="email" class="field-reg" name="email" value="{{Input::old('email')}}" required></td>
                    </tr>
                    <tr>
                        <td>Password</td><td><input type="password" class="field-reg" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Konfirmasi Password</td><td><input type="password" class="field-reg" name="password_confirmation" required></td>
                    </tr>
                    <tr>
                        <td>Alamat</td><td><textarea class="field-reg" name="alamat" required>{{Input::old("alamat")}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Negara</td>
                        <td>
                            {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara,Input::old('negara'),array('required', 'id="negara" data-rel="chosen" class="field-reg"'))}}
                        </td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>
                            {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', 'id="provinsi" data-rel="chosen" class="field-reg"'))}}
                        </td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td>
                            {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"),array('required', 'id="kota" data-rel="chosen" class="field-reg"'))}}
                        </td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td><td><input type="text" class="field-reg" name="kodepos" value="{{Input::old('kodepos')}}"></td>
                    </tr>
                    <tr>
                        <td>Telepon / HP</td><td><input type="text" class="field-reg" name="telp" value="{{Input::old('telp')}}" required></td>
                    </tr>
                    <tr>
                        <td>Captcha</td><td>{{ HTML::image(Captcha::img(), 'Captcha image') }}
                        {{Form::text('captcha','',array('class'=>'field-reg','id'=>'captcha'))}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="readme" id="inlineCheckbox1" value="1" required> Saya telah membaca dan menyetujui 
                        <a href="{{url('service')}}" target="_blank">Persyaratan Member</a></td><td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn-submit" value="Register"></td><td>&nbsp;</td>
                    </tr>
                </table>
            {{Form::close()}}
        </div>