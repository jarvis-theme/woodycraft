<div class="container">
	<div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
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
            {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
	        <div class="contact-us">
	            <h2 class="title">Konfirmasi Order</h2>
	            <div class="contact-desc">
                    <div class="form-group">
                    	<input class="form-control" placeholder="Kode Order" type="text" name="kodeorder" required>
                	</div>
                    <button type="submit" class="btn btn-send">Cari Kode</button>
	            </div>
	        </div>
            {{Form::close()}}
	    </div>
    </div>
</div>