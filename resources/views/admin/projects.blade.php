<x-layout title="Projects">
    @foreach($Projects as $project)
    <h4>{{  $project['projectName']}}</h4>
    @endforeach
</x-layout>