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
            <div class="contact-us">
                <h2 class="title">Hubungi Kami</h2>
                <div class="contact-desc">
                    <p><strong>Alamat :</strong> {{$kontak->alamat}}</p>
                    <span><i class="phone"></i> {{$kontak->telepon ? $kontak->telepon : '-'}}</span>
                    <span><i class="bbm"></i> {{$kontak->bb ? $kontak->bb : '-'}}</span>
                    <span><i class="mail"></i> {{$kontak->email}}</span>
                    <div class="clr"></div>
                </div>
                <form class="contact-form" action="{{url('kontak')}}" method="post">
                    <p class="form-group">
                        <input class="form-control" placeholder="Nama" name="namaKontak" type="text" required>
                    </p>
                    <p class="form-group">
                        <input class="form-control" placeholder="Email" name="emailKontak" type="text" required>
                    </p>
                    <p class="form-group">
                        <textarea class="form-control" placeholder="Pesan" name="messageKontak" required></textarea>
                    </p>
                    <button class="btn btn-send" type="submit">Kirim</button>
                </form>
            </div>
            <div class="maps">
                <h2 class="title">Peta Lokasi</h2>
                @if($kontak->lat!='0' || $kontak->lng!='0')
                    <iframe class="maplocation" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                @else
                    <iframe class="maplocation" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq={{str_replace(' ','+',$kontak->alamat)}}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{str_replace(' ','+',$kontak->alamat)}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                @endif
            </div>
        </div>
    </div>
</div>