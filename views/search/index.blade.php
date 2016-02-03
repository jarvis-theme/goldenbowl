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
                @if(count(list_blog()) > 0)
                <div class="left-section">
                    <div class="header-left-section">
                        <h1>Artikel</h1>
                    </div>
                    @foreach(list_blog(5) as $artikel)
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
                @if(!empty($mailing->action))
                {{ Theme::partial('subscribe') }}
                @endif
            </div>
            <div class="col-sm-8 col-md-9 col-lg-9">
                <div class="row" id="search">
                    @if($jumlahCari != 0)
                        @if(count($hasilpro) > 0)
                        <div id="single-categories">
                            @foreach($hasilpro as $listproduk)
                            <div class="list col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="post-category">
                                    <div class="image-container">
                                        {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama)}}
                                    </div>
                                    <div class="tab-title">
                                        <h2>{{short_description($listproduk->nama,22)}}</h2>
                                        <h2 class="price"><strong>{{price($listproduk->hargaJual)}}</strong></h2 class="price">
                                        <a href="{{product_url($listproduk)}}" class="add-chart">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$hasilpro->links()}}
                        @endif
                        @if(count($hasilhal) > 0 || count($hasilblog) > 0)
                        <div id="single-typical">
                            <div class="tabs-description">
                                @foreach($hasilhal as $blog)
                                <article class="col-lg-12 src-result">
                                    <hr>
                                    <h3>{{$blog->judul}}</h3>
                                    <p>
                                        <small><i class="fa fa-calendar"></i> {{waktuTgl($blog->created_at)}}</small>&nbsp;&nbsp;
                                        <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog->kategori)}}">{{@$blog->kategori->nama}}</a></span>
                                    </p>
                                    <p>
                                        {{shortDescription($blog->isi,300)}}<br>
                                        <a href="{{blog_url($blog)}}" class="theme">Baca Selengkapnya →</a>
                                    </p>
                                </article>
                                @endforeach
                                @foreach($hasilblog as $blog_result)  
                                <article class="col-lg-12 src-result">
                                    <h3 class="src-title">
                                        <strong><a href="{{blog_url($blog_result)}}">{{$blog_result->judul}}</a></strong>
                                    </h3>
                                    <p class="meta-src">
                                        <small><i class="fa fa-calendar"></i> {{waktuTgl($blog_result->updated_at)}}</small>&nbsp;&nbsp;
                                        <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog_result->kategori)}}">{{@$blog_result->kategori->nama}}</a></span>
                                    </p>
                                    <p>
                                        {{short_description($blog_result->isi,300)}}<br>
                                        <a href="{{blog_url($blog_result)}}" class="theme">Baca Selengkapnya →</a>
                                    </p>
                                    <hr>
                                </article>
                                @endforeach 
                            </div>
                        </div>
                        @endif
                    @else
                        <article class="text-center">
                            <i>Hasil pencarian tidak ditemukan</i>
                        </article>
                    @endif
                </div>
            </div>
        </div>