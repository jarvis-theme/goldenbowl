        <div class="tab-title-top">
            <h1>Menu Unggulan</h1>
        </div>
        @if(count(home_product()) > 0)
        <div class="tab-post">
            @foreach(home_product() as $homeproduk)
            <div class="post">
                <a href="{{product_url($homeproduk)}}">
                    {{HTML::image(product_image_url($homeproduk->gambar1,'medium'), $homeproduk->nama)}}
                </a>
                <div class="tab-title">
                    <h2>{{short_description($homeproduk->nama,22)}}</h2>
                    <h3><strong>{{price($homeproduk->hargaJual)}}</h3>
                    <a href="{{product_url($homeproduk)}}" class="add-chart">Lihat</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="option-bottom">
        </div>