
<!DOCTYPE html>
<html>
<head>
  <title>QR Code Generated</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-md-6">
                <h4>Simple QR Code</h4>
                {!! QrCode::size(500)->generate('https://adminlte.io/themes/v3/') !!}
            </div>
            <div class="col-md-6">
                <h4>Color Qr Code</h4>
                {!! QrCode::size(500)->backgroundColor(255,55,0)->generate('techsolutionstuff.com') !!}
            </div>
        </div> 
    </div> 
</body>
</html>
