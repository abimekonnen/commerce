<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>

    {{-- @if (Route::currentRouteName() ==="home" || Route::currentRouteName() ==="welcome"   || Route::currentRouteName() ==="checkout"
     || Route::currentRouteName() ==="getTypes" || Route::currentRouteName() ==="getCategory" || Route::currentRouteName() ==="getSearch") --}}
    <li class="nav-item">

            @auth
                <a class="nav-link" href="{{ route('home') }}">
                    <svg class="nav-icon">
                        <use xlink:href=""></use>
                    </svg>
                    {{ __('All product') }}
                </a>
            @else
                <a class="nav-link" href="{{ route('welcome') }}">
                    <svg class="nav-icon">
                        <use xlink:href=""></use>
                    </svg>
                    {{ __('All product') }}
                </a>
            @endauth
    </li>
    @foreach ($categories as $category )
    <li class="nav-group" aria-expanded="false">
        
        <a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
                <use xlink:href=""></use>
            </svg>

            {{ $category->name }}
        </a>
    
        <ul class="nav-group-items" style="height: 0px;">
            @foreach ($types as $type)
                @if ($type->category === $category->name)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getTypes',$type->name) }}" target="_top">
                            <svg class="nav-icon">
                                <use xlink:href=""></use>
                            </svg>
                                {{ $type->name }}
                        </a>
                    </li>
                @endif    
            @endforeach
        </ul> 
    
    </li>
    @endforeach  
    {{-- @endif --}}

    @auth
        <li class="nav-item">

            @if (auth()->user()->isAdmin())
                <a class="nav-link" href="{{ route('category.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href=""></use>
                    </svg>
                    {{ __('Category') }}
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (auth()->user()->isAdmin())
            <a class="nav-link"  href="{{ route('productTyp.index') }}">
                <svg class="nav-icon">
                    <use xlink:href=""></use>
                </svg>
                {{ __('Product Type') }}
            </a>
            @endif
        </li>
        <li class="nav-item">

        </li>
        <li class="nav-item">

        </li>
        <li class="nav-item">
            @if (auth()->user()->isAdmin())
            <a class="nav-link" href="{{ route('users.index') }}">
                <svg class="nav-icon">
                    {{-- {{ asset('icons/coreui.svg#cil-user') }} --}}
                    <use xlink:href=""></use>
                </svg>
                {{ __('Users') }}
            </a>
            @endif
        </li>

        <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('about') }}">
                <svg class="nav-icon">
                    <use xlink:href=""></use>
                </svg>
                {{ __('About us') }}
            </a> --}}
        </li>
        @else
    @endauth

</ul>