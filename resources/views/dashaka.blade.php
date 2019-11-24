<?php 

    $next = "";
    $thisH = "";
    $nextNumber = 0;

    $path = public_path().'/'.$slug.'.html'; 
    $fileExists = File::exists($path);
    $dashakaNumber = str_replace("dashaka","",$slug); // strip 'dashaka' from slug
    $dashakaNumber = str_replace("h", "", $dashakaNumber); // strip h from slug for hindi if it is there
    $dashakaNumber = (int)$dashakaNumber;
    $dashakaText = '';
    if (($fileExists) && ($dashakaNumber > 0))
    {
        $dashakaText = file_get_contents($path);
        $next = "dashaka".($dashakaNumber+1);
        $thisH = "dashaka".$dashakaNumber."h";
        $nextNumber = $dashakaNumber + 1;
    }
    else
        $dashakaText = "File not found";
    
?>
<html>
    <HEAD>
        <TITLE>Narayaneeyam - FirstStep - Dasaka 1</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style type="text/css"> body {font-family: "Verdana", "Helvetica", sans-serif; color: "#2A2A2A"; background-color: #C7BBE4; background-image: url('images/bg.jpg');}
    a:link { color: #4500E4; }
    p {color: #3F3F3F;}
    </style>
    </HEAD>
    <body>
        <TABLE align="center" cellspacing="0" width="700">
            <tr>
                <td colspan="3" align="center">
                <img src="images/narayaneeyam11.gif" alt="Shriman Narayaneeyam">
                    <br>
                    <br>
                </td>
            </tr>
            <TR>
                <td width="175">&nbsp;</td>
                <TD align="center">
                    <a href="index.html">Home</a> | <a href="{{$next}}">Dashaka {{$nextNumber}}</a>
                </TD>
                <td width="175" align="right"><font size="+1"><a href="{{$thisH}}">हिन्दी</a></font></td>
            </TR>
        </TABLE>
        <br>
        <div style="margin-top:20px;margin-bottom:20px;text-align: center;font-weight: bold;font-size: 22px;">
            <audio controls preload="none">
              <source src="audio/01.m4a" type="audio/mpeg">
              ...
            </audio>
            <br/>
        </div>
        <TABLE align="center" cellspacing="0" width="765" border="1" bordercolor="#e6673c" STYLE="BACKGROUND-IMAGE: url(images/g3.jpg)"
            cellpadding="10">
            <TR>
                <td>
                    {!! $dashakaText !!}
                </td>
            </TR>
        </TABLE>
        <p align="center">
            <a href="index.html">Home</a> | <a href="{{$next}}">Dashaka {{$nextNumber}}</a>
        </p>
<!-- Yahoo! Web Analytics - All rights reserved -->
<script type="text/javascript" src="http://d.yimg.com/mi/eu/ywa.js"></script>
<script type="text/javascript">
/*globals YWA*/
var YWATracker = YWA.getTracker("10001554166645");
//YWATracker.setDocumentName("");
//YWATracker.setDocumentGroup("");
YWATracker.submit();
</script>
<noscript>
<div><img src="http://s.analytics.yahoo.com/p.pl?a=10001554166645&amp;js=no" width="1" height="1" alt="" /></div>
</noscript>
    </body>
</html>
