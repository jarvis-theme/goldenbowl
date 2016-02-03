        <div class="tab-title-top">
            <h1>Lupa Password</h1>
        </div>

        <div class="login-page">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6 mg">
                    <br>
                    {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-4">Password Baru</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" placeholder="Password Baru" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2" class="col-sm-4">Konfirmasi Password Baru</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update Password</button>
                            </div>
                        </div>
                    {{Form::close()}}
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-5">
                    @if(count(vertical_banner()) > 0)
                    <div class="banner-left">
                        @foreach(vertical_banner() as $banners)
                            <a href="{{url($banners->url)}}">
                                {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'bn'))}}
                            </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>