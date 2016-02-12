                <div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            <div id="categories" class="block sidey">
                            	<ul class="block-content nav">
                                @foreach(list_category() as $side_menu)
                                    @if($side_menu->parent == '0')
                                    <li>
                                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
                                        @if($side_menu->anak->count() != 0)
                                        <ul class="sidebars">
                                            @foreach($side_menu->anak as $submenu)
                                            @if($submenu->parent == $side_menu->id)
                                            <li>
                                                <a href="{{category_url($submenu)}}" class="submenus">{{$submenu->nama}}</a>
                                                @if($submenu->anak->count() != 0)
                                                <ul class="sidebars">
                                                    @foreach($submenu->anak as $submenu2)
                                                    @if($submenu2->parent == $submenu->id)
                                                    <li>
                                                        <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            @if(best_seller()->count() > 0)
                            <div id="best-seller" class="block">
                            	<div class="title"><h2>Produk Terlaris</h2></div>
                            	<ul class="block-content">
                                    @foreach(best_seller() as $best)
                                    <li>
                                    	<a href="{{product_url($best)}}">
                                        	<div class="img-block">
                                                {{HTML::image(product_image_url($best->gambar1,'thumb'),$best->nama,array('width'=>'81','height'=>'auto'))}}
                                            </div>
                                            <p class="product-name">{{short_description($best->nama,25)}}</p>
                                            <p class="price">{{price($best->hargaJual)}}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="btn-more">
                                	<a href="{{url('produk')}}">Lihat Semua</a>
                                </div>
                            </div>
                            @endif
                            @if(recentBlog(null, 2)->count() > 0)
                            <div id="latest-news" class="block">
                            	<div class="title"><h2>Artikel Terbaru</h2></div>
                            	<ul class="block-content">
                                    @foreach(recentBlog(null, 2) as $blogs)
                                    <li>
                                        <h5 class="title-news">{{$blogs->judul}}</h5>
                                        <p>{{short_description($blogs->isi, 150)}} <a class="read-more" href="{{blog_url($blogs)}}">Baca Selengkapnya</a></p>
                                        <span class="date-post">{{date("F d, Y", strtotime($blogs->created_at))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(vertical_banner()->count() > 0)
                            <div id="advertising" class="block">
                                @foreach(vertical_banner() as $banner)    
                                <div class="img-block">
                                    <a href="{{url($banner->url)}}">
                                        {{HTML::image(banner_image_url($banner->gambar), 'Info Promo', array("class"=>"img-responsive"))}}
                                    </a>
                                </div>
                                @endforeach 
                            </div>
                            @endif
                            {{ Theme::partial('subscribe') }}
                        </div>
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list col-xs-12">
                                <div class="top-list">
                                    <h2 class="title">Produk Kami</h2>
                                    <ul class="btn-thumb">
                                        <li>Sort by :</li>
                                        <li>
                                            <a class="btn-grid" id="grid" href="{{buatLink(URL::current(),array('view'=>'grid'))}}" title="View Grid">View Grid</a>
                                        </li>
                                        <li><a class="btn-list" id="list" href="{{buatLink(URL::current(),array('view'=>'list'))}}" title="View List">View List</a></li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                                <div class="row">
                                @if(count(list_product(null, @$category, @$collection)) > 0)
                                    @if($view == '' || $view == 'grid')
                                    <ul class="grid">
                                        {{-- */ $i=0 /* --}}
                                        @foreach(list_product(null, @$category, @$collection) as $myproduk)
                                        <li class="col-xs-6 col-sm-4">
                                            @if(is_outstok($myproduk))
                                            <div class="empty badge-black"><span>KOSONG</span></div>
                                            @elseif(is_terlaris($myproduk))
                                            <div class="hot badge-red"><span>HOT</span></div>
                                            @elseif(is_produkbaru($myproduk))
                                            <div class="hot badge-green"><span>BARU</span></div>
                                            @endif
                                            <div class="image-container">
                                                <a href="{{product_url($myproduk)}}">
                                                {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('class'=>'img-responsive gridimg','title'=>$myproduk->nama))}}
                                                </a>
                                            </div>
                                            <h5 class="product-name">{{short_description($myproduk->nama,11)}}</h5>
                                            <span class="price">{{price($myproduk->hargaJual)}}</span>
                                            <a class="view" href="{{product_url($myproduk)}}">Lihat</a><br>
                                        </li>
                                        {{-- */ $i++ /* --}}
                                        @if($i%2 == 0)
                                        <div class="visible-xs clearfix"></div>
                                        @endif
                                        @if($i%3 == 0)
                                        <div class="hidden-xs clearfix"></div>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @elseif($view == 'list')
                                    <ul class="list">
                                        @foreach(list_product(null, @$category, @$collection) as $myproduk)
                                        <li class="col-xs-12">
                                            <div class="image-container col-xs-12 col-md-3" id="listcontainer">
                                                <a href="{{product_url($myproduk)}}">
                                                    {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('class'=>'img-responsive','title'=>$myproduk->nama))}}
                                                </a>
                                            </div>
                                            <h5 class="product-name">{{short_description($myproduk->nama,73)}}</h5>
                                            <p>{{short_description($myproduk->deskripsi, 77)}}</p>
                                            <span class="price">{{price($myproduk->hargaJual)}}</span>
                                            <a class="view pull-left" href="{{product_url($myproduk)}}">Lihat</a>
                                            <br><br><br>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                @else
                                    <article class="noresult"><i>Produk tidak ditemukan</i></article>
                                @endif
                                </div>
                                
                                {{list_product(null, @$category, @$collection)->links()}}
                            </div>
                        </div>
                    </div>
                    @foreach(horizontal_banner() as $banner)    
                    <div class="adv-bottom">
                        <a href="{{url($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar), 'Info Promo', array("class"=>"img-responsive"))}}
                        </a>
                        <br>
                    </div>
                    @endforeach 
                </div>