				<div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            @if(recentBlog(null,5)->count() > 0)
                            <div id="latest-news" class="block">
	                        	<div class="title"><h2>Artikel Terbaru</h2></div>
	                        	<ul class="block-content">
	                        		@foreach(recentBlog(null,5) as $artikel)
	                                <li>
	                                    <h5 class="title-news article-title"><a href="{{blog_url($artikel)}}">{{short_description($artikel->judul, 28)}}</a></h5>
	                                    <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
	                                </li>
	                                @endforeach
	                            </ul>
	                        </div>
                            @endif
                            @if(list_blog_category()->count() > 0)
                            <div id="latest-news" class="block">
                            	<div class="title"><h2>Kategori</h2></div>
	                        	<ul class="block-content">
                            		@foreach(list_blog_category() as $kat)
                            		<span class="underline"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                                    @endforeach	
                                </ul>
                            </div>
                            @endif
                            @if(vertical_banner()->count() > 0)
                            <div id="advertising" class="block">
                                @foreach(vertical_banner() as $banner)
                            	<div class="img-block">
                            		<a href="{{url($banner->url)}}">
                            			{{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('class'=>'img-responsive'))}}
                        			</a>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list">
                                <section class="content">
                                    <div class="entry">
                                        <h2 class="title">{{$detailblog->judul}}</h2>
                                        <ul class="article-title">
                                            <span class="date-post"><i class="fa fa-calendar"></i> {{waktuTgl($detailblog->created_at)}}</span>&nbsp;&nbsp;
                                            @if($detailblog->kategori != '')
                                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$detailblog)}}">{{@$detailblog->kategori->nama}}</a></span>
                                            @endif
                                        </ul>
                                        <p>{{$detailblog->isi}}</p>
                                    </div>
                                    <hr>
                                    <div class="navigate comments clearfix">
                                    @if(isset($prev))
                                        <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                                    @else
                                        <div class="pull-right"></div>
                                    @endif

                                    @if(isset($next))
                                        <div class="pull-right">
                                            <a class="rightside" href="{{$next->slug}}">Selanjutnya &rarr;</a>
                                        </div>
                                    @else
                                        <div class="pull-right"></div>
                                    @endif
                                    </div>
                                    <hr>
                                    <div>
                                        {{$fbscript}}
                                        {{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>