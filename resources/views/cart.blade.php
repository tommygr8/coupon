
@extends('layout.master')

@section('content')
<div class="container bootstrap snippets bootdey">
    <div class="col-md-9 col-sm-8 content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Cart</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                    <div class="panel-heading">
                        <h3>
                            <img class="img-circle img-thumbnail" src="https://bootdey.com/img/Content/user_3.jpg">
                            My Cart
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $cart_items = unserialize($cart->content);
                                    $totalprice = 0.0;
                                    $vat = 7.5;
                                @endphp
                                @forelse ($cart_items as $item)

                                <tr>
                                    <td><img src="https://via.placeholder.com/400x200/FFB6C1/000000" class="img-cart"></td>
                                <td><strong>{{$item['product']}}</strong></td>
                                    
                                <td>$ {{$item['price']}}</td>
                                    <td>$ {{$item['price']}}</td>
                                </tr>
                                @php $totalprice += floatval($item['price']); @endphp
                                    
                                @empty

                                No Cart found
                                    
                                @endforelse
                                
                                
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="1">Coupon</td>
                                    <td><input type="text" name="coupon" id="coupon" /> <button type="button" onclick="getCoupon('{{$cart->id}}}')" class="btn btn-info"> Get Coupon</button></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-right">Total Product</td>
                                <td>$ {{$totalprice}}</td>
                                </tr>
                               

                                <tr>
                                    <td colspan="2" class="text-right">Discount</td>
                                <td id="discount_td">0</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                                    <td id="amount_due">$ {{ $totalprice}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<div id="body-overlay"><div>				
  
    <img src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" width="64px" height="64px" />
    </div></div>
                    
     <style>
    #body-overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
          #body-overlay div {position:fixed;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
      </style>

@section('jsassets')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.1/bootbox.min.js" integrity="sha512-eoo3vw71DUo5NRvDXP/26LFXjSFE1n5GQ+jZJhHz+oOTR4Bwt7QBCjsgGvuVMQUMMMqeEvKrQrNEI4xQMXp3uA==" crossorigin="anonymous"></script>

<script>
    function getCoupon(cartid) {

$.ajax( "{{ url('/coupon') }}/"+cartid, {
                  type: 'POST',
             
                data:{'coupon':$("#coupon").val(),'_token': "{{ csrf_token() }}"},
                beforeSend: function(){$("#body-overlay").show();},
                  dataType: 'json',
                  success: function( resp ) {
                
                
                    if(resp.status ==1)
                    {
                     
                        var data = resp.data
                        $("#discount_td").html("$ "+data.discount)
                        $("#amount_due").html("$ "+data.amount_due)
                   
                    
                    setInterval(function() {$("#body-overlay").hide(); },500);
                    
                  }
                  else
                  {
                      alert(resp.msg)
                     setInterval(function() {$("#body-overlay").hide(); },500);
                     // dialog.modal('hide');
                    
                    
                  }
                  return false;
                  },
                // error: function( req, status, err ) {
                  error: function( data ) {
           setInterval(function() {$("#body-overlay").hide(); },500);
                  if (data.status ==422)
                  {
                   
                    var errorstr ="";
                    $.each(data.responseJSON.errors, function (key, item) {
        
        
                        errorstr += item+"<br />"
                      });
                    alert(errorstr);
                  }
        
                   
                  }
                });

}

</script>

@endsection

@endsection