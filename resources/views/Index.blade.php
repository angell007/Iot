<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inicio</title>

			<script type="text/javascript" src="../../js/assets/script/jquery-2.2.3.min.js"></script>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			<script src="https://code.highcharts.com/highcharts.js"></script>
			

        <script type="text/javascript">
            window.onload = function () {
                var dataLength = 0;
                var data = [];
				var data2 = [];
                var updateInterval = 500;
                updateChart();
                function updateChart() {
                    $.getJSON("{{route('datos')}}", function (result) {
                        if (dataLength !== result.length) {
                            for (var i = dataLength; i < result.length; i++) {
                                data.push({
									x: new Date(result[i].x),
                                    y: parseInt(result[i].yTemperatura)
                                });
								data2.push({
									x: new Date(result[i].x),
                                    y: parseInt(result[i].yHumedad)
                                });
						document.getElementById('contenido').innerHTML = "Temperartura Actual: "+ data[i].y+" ºC";
						document.getElementById('contenido2').innerHTML = "Humedad Actual: "+ data2[i].y+" ºC";
						document.getElementById('contenido3').innerHTML = "CO2 Actual: "+ data[i].y+" ºC";

                            }

							dataLength = result.length;
                            chart.render();
                        }
                    });
                }
                var chart = new CanvasJS.Chart("chart", {
	animationEnabled: true,
	theme: "light2",
	title: {
				text: 'Datos de Sensores con  respecto a tiempo',	// Titulo (Opcional)
				padding: 20,
			},
		subtitle: {
			text: 'UDI'		// Subtitulo (Opcional)
		},

	axisX: {
		title: "Tiempo (HH)",
		titleFontSize:20,
		valueFormatString: "DD MM \n hh:mm",
		labelFontSize: 15,
		labelMaxWidth: 80,
		labels: {
			overflow: 'justify'
			},
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},

	axisY: {
		title: "Temp (°C)",
		titleFontSize:18.5,
		includeZero: false,
		suffix: " °C",
		labelFontSize: 20,
		// labelMaxWidth: 80,
		labels: {
			overflow: 'justify'
			},
	},

	legend:{
		cursor: "pointer",
		fontSize: 16,
		itemclick: toggleDataSeries
	},

	data: [{
		 type: 'spline',
		 scrollablePlotArea: {
		 },
		name: "Temperatura",
		type: "line",
		color: "#ffa500",
		showInLegend: true,
		connectNullData: true,
		nullDataLineDashType: "solid",
		xValueType: "dateTime",
		xValueFormatString: "DD MMM hh:mm TT",
		yValueFormatString: "#,##0.##\"ºC\"",
		dataPoints: 
			 data
	},
	{
		name: "Humedad",
		type: "spline",
		color:"#6495ed",
		xValueFormatString: "DD MMM hh:mm TT",
		yValueFormatString: "#,##0.##\"ºC\"",

		showInLegend: true,

		dataPoints: 
			 data2
	}]
});

 function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
};
                setInterval(function () {
                    updateChart()
                }, updateInterval);
            }

        </script>
    </head>
    <body>

			<section class="navigation">
                    <div class="nav-container">
                      <div class="brand">
                        <a href="#!"><img src="img/logo_udi.png" width="35%" height="auto">                        </a>
                      </div>
                      <nav>
                        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                        <ul class="nav-list">
                          <li>
                                <a href="/">Inicio</a>
                          </li>
                          <li>
                            {{-- @if (auth()->check())  --}}
                            <a href="#!">Menú</a>
                            {{-- @endif --}}
                            <ul class="nav-dropdown">
                              <li>
                                   
                                   
                              </li>
                              <li>
                                  

                              <li>
                                    
                              </li>
                            </ul>
                          </li>
                          <li>
                                <a href={{ route('login') }}> Iniciar Session </a>
                          </li>
                          
                          <li>
                            <a href="#!">Contact</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
				  </section>
				  
{{-- 
			<h3> Bienvenidos Todos </h3>
			<section>
				Todas Este es mi sitio Web super full hD 4K 			
			</section> --}}

			

<div id="chart" style="height: 300px; width: 100%;" ></div>	
<div  style="height: 15%; width: auto;" >
<h3></h3>
</div>	

<div style="height: 300px; width: auto;" > 	
		<div style="height: 8%; width: auto; margin: 0; 
				border: 1px dotted #999; border-radius: 0;
				background:  #ffa500;
				text-align: center;
				padding: 20px 20px 20px 20px;"
				id="contenido">
		</div>
		<div style="height: 8%; width: auto; margin: 0 ; 
				border: 1px dotted #999; border-radius: 0;
				background:  #6495ed;
				text-align: center;
				padding: 20px 20px 20px 20px;"
		id="contenido2">
		</div>
		<div style="height: 8%; width: auto; margin: 0 ; 
		border: 1px dotted #999; border-radius: 0;
		background:  #008090;
		padding: 20px 20px 20px 20px;
		text-align: center;"
		id="contenido3">
		</div>

</div>

    </body>
</html>