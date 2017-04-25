<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JobManager</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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

            .inline-block{
                display: inline-block;
            }
        </style>

        <!-- jquery -->
        <script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    JobManager
                </div>
                <p>by dax</p>
                <div class="links">
                    <h3 class="inline-block">Store side ></h3>
                    <a href="/api/joboffer/1/workers" target="_blank">List Workers</a>
                </div>
                <div class="links">
                    <h3 class="inline-block">Worker side ></h3>
                    <a data-method="post" href="/api/joboffer/1/interest">Like offer 1</a>
                    <a data-method="delete" href="/api/joboffer/1/interest">Unlike offer 1</a>
                </div>
            </div>
        </div>

        <script>
        $(function(){
            // test post requests
            $("*[data-method=\"post\"]").click(function(e){
                e.preventDefault();

                var url = $(this).attr("href");
                
                if ( !url )
                    return;
                
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "json",
                    success: function(data, statusText, xhr){
                        alert("You now like this job offer!");
                    },
                    error: function(xhr, statusText, error){
                        var res = xhr.responseJSON;

                        if ( res.error !== null ){
                            var messages = [];
                            for ( var k in res.error ){
                                messages.push( res.error[k] );
                            }
                            alert("ERROR! " + messages.join(" - ") );
                        }
                    }
                })
            })


            // test delete requests
            $("*[data-method=\"delete\"]").click(function(e){
                e.preventDefault();

                var url = $(this).attr("href");
                
                if ( !url )
                    return;
                
                $.ajax({
                    type: "DELETE",
                    url: url,
                    dataType: "json",
                    success: function(data, statusText, xhr){
                        alert("Like removed!");
                    },
                    error: function(xhr, statusText, error){
                        var res = xhr.responseJSON;

                        if ( res.error !== null ){
                            var messages = [];
                            for ( var k in res.error ){
                                messages.push( res.error[k] );
                            }
                            alert("ERROR! " + messages.join(" - ") );
                        }
                    }
                })
            })
        });
        </script>
    </body>
</html>
