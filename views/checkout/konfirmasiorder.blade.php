<div class="page-title">
    <div class="container">
        <h2 class="title"><i class="fa fa-shopping-cart"></i> Detail Order</h2>
        <hr />
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><span>ID Order</span></th>
                        <th><span>Tanggal Order</span></th>
                        <th><span>Detail Order</span></th>
                        <th><span>Jumlah</span></th>
                        <th><span>No. Resi</span></th>
                        <th><span>Status</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$checkouttype==1 ? prefixOrder().$order->kodeOrder : prefixOrder().$order->kodePreorder}}</td>
                        <td>{{$checkouttype==1 ? waktu($order->tanggalOrder) : waktu($order->tanggalPreorder)}}</td>
                        <td>
                            <ul>
                            @if ($checkouttype==1)
                                @foreach ($order->detailorder as $detail)
                                <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku['opsi1'].($detail->opsisku['opsi2'] != '' ? ' / '.$detail->opsisku['opsi2']:'').($detail->opsisku['opsi3'] !='' ? ' / '.$detail->opsisku['opsi3']:'').')':''}} - {{$detail->qty}}</li>
                                @endforeach
                            @else
                                <li>{{$order->preorderdata->produk->nama}} ({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku['opsi1'].($order->opsisku['opsi2']!='' ? ' / '.$order->opsisku['opsi2']:'').($order->opsisku['opsi3']!='' ? ' / '.$order->opsisku['opsi3']:'')}})
                                 - {{$order->jumlah}}</li>
                            @endif
                            </ul>
                        </td>
                        <td class="quantity">
                            @if($checkouttype==1)
                            {{price($order->total)}}
                            
                            @else 
                                @if($order->status < 2)
                                    {{price($order->total)}}
                                @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                    {{price($order->total - $order->dp)}}
                                @else
                                    0
                                @endif
                            @endif
                        </td>
                        <td class="sub-price">{{ $order->noResi}}</td>
                        <td class="total-price">
                        @if($checkouttype==1)
                            @if($order->status==0)
                            <span class="label label-warning">Pending</span>
                            @elseif($order->status==1)
                            <span class="label label-danger">Konfirmasi diterima</span>
                            @elseif($order->status==2)
                            <span class="label label-success">Pembayaran diterima</span>
                            @elseif($order->status==3)
                            <span class="label label-info">Terkirim</span>
                            @elseif($order->status==4)
                            <span class="label label-default">Batal</span>
                            @endif
                        @else 
                            @if($order->status==0)
                            <span class="label label-warning">Pending</span>
                            @elseif($order->status==1)
                            <span class="label label-danger">Konfirmasi DP diterima</span>
                            @elseif($order->status==2)
                            <span class="label label-info">DP terbayar</span>
                            @elseif($order->status==3)
                            <span class="label label-info">Menunggu pelunasan</span>
                            @elseif($order->status==4)
                            <span class="label label-success">Pembayaran lunas</span>
                            @elseif($order->status==5)
                            <span class="label label-info">Terkirim</span>
                            @elseif($order->status==6)
                            <span class="label label-default">Batal</span>
                            @elseif($order->status==7)
                            <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                            @endif
                        @endif  
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-5">
            @if($order->jenisPembayaran==1 && $order->status == 0)
                @if($checkouttype==1)                         
                {{-- */ $url = 'konfirmasiorder/' /* --}}
                @else                         
                {{-- */ $url = 'konfirmasipreorder/' /* --}}
                @endif
                <h2 class="center">{{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}}</h2>
                <hr>
                {{Form::open(array('url'=> $url.$order->id, 'method'=>'put'))}}                           
                    <div class="form-group">
                        <label  class="control-label"> Nama Pengirim:</label>
                        <input type="text" class="form-control" placeholder="Nama Pengirim" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label  class="control-label"> No Rekening:</label>
                        <input type="text" class="form-control" placeholder="No Rekening" name="noRekPengirim" required>
                    </div>
                    <div class="form-group">
                        <label  class="control-label"> Rekening Tujuan:</label>
                        <select name="bank" class="form-control">
                            <option value="">-- Pilih Bank Tujuan --</option>
                            @foreach ($banktrans as $bank)
                            <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="control-label"> Jumlah:</label>
                        @if($checkouttype==1)        
                        <input type="text" class="form-control" placeholder="Jumlah Transfer" name="jumlah" value="{{$order->status==0 ? $order->total : ''}}" required>
                        @else
                            @if($order->status < 2)
                            <input class="form-control" placeholder="Jumlah Transfer" type="text" name="jumlah" value="{{$order->dp}}" required>
                            @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                            <input class="form-control" placeholder="Jumlah Transfer" type="text" name="jumlah" value="{{$order->total - $order->dp}}" required>
                            @endif
                        @endif
                    </div>
                    <button type="submit" class="btn btn-send">{{trans('content.step5.confirm_btn')}}</button>
                {{Form::close()}}
            @endif
            </div>
        </div>

        @if($paymentinfo!=null)
        <h3><center>Paypal Payment Details</center></h3><br>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
                </tr>
                <tr>
                    <td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
                </tr>
                <tr>
                    <td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
                </tr>
                <tr>
                    <td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
                </tr>
                <tr>
                    <td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
                </tr>
                <tr>
                    <td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
                </tr>
                <tr>
                    <td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
                </tr>
            </table>
        </div>
        <p>Thanks you for your order.</p><br>
        @endif 
      
        @if($order->jenisPembayaran==2)
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2>
                <p>{{trans('content.step5.paypal')}}</p>
            </center><br>
            <center id="paypal">{{$paypalbutton}}</center>
            <br>
        @elseif($order->jenisPembayaran==4) 
            @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2>
                <p>{{trans('content.step5.ipaymu')}}</p><br>
                <a class="btn-pay" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
                <br>
            </center>
            @endif
        @elseif($order->jenisPembayaran==5 && $order->status == 0)
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2>
                <p>{{trans('content.step5.doku')}}</p><br>
                {{ $doku_button }}
                <br>
            </center>
        @elseif($order->jenisPembayaran == 6 && $order->status == 0)
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2>
                <p>{{trans('content.step5.bitcoin')}}</p><br>
                {{$bitcoinbutton}}
                <br>
            </center>
        @elseif($order->jenisPembayaran == 8 && $order->status == 0)
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2>
                <p>{{trans('content.step5.veritrans')}}</p><br>
                <button class="btn-pay" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
                <br>
            </center>
        @endif
    </div>
</div>