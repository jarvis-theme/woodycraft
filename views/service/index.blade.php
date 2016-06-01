                <div class="container">
                    <div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            @if(recentBlog(null,2)->count() > 0)
                            <div id="latest-news" class="block">
                                <div class="title"><h2>Artikel Terbaru</h2></div>
                                <ul class="block-content">
                                    @foreach(recentBlog(null,2) as $artikel)
                                    <li>
                                        <h5 class="title-news article-title">{{short_description($artikel->judul, 28)}}</h5>
                                        <p>{{short_description($artikel->isi, 150)}} <a class="read-more" href="{{blog_url($artikel)}}">Read More</a></p>
                                        <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div id="advertising" class="block">
                                @foreach(vertical_banner() as $banners)
                                <div class="img-block">
                                    <a href="{{url($banners->url)}}">
                                        {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}} 
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            {{ Theme::partial('subscribe') }} 
                        </div>
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list">
                                <div class="entry">
                                </div>
                                <div class="row">
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                        <h3>Kebijakan Layanan</h3>
                                        <p>{{$service->tos}}</p>
                                    </article>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                        <h3>Kebijakan Pengembalian</h3>
                                        <p>{{$service->refund}}</p>
                                    </article>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                        <h3>Kebijakan Privasi</h3>
                                        <p>{{$service->privacy}}</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>