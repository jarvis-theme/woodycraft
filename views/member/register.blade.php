<div class="container">
	<div class="inner-column row">
		<div class="col-lg-3 col-xs-12 col-sm-4 pull-right">
			<div id="advertising" class="block">
				@foreach(vertical_banner() as $banner)
				<div class="img-block">
					<a href="{{url($banner->url)}}">
						{{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'272','height'=>'auto','class'=>'img-responsive'))}} 
					</a>
				</div>
				@endforeach
			</div>
			<br>
		</div>
		<div id="center_column" class="col-lg-7 col-xs-12 col-sm-8">
			{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}} 
				<br>
				<h2>Register</h2>
				<hr><br>
				<div class="form-group">
					<label for="inputName" class="col-lg-2">Nama</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="inputName" name="nama" value="{{Input::old('nama')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2">Email</label>
					<div class="col-lg-10">
						<input type="email" class="form-control" id="inputEmail1" name="email" value="{{Input::old('email')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword1" class="col-lg-2">Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="inputPassword1" name="password" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword2" class="col-lg-2">Konfirmasi Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="inputPassword2" name="password_confirmation" required>
					</div>
				</div>
				<div class="form-group">
					<label for="dropdown" class="col-lg-2">Negara</label>
					<div class="col-lg-10">
						{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old('negara'), array('required', 'id'=>"negara","data-rel"=>"chosen","class"=>"form-control"))}} 
					</div>
				</div>
				<div class="form-group">
					<label for="dropdown" class="col-lg-2">Provinsi</label>
					<div class="col-lg-10">
						{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"), array('required', 'id'=>"provinsi","data-rel"=>"chosen","class"=>"form-control"))}} 
					</div>
				</div>
				<div class="form-group">
					<label for="dropdown" class="col-lg-2">Kota</label>
					<div class="col-lg-10">
						{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required', 'id'=>"kota","data-rel"=>"chosen","class"=>"form-control"))}} 
					</div>
				</div>
				<div class="form-group">
					<label for="inputComment" class="col-lg-2">Alamat</label>
					<div class="col-lg-10">
						<textarea id="inputComment" class="form-control" rows="3" name="alamat" required>{{Input::old("alamat")}}</textarea>
					</div>
				</div> 
				<div class="form-group">
					<label for="inputpos1" class="col-lg-2">Kode Pos</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="inputpos1" name="kodepos" value="{{Input::old('kodepos')}}" >
					</div>
				</div>
				<div class="form-group">
					<label for="inputpho1" class="col-lg-2">Telepon</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="inputpho1" name="telp" value="{{Input::old('telp')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputpho1" class="col-lg-2">Captcha</label>
					<div class="col-lg-10 form-inline">
						{{ HTML::image(Captcha::img(), 'Captcha image') }} 
						{{Form::text('captcha','',array('class'=>'form-control'))}} 
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10 col-xs-offset-1">
						<div class="checkbox">
							<input name="readme" value="1" type="checkbox"> Saya telah membaca dan menyetujui <a href="{{url('service')}}" target="_blank" >Privacy Policy</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-send">Register</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div>
				</div>
			{{Form::close()}} 
		</div>
	</div>
</div>