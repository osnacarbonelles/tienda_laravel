<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One" rel="stylesheet">
</head>
<body>
<div>
    {{ $gmail }}
</div>

</body>
</html>
    {{-- @foreach($mensaje)
    <div class="row">
      <div class="col-lg-3">
          <img src="/images/{{ $mensaje->attributes->image }}" class="img-thumbnail" width="200" height="200">
      </div>
      <div class="col-lg-5">
          <p>
              <b><a href="/shop/{{ $mensaje->attributes->slug }}">{{ $mensaje->name }}</a></b><br>
              <b>Precio: </b>${{ $mensaje->price }}<br>
              <b>Sub Total: </b>${{ \Cart::get($mensaje->id)->getPriceSum() }}<br>
          </p>
      </div>
    </div>
    <hr>
  @endforeach --}}
   