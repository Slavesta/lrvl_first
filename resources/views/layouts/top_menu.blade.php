@foreach ($categories as $category)

  @if ($category->children->where('published', 1)->count())
    <li class='nav-item dropdown pr-3'>
      <a href='{{url("/blog/category/$category->slug")}}' class='dropdown-item dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
        {{$category->title}} <span class='caret'></span>
      </a>
        <ul class="dropdown-menu" role='menu'>
          @include('layouts.top_menu', ['categories' => $category->children])
        </ul>
  @else
    <li class='nav-item pr-3'>
      <a class='nav-link' href='{{url("/blog/category/$category->slug")}}'>
        {{$category->title}}
      </a>
  @endif
    </li>
@endforeach
