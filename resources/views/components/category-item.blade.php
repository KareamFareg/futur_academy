@props(['category'])

    <li>
        <a href="{{$category->link}}">{{$category->Title}}</a>

        <ul>
        @foreach($category->children as $key => $child)

                    <x-category-item   :category="$child" />

        @endforeach

       </ul>

    </li>