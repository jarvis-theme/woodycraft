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
                                        <p>{{short_description($artikel->isi, 150)}} <a class="read-more" href="{{blog_url($artikel)}}">Selengkapnya</a></p>
                                        <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(vertical_banner()->count() > 0)
                            <div id="advertising" class="block">
                                @foreach(vertical_banner() as $banners)
                            	<div class="img-block">
                            		<a href="{{url($banners->url)}}">
                                        {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            {{ Theme::partial('subscribe') }}   
                        </div>
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list">
                            	<div class="entry">
                                    <h2 class="title">{{$data->judul}}</h2>
                                </div>
                            	<div class="row">
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                    	<h3>{{$data->up}}</h3>
                                    	{{$data->isi}}
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>