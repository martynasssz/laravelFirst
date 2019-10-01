<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <ul class="nav nav-pills">
        @foreach($categories as $category)

            @if(count($category->subCategories) === 0)
                <li class="nav-item">
                    <a class="nav-link active" href="#" role="button">{{$category->title}}</a>
            @else

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{$category->title}}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($category->subCategories as $subCategory)
                            <a class="dropdown-item "
                               href={{route('categories.show', $subCategory->slug)}}>{{$subCategory->title}} </a>

                            @foreach($subCategory->subCategories as $subsubCategory)
                                <a class="dropdown-item " style="padding-left: 50px"
                                   href={{route('categories.show', $subsubCategory->slug)}}> {{$subsubCategory->title}}</a>
                                </a>

                            @endforeach
                        @endforeach
                    </div>
            @endif
                </li>
        @endforeach

    </ul>
</nav>