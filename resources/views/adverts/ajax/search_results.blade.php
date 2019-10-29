
{{--<div class="card-body">--}}
{{--    @foreach($adverts as $advert)--}}
{{--        <div class="card mb-3" style="max-width: 900px;">--}}
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-md-4">--}}
{{--                    <img src="{{ $advert-> image}}" class="card-img" alt="...">--}}
{{--                </div>--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card-body">--}}
{{--                        <h6>{{$advert->category->title}}</h6>--}}
{{--                        <h5 class="card-title">{{$advert->title}}</h5>--}}
{{--                        --}}{{--                                            <p class="card-text"> {{truncateWords($advert-> content,100,"...")}}</p>--}}
{{--                        <p class="card-text">--}}
{{--                            <small class="text-muted">Kaina: {{ $advert-> price}} €</small>--}}
{{--                            <a href="advert/{{$advert->slug}}"--}}
{{--                               class="btn btn-outline-secondary float-right btn-sm">Detaliau</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    @endforeach--}}
{{--    {{$adverts->links()}}--}}

{{--</div>--}}

{{--<script>--}}
{{--    $(document).ready(function(){--}}

{{--        fetch_customer_data(); //call fetch_customer_data() when page has been load then this function has been called and it will display data on web page--}}

{{--        function fetch_customer_data(query ='') /*This function will return customer data if query argument is equal to zero, but if query argument has some value it will return filter customer data and display on webpage*/--}}
{{--        {--}}
{{--            $.ajax({ /*under this is written URL option set to root function with live search dot action*/--}}
{{--                url:"{{route('advert/action')}}", /*send request to action method of live_search controller*/--}}
{{--                method:'GET', /*define in which method we have send data to server*/--}}
{{--                data:{query:query}, /*data option and under this we can to find which data we should send to server, so here write query variable*/--}}
{{--                dataType: 'json', /*it means we will receive data in JSON format*/--}}
{{--                success:function (data) /*success callback function. This function has been be called if request completed successfully and it received data from server */--}}
{{--                {--}}
{{--                    $('tbody').html(data.table_data); /*this code will display customer data on web page in HTML table format */--}}
{{--                  //  $('#total_records').text(data.total_data); /*span tag ID total records with text method and under this we have write data.total_data, this will display total of records under span tag ID total record*/--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--        $(document).on('keyup', '#search', function () { //for live search //keyup event with textbox id search, so when we have typed something under textbox it will execute this block code--}}
{{--            var query = $(this).val(); // query variable with value method. This code will fetch search text box and store under this query variable--}}
{{--            fetch_customer_data(query); //call fetch_customer_data //this function will filter customer data according to value of query variable--}}
{{--        });--}}

{{--    });--}}

{{--</script>--}}