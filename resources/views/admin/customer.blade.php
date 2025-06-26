<x-layout title="Customer">
    @foreach($Customers as $Customer)
        <h4>{{ $Customer->name }}</h4>
        <ul>
            @foreach ($Customer->projects as $project)
                <li>{{$project->projectName}}</li>
            @endforeach
        </ul>
    @endforeach

</x-layout>