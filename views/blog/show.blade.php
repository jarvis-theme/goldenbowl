        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-3">
                @if(count(list_blog_category()) > 0)
                 <div class="left-sidebar">
                    <ul id="category"> 
                    @foreach(list_blog_category() as $kat)
                        @if(!empty($kat->nama)) 
                        <li>
                            <a href="{{blog_category_url($kat)}}">{{$kat->nama}} </a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
                @endif
                @if(count(new_product()) > 0)
                <div class="left-section">
                    <div class="header-left-section">
                        <h1>Produk Baru</h1>
                    </div>
                    <div class="product">
                        <ul id="tab-product-new">
                            @foreach(new_product() as $newproduk)
                            <li>
                                <div class="product-new">
                                    <a href="{{product_url($newproduk)}}">
                                        {{HTML::image(product_image_url($newproduk->gambar1,'thumb'),$newproduk->nama)}}
                                    </a>
                                    <div class="tab-product-name">
                                        <h3 class="product-name">
                                            <a href="{{product_url($newproduk)}}">
                                                {{short_description($newproduk->nama,25)}}
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="tab-price">
                                        <h3 class="price">{{price($newproduk->hargaJual)}}</h3>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{url('produk')}}" class="link-more-product">Lihat Semua</a>
                    </div>
                </div>
                @endif
                @if(count(recentBlog()) > 0)
                <div class="left-section">
                    <div class="header-left-section">
                        <h1>Artikel</h1>
                    </div>
                    @foreach(recentBlog(null,5) as $artikel)
                        <div class="product">
                            <div class="tips-post">
                                <h3><a href="{{blog_url($artikel)}}">{{short_description($artikel->judul, 20)}}</a></h3>
                                <p>{{short_description($artikel->isi, 46)}}<a href="{{blog_url($artikel)}}" class="read-more">Selengkapnya</a></p>
                                <span class="date">{{date("F d, Y", strtotime($artikel->created_at))}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                @if(count(vertical_banner()) > 0)
                <div class="banner-left">
                    @foreach(vertical_banner() as $banners)
                        <a href="{{URL::to($banners->url)}}">
                            {{HTML::image(banner_image_url($banners->gambar),'Info Promo')}}
                        </a>
                    @endforeach
                </div>
                @endif
                @if(!empty($mailing->action))
                {{ Theme::partial('subscribe') }}
                @endif
            </div>
            <div class="col-sm-8 col-md-9 col-lg-9">
                <div class="row">
                    <div id="single-typical" class="detail-blog">
                        <div class="tabs-title-typical">
                            <h1></h1>
                        </div>
                        <div class="tabs-description">
                                <h3>{{$detailblog->judul}}</h3>
                                <div class="col-xs-12 col-md-6 tags">
                                    <small><i class="fa fa-calendar"></i> {{waktuTgl($detailblog->created_at)}}</small>&nbsp;&nbsp;
                                    @if(!empty($detailblog->kategori->nama))
                                    <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$detailblog->kategori)}}">{{@$detailblog->kategori->nama}}</a></span>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-md-6" id="sosmed">
                                    {{sosialShare(blog_url($detailblog))}}
                                </div>
                                <br>
                                <p>{{$detailblog->isi}}</p>
                       
                            <hr>
                            <div class="navigate comments clearfix">
                                @if(isset($prev))
                                    <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                                @else
                                    <div class="pull-right"></div>
                                @endif
                                @if(isset($next))
                                    <div class="pull-right">
                                    <a class="pull-right" href="{{$next->slug}}">Selanjutnya &rarr;</a>
                                    </div>
                                @else
                                    <div class="pull-right"></div>
                                @endif
                            </div>
                            <hr>
                            <div>
                                {{$fbscript}}
                                {{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>