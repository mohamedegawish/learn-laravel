@php
$activeLink="active";
$default=" ";
@endphp
<ul class="sidebar-nav">
    <li><a href="/" class="{{ $active ? $activeLink:$default }}"><i class="fas fa-tachometer-alt"></i> 
    
    <span>{{ $slot }}</span>

</a></li>
</ul>