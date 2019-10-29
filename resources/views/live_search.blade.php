{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Live Search ajax</title>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <br/>--}}
{{--    <div class="container box">--}}
{{--        <h3 align="center">Live seach in Laravel using AJAX</h3> <br/>--}}
{{--        <div class="panel panel-default">--}}
{{--            <div class="panel-heading"> Search customer data </div>--}}
{{--            <div class="panel-body">--}}
{{--            <input type="text" name="search" id="search" class="form-control" placehoder="Search customer data"/>--}}
{{--            </div>--}}
{{--            <div class="table-responsive">--}}
{{--                <h3 align="center">Total Data : <span id="total_records"></span></h3>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Customer name</th>--}}
{{--                            <th>Adress</th>--}}
{{--                            <th>City</th>--}}
{{--                            <th>Postal Code</th>--}}
{{--                            <th>Country</th>--}}
{{--                        </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                        displaying data using ajax--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}

{{--<script>--}}
{{--    $(document).ready(function(){--}}

{{--        fetch_customer_data(); //call fetch_customer_data() when page has been load then this function has been called and it will display data on web page--}}

{{--        function fetch_customer_data(query ='') /*This function will return customer data if query argument is equal to zero, but if query argument has some value it will return filter customer data and display on webpage*/--}}
{{--        {--}}
{{--            $.ajax({ /*under this is written URL option set to root function with live search dot action*/--}}
{{--                url:"{{route('live_search.action')}}", /*send request to action method of live_search controller*/--}}
{{--                method:'GET', /*define in which method we have send data to server*/--}}
{{--                data:{query:query}, /*data option and under this we can to find which data we should send to server, so here write query variable*/--}}
{{--                dataType: 'json', /*it means we will receive data in JSON format*/--}}
{{--                success:function (data) /*success callback function. This function has been be called if request completed successfully and it received data from server */--}}
{{--                {--}}
{{--                    $('tbody').html(data.table_data); /*this code will display customer data on web page in HTML table format */--}}
{{--                    $('#total_records').text(data.total_data); /*span tag ID total records with text method and under this we have write data.total_data, this will display total of records under span tag ID total record*/--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--        $(document).on('keyup', '#search', function () { //for live search //keyup event with textbox id search, so when we have typed something under textbox it will execute this block code--}}
{{--            var query = $(this).val(); // query variable with value method. This code will fetch search text box and store under this query variable--}}
{{--            fetch_customer_data(query); //call fetch_customer_data //this function will filter customer data according to value of query variable--}}
{{--        });--}}

{{--    });--}}


{{--</script>--}}