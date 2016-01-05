
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type ="text/css">
  body{
    margin: 20px
  }
	input{
		display: block;
		margin: 0 10px 10px 0;
	}

	.block{
		width: 350px;
		margin: 10px 10px 10px 0;
		vertical-align: top;
		display: inline-block;
		border: 1px solid silver;
		border-radius: 20px;
		padding: 20px;
		
	}
  .block_small{
    width: 350px;
    height: 385px;
    margin: 10px 10px 10px 0;
    vertical-align: top;
    display: inline-block;
    border: 1px solid silver;
    border-radius: 20px;
    padding: 20px;
    
  }
  h4{
    color: green;
  }
	</style>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   	<script>
      $(document).ready(function(){
        $('form.price').submit(function() {
          // load up any gif you want, this will be shown while user is waiting for response
          $('#results_price').html("<img src='assets/loading.gif'>");
          $.post($(this).attr('action'), $(this).serialize(), function(res) {
            var html_str = "<h2>Price Estimates</h2><hr>";
              if(res.message){
                html_str+="<p><b>Message:</b> "+res.message+"</p>";
              }
              else{
                for (var i = 0; i < res.prices.length; i++) {
                  html_str+="<h4>Option "+(i+1)+"</h4>"
                  html_str+="<p><b>currency_code</b>: "+res.prices[i].currency_code+"</p>";
                  html_str+="<p><b>display_name</b>: "+res.prices[i].display_name+"</p>";
                  html_str+="<p><b>estimate</b>: "+res.prices[i].estimate+"</p>";
                  html_str+="<p><b>minimum</b>: "+res.prices[i].minimum+"</p>";
                  html_str+="<p><b>product_id</b>: "+res.prices[i].product_id+"</p>";
                  html_str+="<hr>";
                  
                };
              }
              
            $('#results_price').html(html_str);
          }, 'json');
          // don't forget, without it the page will refresh
          return false;
        });

        $('form.time').submit(function() {
          // load up any gif you want, this will be shown while user is waiting for response
          $('#results_time').html("<img src='assets/loading.gif'>");
          $.post($(this).attr('action'), $(this).serialize(), function(res) {
            var html_str = "<h2>Time Estimates</h2><hr>";
              if(res.message){
                html_str+="<p><b>Message:</b> "+res.message+"</p>";
              }
              else{
                for (var i = 0; i < res.times.length; i++) {
                  html_str+="<h4>Option "+(i+1)+"</h4>"
                  html_str+="<p><b>display_name</b>: "+res.times[i].display_name+"</p>";
                  html_str+="<p><b>estimate</b>: "+res.times[i].estimate+"</p>";
                  html_str+="<p><b>product_id</b>: "+res.times[i].product_id+"</p>";
                  html_str+="<hr>";
                  
                };
              }
              
            $('#results_time').html(html_str);
          }, 'json');
          // don't forget, without it the page will refresh
          return false;
        });

        $('form.product').submit(function() {
          // load up any gif you want, this will be shown while user is waiting for response
          $('#results_product').html("<img src='assets/loading.gif'>");
          $.post($(this).attr('action'), $(this).serialize(), function(res) {

            var html_str = "<h2>Available Products</h2><hr>";
              if(res.message){
                html_str+="<p><b>Message:</b> "+res.message+"</p>";
              }
              else{
                for (var i = 0; i < res.products.length; i++) {
                  html_str+="<h4>Option "+(i+1)+"</h4>"
                  html_str+="<p><b>capacity</b>: "+res.products[i].capacity+"</p>";
                  html_str+="<p><b>product_id</b>: "+res.products[i].product_id+"</p>";
                  html_str+="<p><b>description</b>: "+res.products[i].description+"</p>";
                  html_str+="<p><b>cost_per_minute</b>: "+res.products[i].price_details.cost_per_minute+"</p>";
                  html_str+="<p><b>cost_per_distance</b>: "+res.products[i].price_details.cost_per_distance+"</p>";
                  html_str+="<p><b>base</b>: "+res.products[i].price_details.base+"</p>";
                  html_str+="<p><b>cancellation_fee</b>: "+res.products[i].price_details.cancellation_fee+"</p>";
                  html_str+="<hr>";
                  
                };
              }
            $('#results_product').html(html_str);
          }, 'json');
          // don't forget, without it the page will refresh
          return false;
        });


      });//document ready
    </script>
</head>
<body>
    <div class = 'block_small'>
      <form class = 'price' action="/main/get_price" method = "post">
        <fieldset>
        <legend>Price Estimates:</legend>
        <label for="start_latitude">Start Latitude:</label>
        <input type="text" name = "start_latitude" id = "start_latitude">
        <label for="start_longitude">Start Longitude:</label>
        <input type="text" name = "start_longitude" id = "start_longitude">

        <label for="end_latitude">End Latitude:</label>
        <input type="text" name = "end_latitude" id = "end_latitude">
        <label for="end_longitude">End Longitude:</label>
        <input type="text" name = "end_longitude" id = "end_longitude">

        <input type="submit" class = 'btn btn-success' value = "Search"> 
      </fieldset>
      </form>
    </div>

    <div class = 'block_small'>
      <form class = 'time' action="/main/get_time" method = "post">
        <fieldset>
        <legend>Time Estimates:</legend>
        <label for="start_latitude">Start Latitude:</label>
        <input type="text" name = "start_latitude" id = "start_latitude">
        <label for="start_longitude">Start Longitude:</label>
        <input type="text" name = "start_longitude" id = "start_longitude">
        <input type="submit" class = 'btn btn-success' value = "Search"> 
      </fieldset>
      </form>
    </div>

    <div class = 'block_small'>
      <form class = 'product' action="/main/get_product" method = "post">
        <fieldset>
        <legend>Get Product:</legend>
        <label for="latitude">Latitude:</label>
        <input type="text" name = "latitude" id = "latitude">
        <label for="start_longitude">Longitude:</label>
        <input type="text" name = "longitude" id = "longitude">

        <input type="submit" class = 'btn btn-success' value = "Search"> 
      </fieldset>
      </form>
    </div>

    <div id="results_price" class = 'block'>
    </div>
    <div id="results_time" class = 'block'>
    </div>
    <div id="results_product" class = 'block'>
    </div>
    
    
  </body>
</html>