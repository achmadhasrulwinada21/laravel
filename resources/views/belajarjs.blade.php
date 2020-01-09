

<h2>My First JavaScript</h2>
<button type="button" onclick="document.getElementById('demo').innerHTML = Date()">
Click me to display Date and Time.</button>
<p id="demo"></p>

<!--variable in javascript-->
<!--html-->
<h2>JavaScript Variables</h2>
<div id="jumlah"></div>
<!--end html-->
<script>
var x = 5;
var y = 6;
var z = x + y;
document.getElementById("jumlah").innerHTML ="The value of z is: " + z;
</script>
<!--end variable in javascript-->

<!--Functions in javascript-->
<h2>JavaScript Functions</h2>
<p id="celcius"></p>

<script>
function toCelsius(fahrenheit) {
  return (5/9) * (fahrenheit-32);
} 
document.getElementById("celcius").innerHTML =
"The temperature is " + toCelsius(77) + " Celsius";
</script>
<!--end Functions in javascript-->
