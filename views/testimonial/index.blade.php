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
                            @foreach(new_product() as $newproduk)
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
                @if(!empty($mailing->action))
                {{ Theme::partial('subscribe') }}
                @endif
            </div>
            <div class="col-xs-11 col-sm-8 col-md-9 col-lg-9">
                <div class="row">
                    <div id="single-typical">
                        <div class="tabs-title-typical">
                            <h1>Testimonial</h1>
                        </div>
                        @foreach (list_testimonial() as $items)  
                        <div class="quote-testimo">
                            <blockquote>{{$items->isi}}</blockquote>
                            <p class="quote"><i class="fa fa-user"></i>&nbsp;&nbsp;{{$items->nama}}</p>
                        </div>
                        @endforeach
                        <br>
                        {{$testimonial->links()}}
                        <hr>
                        <div class="respond col-md-6">
                            <h3 id="testimo">Buat Testimonial</h3>
                            <form method="post" action="{{URL::to('testimoni')}}" role="form">
                                <div class="form-group">
                                    <label for="name">Nama Anda</label>
                                    <input type="text" class="form-control" name="nama" id="name" placeholder="Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Testimonial</label>
                                    <textarea name="testimonial" class="form-control" rows="3" placeholder="Testimonial anda" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Kirim Testimonial</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>