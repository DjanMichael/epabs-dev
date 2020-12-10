<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPMP</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>
  <style>
           /* margin : top right bottom left */
        @page {
            margin: 90px 30px 120px 30px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;

        }
        table{
            border-collapse: collapse;
            padding:5px;

        }

        .t-d {
            padding:10px;
            font-size: 10px;
            border:1px solid #181b2b;
            padding-left:5px;
            padding-right:5px;
            padding-top:2px;
            padding-bottom:2px;
            /* width:10px; */
            word-break:break-all;
        }

        .t-h-d{
                padding-left:5px;
                padding-right:5px;
                padding-top:2px;
                padding-bottom:2px;
                color:#181b2b;
                font-size: 10px;
                font-weight: bold;
                position: relative;
                /* width:10px; */
                border:1px solid #181b2b;
        }
        .c{
            width:100%;
        }

        .txt-center{
            text-align:center;
        }
        .header {
            position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 120px;

                /** Extra personal styles **/
                /* background-color: #03a9f4; */
                color:black;
                text-align: center;
                line-height: 35px;
                font-size:10px;
                font-weight:bold;

        }
        .footer {
            position: fixed;
                bottom: -60px;
                left: 0px;
                right: 0px;
                height: 180px;
                font-size:10px;
                font-weight:bold;
                /** Extra personal styles **/
                /* background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px; */
        }
        main{
            position: relative;
            top:65px;

        }

        .col-1{
            display:inline-block;
            width:33%;
            font-size:12px;
            font-weight:bold;
            background-color:red;
        }
    </style>
</head>
<body>
    <div class="header" style="width:100%;">
    </div>
    <div class="footer">
    </div>
    <main>
    </main>
</body>
</html>
