<div class="top-list container">
	<h2 class="title"><i class="fa fa-history"></i> &nbsp;Daftar Pembelian</h2>
	<div class="clr"></div>
	<hr>
</div>

<div class="container">
	<div class="inner-column row">
		<div id="left_sidebar" class="col-md-3">
			<div id="advertising" class="block">
				<div class="title"><h2>My Account</h2></div>
				<ul class="nav">
					<li><a href="{{url('member')}}">Daftar Pembelian</a></li>
					<li><a href="{{url('member/profile/edit')}}">Ubah Profil</a></li>
				</ul>
			</div>
			<div class="powerup">
				{{pluginSidePowerup()}} 
			</div>
		</div>
		<div id="center_column" class="col-md-9">
			@if($pengaturan->checkoutType!=2)
				@if($order->count() > 0)
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><span>ID Order</span></th>
								<th><span>Tanggal Order</span></th>
								<th><span>Detail Order</span></th>
								<th><span>Total Order</span></th>
								<th><span>No. Resi</span></th>
								<th><span>Status</span></th>
								<th><span>Konfirmasi</span></th>
							</tr>
						</thead>
						<tbody>
							@foreach (list_order() as $item)
							<tr>
								<td>{{$pengaturan->checkoutType==3 ? prefixOrder().$item->kodePreorder : prefixOrder().$item->kodeOrder}}</td>
								<td>{{$pengaturan->checkoutType==3 ? waktu($item->tanggalPreorder) : waktu($item->tanggalOrder)}}</td>
								<td class="desc">
									<ul>
									@if($pengaturan->checkoutType==3) 
										<li>{{$item->preorderdata->produk->nama}} ({{$item->opsiSkuId==0 ? 'No Opsi' : $item->opsisku->opsi1.($item->opsisku->opsi2!='' ? ' / '.$item->opsisku->opsi2:'').($item->opsisku->opsi3!='' ? ' / '.$item->opsisku->opsi3:'')}}) - {{$item->jumlah}}<li>
									@else 
										@foreach ($item->detailorder as $detail)
										
										<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}} - {{$detail->qty}}</li>
										
										@endforeach 
									@endif
									</ul>
								</td>
								<td class="quantity">{{ price($item->total)	}}</td>
								<td class="sub-price">{{ $item->noResi }}</td>
								<td class="total-price">
								@if($pengaturan->checkoutType==1) 
									@if($item->status==0)
									<span class="label label-warning">Pending</span>
									@elseif($item->status==1)
									<span class="label label-info">Konfirmasi diterima</span>
									@elseif($item->status==2)
									<span class="label label-success">Pembayaran diterima</span>
									@elseif($item->status==3)
									<span class="label label-success">Terkirim</span>
									@elseif($item->status==4)
									<span class="label label-danger">Batal</span>
									@endif 
								@else 
									@if($item->status==0)
									<span class="label label-warning">Pending</span>
									@elseif($item->status==1)
									<span class="label label-info">Konfirmasi DP diterima</span>
									@elseif($item->status==2)
									<span class="label label-success">DP terbayar</span>
									@elseif($item->status==3)
									<span class="label label-info">Menunggu pelunasan</span>
									@elseif($item->status==4)
									<span class="label label-success">Pembayaran lunas</span>
									@elseif($item->status==5)
									<span class="label label-success">Terkirim</span>
									@elseif($item->status==6)
									<span class="label label-danger">Batal</span>
									@elseif($item->status==7)
									<span class="label label-info">Konfirmasi Pelunasan diterima</span>
									@endif
								@endif
								</td>
								<td class="align-center">
								@if($pengaturan->checkoutType==3) 
									@if($item->status < 4)
									<button onclick="window.open('{{url('konfirmasipreorder/'.$item->id)}}','_blank')" class="btn btn-small btn-success" data-title="Edit" data-placement="top" data-tip="tooltip"><i class="fa fa-check"></i></button>
									@endif 
								@elseif($pengaturan->checkoutType==1) 
									@if($item->status < 1)
									<button onclick="window.open('{{url('konfirmasiorder/'.$item->id)}}','_blank')" class="btn btn-small btn-success" data-title="Edit" data-placement="top" data-tip="tooltip"><i class="fa fa-check"></i></button>
									@endif 
								@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{list_order()->links()}} 
				@else
				<span>Belum ada data order</span>
				@endif
			@else 
				@if($inquiry->count()!=0)
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><span>ID Order</span></td></th>
								<th><span>Tanggal Order</span></td></th>
								<th><span>Detail Order</span></td></th>
								<th><span>Status</span></td></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($inquiry as $item)
							<tr>
								<td>{{prefixOrder().$item->kodeInquiry}}</td>
								<td>{{waktu($item->created_at)}}</td>
								<td>
									@foreach ($item->detailInquiry as $detail)
									<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}} - {{$detail->qty}}</li>
									@endforeach
								</td>
								<td>
									@if($item->status==0)
									<span class="label label-warning">Pending</span>
									@elseif($item->status==1)
									<span class="label label-success">Inquiry diterima</span>
									@elseif($item->status==2)
									<span class="label label-info">Batal</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
				@else
						<tr><td colspan="2">Inquiry anda masih kosong.</td></tr>
				@endif
					</table>
				</div>
			@endif 
				
			</div>
		</div>
	</div>
</div>