@extends('layout.main')

@section('body')

<div class="container mt-5">
    <h1 class="display-2 text-center mb-5">Code Challenge</h1>
    <h3 class="display-4 text-rigth mb-5">Moises Morales</h3>            
    <table class="table table-hover" id="list">
        <thead>
          <tr>
            <th scope="col">Thumnail</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($list as  $key=>$Postcard)
              @if (($key+1)%4 || $key ==0)
                    <tr>
              @else
                    <tr class="table-primary"> 
              @endif
                    <th>
                      <form action="{{route('pdf.generate')}}" method="post">
                        @csrf
                        <input  type="hidden" name="title" value="{{$Postcard->title}}">
                        <input  type="hidden" name="url" value="{{$Postcard->thumb_url}}">

                        <button class="btn" type="submit">
                          <input type="image" src="{{route('thumb.generate', ['id' => $Postcard->id, 'url' => $Postcard->thumb_url])}}" alt="Submit" >
                        </button>
                      </form>
                    </th>
                    <td>{{$Postcard->title}}</td>
                    <td id="{{$Postcard->id}}">{{$Postcard->price}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          product options
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" onclick="changePrice({{$Postcard->id}}, 1, {{$Postcard->price}})">XXL</a>
                            <a class="dropdown-item"  onclick="changePrice({{$Postcard->id}}, 2, {{$Postcard->price}})">XL</a>
                            <a class="dropdown-item" onclick="changePrice({{$Postcard->id}}, 3, {{$Postcard->price}})">Envelope</a>
                            <a class="dropdown-item"  onclick="changePrice({{$Postcard->id}}, 4, {{$Postcard->price}})">Premium</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item"  onclick="changePrice({{$Postcard->id}}, 5, {{$Postcard->price}} )">Default price</a>
                        </div>
                      </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $list->links() }}
</div>

@endsection


@section('script')
<script>

    function changePrice(id, op, original_price){ 
      var additional = 0;
      if(op === 1){
        additional =xxl(id) ;
      }else if(op == 2){
        additional =  xl(id);
      }else if(op == 3){
        additional =  Envelope(id);
      }else if(op == 4){
        additional =  Premium(id);
      }else{
        additional = 0.00;
      }

      var price = original_price + parseFloat(additional);
      $("#"+id).html(price);
    }

    function xxl(id){
      var result = 0;
        $.ajax({
          url:'https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id='+id,
          type:"GET",
          crossDomain : true,
          async: false, 
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(json) {
            result = json.products[0].product_options.XXL.price;
          },
          error: function(e) {
            console.log(e);
          }
      });
      return result;
    }  

    function xl(id){
      var result = 0;
        $.ajax({
          url:'https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id='+id,
          type:"GET",
          crossDomain : true,
          async: false, 
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(json) {
            result = json.products[0].product_options.XL.price;
          },
          error: function(e) {
            console.log(e);
          }
      });

      return result;
    }  

    function Envelope(id){
      var result = 0;
        $.ajax({
          url:'https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id='+id,
          type:"GET",
          crossDomain : true,
          async: false, 
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(json) {
            result = json.products[0].product_options.Envelope.price;
          },
          error: function(e) {
            console.log(e);
          }
      });

      return result;
    }  

    function Premium(id){
      var result = 0;
        $.ajax({
          url:'https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id='+id,
          type:"GET",
          crossDomain : true,
          async: false, 
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(json) {
            result = json.products[0].product_options.Premium.price;
          },
          error: function(e) {
            console.log(e);
          }
      });

      return result;
    }     


</script>

  
@endsection