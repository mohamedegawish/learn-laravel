<div>
<h1>Courses :</h1><br>
@foreach ($Courses as $course )
<div>
    {{ $course['title'] }} => {{ $course['credit'] }}<br>
</div>

<div></div>


</div>

@endforeach

