<div class="row">
    <div class="col-sm-12">
        <div id="sign-up">
            @if( is_login() )
            <div class="account">
                <a href="{{url('member')}}">
                    <img src="{{url(dirTemaToko().'goldenbowl/assets/img/login.png')}}" alt="My Account" title="My Account">
                </a>
            </div>
            <div class="login">
                <ul>
                    <li><a href="{{url('logout')}}">Logout </a></li>
                </ul>
            </div>
            @else
            <div class="account">
                <img src="{{url(dirTemaToko().'goldenbowl/assets/img/login.png')}}" alt="My Account">
            </div>
            <div class="login">
                <ul>
                    <li><a href="{{url('member')}}">Login |</a></li>
                    <li><a href="{{url('member/create')}}"> Register </a></li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</div> 

<div class="row">
    <div id="header">
        <div class="col-sm-6">
            <div class="logo">
                <a href="{{url('home')}}">
                    {{HTML::image(logo_image_url(), 'Logo '.Theme::place('title'))}}
                </a>
            </div>
        </div>
        <div id="shopping-cart" class="col-sm-4 col-sm-offset-2">
            <div id="shoppingcartplace">
                {{shopping_cart()}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="menus">
        <button id="btn-slide" class="btn-hamburger"><i class="fa fa-bars"></i></button>
        <ul id="menus-top-section">
            {{--*/ $i=0 /*--}}
            @foreach(main_menu()->link as $key=>$link)
                @if($i >= 0 && $i < 6)
                <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                @endif
                {{--*/ $i += 1 /*--}}
            @endforeach
            <li class="search">
                <button class="btn-form">
                    <img src="{{url(dirTemaToko().'goldenbowl/assets/img/zoom.png')}}" alt="Search">
                </button>
            </li>
        </ul>
        <form action="{{url('search')}}" method="post" class="form-search">
            <input type="text" name="search" class="text-search" placeholder="Cari Produk" required>
            <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>