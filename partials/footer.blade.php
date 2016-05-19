    <div class="option-bottom">
        <div class="container2">
            <div class="row">
                @foreach(horizontal_banner() as $banners)
                <div class="adv-full col-xs-12 col-sm-12">
                    <a href="{{url($banners->url)}}">
                        {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive banner'))}}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div id="footer">
        <div class="row">
            <div class="tab-links">
                <div class="link">
                    <div class="title-point">
                        <h2>Main Menu</h2>
                    </div>
                    <ul>
                        @foreach(main_menu()->link as $key=>$link)
                        <li><a href="{{menu_url($link)}}"> {{$link->nama}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @foreach(all_menu() as $key=>$menu)
                    @if($key == '1' || $key == '2')
                    <div class="link">
                        <div class="title-point">
                            <h2>{{$menu->nama}}</h2>
                        </div>
                        <ul>
                        @foreach($menu->link as $link_menu)
                            @if($menu->id == $link_menu->tautanId)
                            <li>
                                <a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a>
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    @endif
                @endforeach
                <div class="link">
                    <div class="title-point">
                        <h2>Contact</h2>
                    </div>
                    <ul>
                        @if(!empty($kontak->email))
                        <li><a href="mailto:{{$kontak->email}}"> {{$kontak->email}}</a></li>
                        @endif
                        @if(!empty($kontak->telepon))
                        <li><a href="#"> {{$kontak->telepon}}</a></li>
                        @endif
                        @if(!empty($kontak->hp))
                        <li><a href="#"> {{$kontak->hp}}</a></li>
                        @endif
                        @if(!empty($kontak->bb))
                        <li><a href="#"> {{$kontak->bb}}</a></li>
                        @endif
                        @if(!empty($kontak->ym))
                        <li>{{ymyahoo($kontak->ym)}}</li>
                        @endif
                    </ul>
                </div>
                <div class="link">
                    <div class="title-point">
                        <h2>Alamat</h2>
                    </div>
                    <ul>
                        @if(!empty($kontak->nama))
                        <li><a class="toko"> {{$kontak->nama}}</a></li>
                        @endif
                        @if(!empty($kontak->alamat))
                        <li><a> {{$kontak->alamat}}</a></li>
                        @endif 
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="bank">
                @if(list_banks()->count() > 0)
                    @foreach(list_banks() as $value)
                    <img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}">
                    @endforeach
                @endif
                @if(count(list_payments()) > 0)
                    @foreach(list_payments() as $pay)
                        @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                        <img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                        @endif
                        @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                        <img src="{{url('img/bitcoin.png')}}" alt="bitcoin" title="Bitcoin" />
                        @endif
                        @if($pay->nama == 'paypal' && $pay->aktif == 1)
                        <img src="{{url('img/bank/paypal.png')}}" alt="paypal" title="Paypal" />
                        @endif
                    @endforeach
                @endif
                @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                <img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku" />
                @endif
                @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                <img src="{{url('img/bank/veritrans.png')}}" alt="Veritrans" title="Veritrans">
                @endif
            </div>
            <div class="copyright">
                <p class="left-company">
                    &copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. Powered by <a class="title-copyright" href="http://jarvis-store.com" target="_blank"> Jarvis Store</a>
                </p>
            </div>
            <div class="social-media">
                <span id="footer-sosmed">Ikuti Kami</span>
                @if(!empty($kontak->fb))
                <a href="{{url($kontak->fb)}}">
                    <div class="icon" title="Facebook"><i class="fa fa-facebook"></i></div>
                </a>
                @endif
                @if(!empty($kontak->tw))
                <a href="{{url($kontak->tw)}}">
                    <div class="icon" title="Twitter"><i class="fa fa-twitter"></i></div>
                </a>
                @endif
                @if(!empty($kontak->gp))
                <a href="{{url($kontak->gp)}}">
                    <div class="icon" title="Google+"><i class="fa fa-google-plus"></i></div>
                </a>
                @endif
                @if(!empty($kontak->pt))
                <a href="{{url($kontak->pt)}}">
                    <div class="icon" title="Pinterest"><i class="fa fa-pinterest"></i></div>
                </a>
                @endif
                @if(!empty($kontak->tl))
                <a href="{{url($kontak->tl)}}">
                    <div class="icon" title="Tumblr"><i class="fa fa-tumblr"></i></div>
                </a>
                @endif
                @if(!empty($kontak->ig))
                <a href="{{url($kontak->ig)}}">
                    <div class="icon" title="Instagram"><i class="fa fa-instagram"></i></div>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>