 <?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $output = curl_exec($ch);
    curl_close($ch);
        
    return $output;
}

if(isset($_GET['city']) ? $_GET['city'] : ''){
    $urlData= curl("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=8f80e707e7dd1694bfd99b0f4ffef9e9");
    $dataArray= json_decode($urlData, true);
    $weather="The weather in ".$_GET['city']." is ".$dataArray['weather'][0]['description'].".";
    $tempC=$dataArray['main']['temp'] - 273.15;
    $tempMin=$dataArray['main']['temp_min'] - 273.15;
    $tempMax=$dataArray['main']['temp_max'] - 273.15;        
    $weather.="<br>The avg Temperature is ".$tempC."&deg;C.";
    $weather.="<br>The min Temperature is ".$tempMin."&deg;C."; 
    $weather.="<br>The Max Temperature is ".$tempMax."&deg;C.";        
    $humidity=$dataArray['main']['humidity'];
    $weather.="<br>The Humidity is ".$humidity;    
    $pressure=$dataArray['main']['pressure'];
    $weather.="<br> The pressure is ".$pressure;
    $windSpeed=$dataArray['wind']['speed'];
    $weather.="<br> Wind Speed is ".$windSpeed;

    }
?>

<!Doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #city{
                width:180px;
                height:30px;

            }
            #weather{
                color: black;
                font-family: Georgia;
                font-size: 15px;
                font-weight:100px;
                font-style: bold;
                /* background-color: black; */
                /* width: 300px; */
                /* padding: 2px;
                margin: 25px;
                height:180px; */
            }

            
    
        </style>

        <link rel="stylesheet" href="<?php echo asset('css/home.css'); ?>" type="text/css">
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="http://127.0.0.1:8000">Weather App</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="http://127.0.0.1:8000">Home</a></li>
            </ul>
        </div>
        </nav>
        <center>
        <form class="form-inline">
            <div class="form-group">
            <label for="city"></label>
                <input id="city" type="text" name="city" class="form-control center-block " aria-descripedby="city" placeholder="Your City Here .." value="<?php if(isset($_GET['city']) ? $_GET['city'] : '')echo $_GET['city']?>">
            </div>
            <button type="submit" class="btn btn-warning center-block form-control">Submit</button>
            <br>
        
            </form>
            </center>
            <center>
            <br>
            <div id="weather">
             <?php
                 if(isset($weather)){
                 echo '<div class="alert" role="alert alert-primary">'.$weather.'</div>';
                 }
                // else{
                //  if(isset($city)!==""){
                //      echo '<a class ="alert alert-primary" role="alert"> No Result.</a>';
                //  }
                // }

             ?>
        </div>
        </center>
        
    <body>
        <div class="container" style="width:100%;">  
		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<center>
			<div class="carousel-inner">
            <div class="item active">
					<img src="https://www.roughguides.com/wp-content/uploads/2016/10/17_picfair-271502830-asia-middle-east-jordan-amman_3000px-1-1575x1050.jpg" style="width:80%;">
				</div>
				<div class="item">
					<img src="http://www.jordantimes.com/sites/default/files/styles/news_inner/public/478374c6143ba89684d5a2781b7b5cd1a050ad18.jpg?itok=zslsZXTX" style="width:80%;">
				</div>

				<div class="item">
					<img src="http://www.jordantimes.com/sites/default/files/styles/news_inner/public/1Weather_3.jpg?itok=SNGwOotm" style="width:80%;">
				</div>
				</div>
			</center>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
    </body>
</html>
