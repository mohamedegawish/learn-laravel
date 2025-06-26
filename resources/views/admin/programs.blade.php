<x-layout title="Programs">
    @foreach($programs as $program)

    <h4>{{  $program['name']}}</h4>

@endforeach
</x-layout>