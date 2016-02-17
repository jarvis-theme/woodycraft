            <div class="top-header">
                <div class="container" id="toplink">
                    <div class="pull-right">
                        @if( !is_login() )
                        <span class="white">
                            <small>
                            {{HTML::link('member', 'Log in', array('class'=>'white'))}} | {{HTML::link('member/create', 'Register', array('class'=>'white'))}}
                            </small>
                        </span>
                        @else
                        <span class="white">
                            <small>
                            Selamat datang, <a href="{{url('member')}}" class="white">{{user()->nama}}</a> | {{HTML::link('logout', 'Log out', array('class'=>'white'))}}
                            </small>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <header>
            	<div class="top-head">
                	<div class="container">
                    	<div class="row desktop-only col-sm-8">
                            <div id="top_testimonial" class="col-sm-6 pull-left">
                                @foreach(random_testimonial(1) as $value)
                                <p>{{short_description($value->isi, 94)}} <br><span>~{{$value->nama}}</span></p>
                                @endforeach
                            </div>
                            <div id="logo" class="col-sm-6">
                                @if(logo_image_url())
                                <a href="{{ url('home') }}">
                                    {{HTML::image(logo_image_url(), 'Logo', array('class'=>'desktop-logo'))}}
                                </a>
                                @else
                                <h3 id="text-logo">
                                    <strong>
                                        <a href="{{url('home')}}" class="url-textlogo">{{ short_description(Theme::place('title'),16) }}</a>
                                    </strong>
                                </h3>
                                @endif
                            </div>
                        </div>
                        <div class="row mobile-only logo-mobile">
                        	<div id="logo" class="col-xs-12">
                                @if(logo_image_url())
                                <a href="{{url('home')}}">
                                    {{HTML::image(logo_image_url(), 'Logo '.Theme::place('title'), array('class'=>'desktop-logo'))}}
                                </a>
                                @else
                                <a class="nodecoration" href="{{url('home')}}">
                                    <h1 class="url-textlogo">{{ short_description(Theme::place('title'),30) }}</h1>
                                </a>
                                @endif
                            </div>
                            <div id="top_testimonial" class="col-xs-6">
                                @foreach(random_testimonial(1) as $value)
                                <p>{{short_description($value->isi, 94)}} <br><span>~{{$value->nama}}</span></p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row col-xs-6 col-sm-4 carts">
                            <div id="shopping-cart">
                                <div class="cart-block" id="shoppingcartplace">
                                    {{shopping_cart()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav id="menu" class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand mobile-only" href="#">MENU</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            @foreach(main_menu()->link as $link)
                            <li><a href='{{menu_url($link)}}'>{{$link->nama}}</a></li>
                            @endforeach
                        </ul>
                        <div class="col-lg-3 col-md-3 pull-right search-form">
                            <form class="navbar-form" role="search" action="{{url('search')}}" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Produk" name="search" id="search" required>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>        
                    </div>
                </nav>
			</header>