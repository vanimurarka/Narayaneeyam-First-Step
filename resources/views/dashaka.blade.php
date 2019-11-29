<html>
    <HEAD>
        <TITLE>Narayaneeyam - FirstStep - Dasaka {{$dashakaNumber}}</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style type="text/css"> body {font-family: "Verdana", "Helvetica", sans-serif; color: "#2A2A2A"; background-color: #C7BBE4; background-image: url('images/bg.jpg');}
    a:link { color: #4500E4; }
    p {color: #3F3F3F;}
    </style>
    </HEAD>
    <body>
        <div style="text-align: center">
            @if ($lang == 'en')
                <img src="images/narayaneeyam11.gif" alt="Shriman Narayaneeyam">
            @else
                <img src="images/narayaneeyam11h.png" alt="Shriman Narayaneeyam">
            @endif
            <p>
                @if ($lang == 'en')
                    @if ($dashakaNumber > 1)
                        <a href="dashaka{{$dashakaNumber-1}}">Dashaka {{$dashakaNumber-1}}</a> | 
                    @endif
                    <a href="{{URL::to('/')}}">Home</a>
                    @if ($dashakaNumber < 100)
                        | <a href="dashaka{{$dashakaNumber+1}}">Dashaka {{$dashakaNumber+1}}</a>
                    @endif
                @else
                    @if ($dashakaNumber > 1)
                        <a href="dashaka{{$dashakaNumber-1}}h">दशक {{$dashakaNumber-1}}</a> | 
                    @endif
                    <a href="{{URL::to('/indexh.html')}}">प्रारंभ</a> 
                    @if ($dashakaNumber < 100)
                        | <a href="dashaka{{$dashakaNumber+1}}h">दशक {{$dashakaNumber+1}}</a>
                    @endif
                @endif
            </p>
            @if ($lang == 'en')
                <font size="+1"><a href="dashaka{{$dashakaNumber}}h">हिन्दी</a></font>
            @else
                <a href="dashaka{{$dashakaNumber}}">English</a>
            @endif
        </div>
        <br>
        <div style="margin-top:20px;margin-bottom:20px;text-align: center;font-weight: bold;font-size: 22px;">
            <audio controls preload="none">
                @if ($dashakaNumber > 54)
                    <source src="audio/0{{$dashakaNumber}} a.mp3" type="audio/mpeg">
                @else
                    <source src="audio/0{{$dashakaNumber}}.m4a" type="audio/mpeg">
                @endif
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
        <p style="text-align: center;"> 
        @if ($lang == 'en')
            @if ($dashakaNumber > 1)
                <a href="dashaka{{$dashakaNumber-1}}">Dashaka {{$dashakaNumber-1}}</a> | 
            @endif
            <a href="{{URL::to('/')}}">Home</a>
            @if ($dashakaNumber < 100)
                | <a href="dashaka{{$dashakaNumber+1}}">Dashaka {{$dashakaNumber+1}}</a>
            @endif
        @else
            @if ($dashakaNumber > 1)
                <a href="dashaka{{$dashakaNumber-1}}h">दशक {{$dashakaNumber-1}}</a> | 
            @endif
            <a href="{{URL::to('/indexh.html')}}">प्रारंभ</a> 
            @if ($dashakaNumber < 100)
                | <a href="dashaka{{$dashakaNumber+1}}h">दशक {{$dashakaNumber+1}}</a>
            @endif
        @endif
        </p>
    </body>
</html>
