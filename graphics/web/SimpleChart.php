<?php
//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.
//include("Main.php");
include("../resources/Includes/FusionCharts.php");
?>
<HTML>
<HEAD>
        <TITLE>
        Graficas hijas de puta
        </TITLE>
        <?php
        //You need to include the following JS file, if you intend to embed the chart using JavaScript.
        //Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
        //When you make your own charts, make sure that the path to this JS file is correct. Else, you 
      //would get JavaScript errors.
        ?>      
        <SCRIPT LANGUAGE="Javascript" SRC="../resources/FusionCharts/FusionCharts.js"></SCRIPT>
        <style type="text/css">
        <!--
        body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
        }
        -->
        </style>
</HEAD>
<BODY>

<CENTER>
<h2>Mierda Puta</h2>
<h4>Jodada</h4>
<?php
        
        //This page demonstrates the ease of generating charts using FusionCharts PHP Class.
        //For this chart, we've used a Data.php which uses FusionCharts PHP Class (contained in /Data/ folder)
        //This file will generate the chart  XML and pass it to the chart
        //We will use FusionCharts PHP function - renderChart() to render the chart usin the XML
        //For a head-start, we've kept this example very simple.
        
        
        //Create the chart - Column 3D Chart with data from Data/Data.xml
        echo renderChart("../resources/FusionCharts/FCF_Column3D.swf", "Main.php", "", "myFirst", 600, 300, false, false);
?>
<BR><BR>
</CENTER>
</BODY>
</HTML>
