				<div class="container">
                	<div class="inner-column row">
                        <div id="center_column" class="col-lg-12 col-xs-12">
                            <div class="product-list col-xs-12">
                                <div class="top-list">
                                    <h2 class="title">Produk Kami</h2>
                                    <div class="clr"></div>
                                </div>
                                <div class="row">
                                    <ul class="grid">
                                    {{-- */ $i=0 /* --}}
                                    @foreach(home_product() as $produk)
                                        <li class="col-xs-6 col-sm-3">
                                            @if(is_outstok($produk))
                                            <div class="badge-black empty"><span>KOSONG</span></div>
                                            @elseif(is_terlaris($produk))
                                            <div class="badge-red hot"><span>HOT</span></div>
                                            @elseif(is_produkbaru($produk))
                                            <div class="badge-green hot"><span>BARU</span></div>
                                            @endif
                                            <div class="image-container">
                                                <a href="{{product_url($produk)}}">
                                                    {{HTML::image(product_image_url($produk->gambar1, 'medium'), $produk->nama, array('class'=>'img-responsive centering','title'=>$produk->nama))}}
                                                </a>
                                            </div>
                                            <h5 class="product-name">{{short_description($produk->nama, 10)}}</h5>
                                            <span class="price">{{price($produk->hargaJual)}}</span>
                                            <a class="view" href="{{product_url($produk)}}">Lihat</a>
                                        </li>
                                        {{-- */ $i++ /* --}}
                                        @if($i%2 == 0)
                                        <div class="visible-xs clearfix"></div>
                                        @endif
                                        @if($i%4 == 0)
                                        <div class="hidden-xs clearfix"></div>
                                        @endif
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach(horizontal_banner() as $banner)    
                    <div class="adv-bottom">
                        <a href="{{url($banner->url)}}">
                        	{{HTML::image(banner_image_url($banner->gambar), 'Info Promo', array("class"=>"img-responsive"))}}
                    	</a>
                    </div>
            	   @endforeach	
                </div>