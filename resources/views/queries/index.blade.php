@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Queries</h2>
    <table class="table">
        <tr>
            <th>
                #
            </th>
            <th class="uuid">
                Correlation ID
            </th>
            <th>
                Connection
            </th>
            <th>
                SQL
            </th>
            <th>
                Time
            </th>
            <th>
                Created at
            </th>
            <th>
                Updated at
            </th>
        </tr>
        @foreach($queries as $query)
            <tr>
                <td class="text-center">
                    {{ $query->id }}
                </td>
                <td class="uuid">
                    <a href="/sense/requests/{{ $query->request->correlation_id }}">
                        {{ $query->request->correlation_id }}
                    </a>
                </td>
                <td class="text-center">
                    {{ $query->connection }}
                </td>
                <td>
                    {{ $query->sql }}
                </td>
                <td class="text-center">
                    {{ $query->time }}
                </td>
                <td class="text-center">
                    {{ $query->created_at }}
                </td>
                <td class="text-center">
                    {{ $query->updated_at }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
