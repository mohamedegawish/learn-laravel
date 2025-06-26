<x-layout title="Customer">
        <h4>{{ $Customer->name }}</h4>
        <ul>
            @foreach ($Customer->projects as $project)
                <li>{{$project->projectName}}</li>
            @endforeach
        </ul>

</x-layout>