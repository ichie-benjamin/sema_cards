
<li class="submenu dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $current_locale }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu">
            @foreach($available_locales as $locale_name => $available_locale)
                @if($available_locale !== $current_locale)
        <li><a href="{{ route('change.lang',$available_locale) }}">{{ $available_locale }}</a></li>
                @endif
        @endforeach
    </ul>
</li>
