<x-layout title="doctors">
@foreach($doctors as $doctor)

    <h4>{{  $doctor['name']}}</h4>

@endforeach
{{ $doctors ->links()}}
</x-layout>