<div class="tab-title-top">
    <h1>
        <div class="sortby">
            <span>Mode Tampilan :</span>
            <button class="btn grid_product" title="Grid"><i class="fa fa-th"></i></button>
            <button class="btn list_product" title="List"><i class="fa fa-bars"></i></button>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-sm-4 col-md-3 col-lg-3">
        @if(count(list_category()) > 0)
        <div class="left-sidebar accordion-widget">
            <div class="accordion">
                @foreach(list_category() as $side_menu)
                @if($side_menu->parent == '0')
                <div class="accordion-group">
                    <div class="accordion-heading">
                        @if(count($side_menu->anak) >= 1)
                        <a href="{{category_url($side_menu)}}"><span class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}"></span>
                        @else
                        <a class="collapsed" href="{{category_url($side_menu)}}">
                        @endif  
                            {{$side_menu->nama}}
                        </a>
                    </div>
                    @if($side_menu->anak->count() != 0)
                    <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}" class="accordion-body collapse submenu">
                        <div class="accordion-inner">
                            @foreach($side_menu->anak as $submenu)
                            @if($submenu->parent == $side_menu->id)
                                <div class="accordion-heading">
                                    @if(count($submenu->anak) > 0 )
                                    <a href="{{category_url($submenu)}}"><span href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-toggle collapsed submenu" data-toggle="collapse"></span>
                                    @else
                                    <a href="{{category_url($submenu)}}" class="collapsed">
                                    @endif
                                        {{$submenu->nama}}
                                    </a>
                                </div>
                                @if($submenu->anak->count() != 0)
                                <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-body collapse submenu2">
                                    <ul>
                                        @foreach($submenu->anak as $submenu2)
                                        @if($submenu2->parent == $submenu->id)
                                        <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endif
        @if(count(new_product()) > 0)
        <div class="left-section">
            <div class="header-left-section">
                <h1>Produk Baru</h1>
            </div>
            <div class="product">
                <ul id="tab-product-new">
                    @foreach(new_product() as $newproduk )
                    <li>
                        <div class="product-new">
                            <a href="{{product_url($newproduk)}}">
                                {{HTML::image(product_image_url($newproduk->gambar1,'thumb'), $newproduk->nama)}}
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
        @if(count(recentBlog(null,5)) > 0)
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
        @if(count(list_koleksi()) > 0)
        <div class="left-section list-collection">
            <h1 class="col-xs-12 col-sm-12">Koleksi</h1>
            @foreach (list_koleksi() as $kol)
            <div class="side-collection">
                <div class="col-xs-8 col-sm-8">
                    <a href="{{koleksi_url($kol)}}">{{$kol->nama}}</a>
                </div>
                <div class="clearfix"></div>
            </div>
            @endforeach
        </div>
        @endif
        @if(count(vertical_banner()) > 0)
        <div class="banner-left">
            @foreach(vertical_banner() as $banners)
            <a href="{{url($banners->url)}}">
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
            @if(count(list_product(null, @$category, @$collection)) > 0)
            {{-- */ $i = 1 /* --}}
            <div id="single-categories">
                @foreach(list_product(null, @$category, @$collection) as $listproduk)
                <div class="list col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="post-category">
                        @if(is_outstok($listproduk))
                            <div class="item-icon"><span class="label label-default">KOSONG</span></div>
                        @else
                            @if(is_terlaris($listproduk))
                            <div class="item-icon"><span class="label label-danger">HOT ITEM</span></div>
                            @elseif(is_produkbaru($listproduk))
                            <div class="item-icon"><span class="label label-info">BARU</span></div>
                            @endif
                        @endif
                        <div class="image-container">
                        <a href="{{product_url($listproduk)}}">
                            {{HTML::image(product_image_url($listproduk->gambar1,'medium'), short_description($listproduk->nama,15))}}
                        </a>
                        </div>
                        <div class="col-xs-6 col-sm-6" id="desc-produk" style="display:none;">
                            {{short_description($listproduk->deskripsi, 230)}}
                        </div>
                        
                        <div class="tab-title">
                            <h2>{{short_description($listproduk->nama,20)}}</h2>
                            @if(!empty($listproduk->hargaCoret))
                            <h2><strike>{{price($listproduk->hargaCoret)}}</strike></h2>
                            @endif
                            <h2 class="{{empty($listproduk->hargaCoret) ? 'price htgcoret' : 'price'}}"><strong>{{price($listproduk->hargaJual)}}</strong></h2>
                            <a href="{{product_url($listproduk)}}" class="add-chart">Lihat</a>
                        </div>
                    </div>
                </div>
                @if($i % 2 == 0)
                <div class="visible-xs clearboth"></div>
                @endif
                {{-- */ $i++ /* --}}
                @endforeach
            </div>
            <div class="col-xs-12">
                {{list_product(null, @$category, @$collection)->links()}}
            </div>
            @else
            <article class="text-center">
                <i>Produk tidak ditemukan</i>
            </article>
            @endif
        </div>
    </div>
</div>