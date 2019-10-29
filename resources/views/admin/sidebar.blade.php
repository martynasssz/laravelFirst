
<div class="col-md-3">

    <div class="card">
        <div class="card-header">
            Meniu
        </div>

        <div class="card-body">
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link links1" href="{{route('admin.index')}}"><i class="far fa-address-card"></i> Skelbimų valdymas </a>
{{--                    <a class="nav-link" href="{{'#'}}"> Users </a>--}}
{{--                    <a class="nav-link" href="{{'#'}}"> Roles </a>--}}
                    <a class="nav-link links1" href="{{route('category.index')}}"> <i class="fas fa-align-justify"></i> Kategorijų klasifikatoriaus </a>
                    <a class="nav-link links1" href="{{route('cities.index')}}"> <i class="fas fa-city"></i> Miestų klasifikatoriaus </a>
                    <a class="nav-link links1" href="{{route('messages.create')}}"><i class="far fa-envelope"></i> Žinučių valdymas </a>
                </li>
            </ul>






        </div>
    </div>
    <br/>


</div>