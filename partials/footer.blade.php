            <footer>
                <div class="top-footer">
                    <div class="container">
                        <div class="row">
                            <div id="about-foot" class="col-xs-12 col-sm-3 col-md-4">
                                <h4 class="title">Tentang Kami</h4>
                                <div class="block-content">
                                    <p>{{short_description(about_us()->isi,400)}}</p>
                                </div>
                            </div>
                            @foreach(other_menu() as $key=>$menu)
                                @if($key == '0' || $key == '1')
                                <div id="links-foot" class="col-xs-12 col-sm-3 col-md-2">
                                    <h4 class="title">{{$menu->nama}}</h4>
                                    <div class="block-content">
                                        <ul>
                                        @foreach($menu->link as $link_menu)
                                            @if($menu->id == $link_menu->tautanId)
                                            <li>
                                                <a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a>
                                            </li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach 

                            <div id="contact-foot" class="col-xs-12 col-sm-3 col-md-4">
                                <h4 class="title">Alamat Kami</h4>
                                <div class="block-content">
                                    <p>{{@$kontak->alamat}}</p>
                                    <p><strong>Telepon :</strong> {{@$kontak->telepon ? $kontak->telepon.'&nbsp;&nbsp;' : '-&nbsp;&nbsp;'}}  <strong>HP :</strong> {{@$kontak->hp ? $kontak->hp : '-&nbsp;&nbsp;'}}</p>
                                    <ul class="social">
                                        @if($kontak->fb)
                                        <li><a href="{{url($kontak->fb)}}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if($kontak->tw)
                                        <li><a href="{{url($kontak->tw)}}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if($kontak->gp)
                                        <li><a href="{{url($kontak->gp)}}" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                        @endif
                                        @if($kontak->pt)
                                        <li><a href="{{url($kontak->pt)}}" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        @endif
                                        @if($kontak->ig)
                                        <li><a href="{{url($kontak->ig)}}" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="col-sm-6 col-xs-12 pull-right">
                            @foreach(list_banks() as $banks) 
                                @if($banks->status == 1)
                                {{HTML::image(bank_logo($banks), $banks->bankdefault->nama, array('title'=>$banks->bankdefault->nama))}} 
                                @endif
                            @endforeach 
                            @foreach(list_payments() as $pay)
                                @if($pay->nama == 'paypal' && $pay->aktif == 1)
                                <img src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" />
                                @endif
                                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                <img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                                @endif
                                @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                                <img src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitoin" />
                                @endif
                            @endforeach
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku" />
                            @endif
                            @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                            <img src="{{url('img/bank/veritrans.png')}}" alt="Veritrans" title="Veritrans">
                            @endif
                        </div>
                        <div class="col-sm-6 col-xs-12 pull-left">
                           <p>&copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. Powered by <a class="nodecor" target="_blank" href="http://jarvis-store.com">Jarvis Store</a></p>
                       </div>
                    </div>
                </div>
            </footer>
            {{pluginPowerup()}} 