                <div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            @if(recentBlog()->count() > 0)
                            <div id="latest-news" class="block">
	                        	<div class="title"><h2>Artikel Terbaru</h2></div>
	                        	<ul class="block-content">
	                        		@foreach(recentBlog() as $artikel)
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
                            <div class="product-list col-xs-12">
                                <div class="top-list">
                                    <h2 class="title">Blog</h2>
                                    <div class="clr"></div>
                                </div>
                                @if(list_blog(null,@$blog_category)->count() > 0)
                                <div class="row">
                                    @foreach(list_blog(null,@$blog_category) as $blog)
                                    <article class="col-lg-12 bloglist">
							            <h4><strong><a href="{{blog_url($blog)}}">{{$blog->judul}}</a></strong></h4>
							            <p>
							            	<small><i class="fa fa-calendar"></i> {{waktuTgl($blog->updated_at)}}</small>&nbsp;&nbsp;
                                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog)}}">{{@$blog->kategori->nama}}</a></span>
						            	</p>
							            <p>
							            	{{shortDescription($blog->isi,300)}}<br>
							            	<a href="{{blog_url($blog)}}" class="theme">Baca Selengkapnya →</a>
						            	</p>
							        </article>
                                    @endforeach
                                </div>
                                <div class="pagination">
									{{list_blog(null,@$blog_category)->links()}}
                                </div>
                                @else
                                <article class="noresult">
                                    <small>Blog tidak ditemukan.</small>
                                </article>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>