@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Requests</h2>
    <table class="table">
        <tr>
            <th>
                #
            </th>
            <th class="uuid">
                Correlation ID
            </th>
            <th>
                Method
            </th>
            <th>
                URL
            </th>
            <th>
                Queries
            </th>
            <th>
                Time total
            </th>
            <th>
                Created at
            </th>
            <th>
                Updated at
            </th>
        </tr>
        @foreach($requests as $request)
            <tr>
                <td class="text-center">
                    {{ $request->id }}
                </td>
                <td class="uuid">
                    <a href="/sense/requests/{{ $request->correlation_id }}">
                        {{ $request->correlation_id }}
                    </a>
                </td>
                <td class="text-center">
                    <kbd>{{ $request->method }}</kbd>
                </td>
                <td>
                    <a href="/sense/urls/{{ $request->url->id }}">
                        {{ $request->url->address }}
                    </a>
                </td>
                <td class="text-center">
                    {{ $request->summary->queries_count }}
                </td>
                <td class="text-center">
                    {{ $request->summary->time_total }}
                </td>
                <td class="text-center">
                    {{ $request->summary->created_at }}
                </td>
                <td class="text-center">
                    {{ $request->summary->updated_at }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
