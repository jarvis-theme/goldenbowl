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
                                        {{HTML::image(product_image_url($newproduk->gambar1,'medium'),$newproduk->nama)}}
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
                @if(count(list_koleksi()) > 0)
                <div class="left-section list-collection">
                    <h5 class="col-xs-12 col-sm-12">Koleksi</h5>
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
            </div>
            <div class="col-sm-8 col-md-9 col-lg-9">
                <div class="row">
                    <div id="detail-product">
                        <form action="#" id="addorder">
                            <div class="row">
                                <div class="col-sm-7 col-lg-6">
                                    <div class="zoom-caption">
                                        <img id="imgZoom" src="{{product_image_url($produk->gambar1,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar1,'large')}}" alt="{{$produk->nama}}">
                                    </div>
                                    <br>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="tabs-caption">
                                        <div id="product_detail">
                                            <ul class="caption-thumbnail">
                                                @if($produk->gambar1 != '')
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery thumbnail-img" data-update="" data-image="{{product_image_url($produk->gambar1,'large')}}" data-zoom-image="{{product_image_url($produk->gambar1,'large')}}">
                                                        <img id="img-thumbnail" src="{{product_image_url($produk->gambar1,'thumb')}}" width="100" alt="{{$produk->nama}}"></a>
                                                    </li>
                                                @endif
                                                @if($produk->gambar2 != '')
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery thumbnail-img" data-update="" data-image="{{product_image_url($produk->gambar2,'large')}}" data-zoom-image="{{product_image_url($produk->gambar2,'large')}}">
                                                        <img id="img-thumbnail" src="{{product_image_url($produk->gambar2,'thumb')}}" width="100" alt="{{$produk->nama}}"></a>
                                                    </li>
                                                @endif
                                                @if($produk->gambar3 != '')
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery thumbnail-img" data-update="" data-image="{{product_image_url($produk->gambar3,'large')}}" data-zoom-image="{{product_image_url($produk->gambar3,'large')}}">
                                                        <img id="img-thumbnail" src="{{product_image_url($produk->gambar3,'medium')}}" width="100"></a>
                                                    </li>
                                                @endif
                                                @if($produk->gambar4 != '')
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery thumbnail-img" data-update="" data-image="{{product_image_url($produk->gambar4,'large')}}" data-zoom-image="{{product_image_url($produk->gambar4,'large')}}">
                                                        <img id="img-thumbnail" src="{{product_image_url($produk->gambar4,'medium')}}" width="100"></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="tab-quantity">
                                            @if($opsiproduk->count() > 0)
                                                <h3>Opsi :</h3>
                                                <div class="select-style">
                                                  <select>
                                                    <option value="">-- Pilih Opsi --</option>
                                                    @foreach ($opsiproduk as $key => $opsi)
                                                     <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}}>{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-quantity">
                                            <h3>Jumlah :</h3>
                                            <button type='submit' class='qtyminus' field='qty' /><i class="fa fa-caret-left"></i></button>
                                            <input type='text' name='qty' value='1' class='qty' />
                                            <button type='button' value='+' class='qtyplus' field='qty' /><i class="fa fa-caret-right"></i></button>
                                        </div>
                                        <div class="avalaible-text">
                                            @if($produk->stok > 0)
                                                <span>
                                                    <i class="ceklist fa fa-check"></i>
                                                </span>
                                                <span>Stok tersedia, <span class="text-color">{{$produk->stok}} item</span></span>
                                            @else
                                                <span class="text-color">Stok habis</span>
                                            @endif
                                        </div>
                                        <div class="tab-btn"> 
                                            <button class="baddtocart btn-checkout chart" type="submit">Beli</button>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="title-product">
                                <h1>{{$produk->nama}}</h1>
                                @if(!empty($produk->hargaCoret))
                                <span><del>{{price($produk->hargaCoret)}}</del></span>
                                @endif
                                <h2>{{price($produk->hargaJual)}}</h2>
                            </div>
                            <div class="tabs-option-category">
                                <ul class="tabs">
                                    <li class="tab-link current" data-tab="tab-1">Deskripsi Produk</li>
                                    <li class="tab-link" data-tab="tab-2">Review</li>
                                </ul>
                                <div id="tab-1" class="tab-content current">
                                    {{$produk->deskripsi}}
                                </div>
                                <div id="tab-2" class="tab-content">
                                    <p>{{pluginTrustklik()}}</p>
                                </div>
                            </div>
                            <div class="tabs-checkout">
                                <div class="col-xs-12 col-sm-12">
                                   <div class="sosmed">
                                        {{sosialShare(product_url($produk))}}
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if(count(other_product($produk)) > 0)
                        {{-- */ $i=1 /* --}}
                        <div class="related-post">
                            <div class="row">
                                @foreach(other_product($produk) as $relproduk)
                                <div class="related col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="post">
                                        @if(is_outstok($relproduk))
                                            <div class="item-icon"><span class="label label-default">KOSONG</span></div>
                                        @else
                                            @if(is_terlaris($relproduk))
                                            <div class="item-icon"><span class="label label-danger">HOT ITEM</span></div>
                                            @elseif(is_produkbaru($relproduk))
                                            <div class="item-icon"><span class="label label-info">BARU</span></div>
                                            @endif
                                        @endif
                                        <a href="{{product_url($relproduk)}}">
                                            <img src="{{product_image_url($relproduk->gambar1,'thumb')}}" alt="{{$relproduk->nama}}">
                                        </a>
                                        <h2>{{shortDescription($relproduk->nama,22)}}</h2>
                                        <h3><strong>{{price($relproduk->hargaJual)}}</strong></h3>
                                        <a href="{{product_url($relproduk)}}" class="add-chart">Lihat</a>
                                    </div>
                                </div>
                                @if($i % 2 == 0)
                                <div class="visible-xs visible-sm clearboth"></div>
                                @endif
                                {{-- */ $i++ /* --}}
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>