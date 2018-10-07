@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Request</h2>
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
        <tr>
            <td class="text-center">
                {{ $request->id }}
            </td>
            <td class="uuid">
                {{ $request->correlation_id }}
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
                <a href="/sense/queries?filter[request][id]={{ $request->id }}">
                    {{ $request->summary->queries_count }}
                </a>
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
    </table>

    <h2 class="mt-4 mb-4">Request Statements</h2>
    <table class="table">
        <tr>
            <th>
                #
            </th>
            <th class="statement">
                Statement
            </th>
            <th>
                Queries
            </th>
            <th>
                Time total
            </th>
            <th>
                Time min
            </th>
            <th>
                Time max
            </th>
            <th>
                Created at
            </th>
            <th>
                Updated at
            </th>
        </tr>
        @foreach($request->statementSummaries as $summary)
            <tr>
                <td class="text-center">
                    {{ $summary->id }}
                </td>
                <td class="statement">
                    {{ $summary->statement->value }}
                </td>
                <td class="text-center">
                    <a href="/sense/queries?filter[request][id]={{ $request->id }}&filter[statement][id]={{ $summary->statement->id }}">
                        {{ $summary->queries_count }}
                    </a>
                </td>
                <td class="text-center">
                    {{ $summary->time_total }}
                </td>
                <td class="text-center">
                    {{ $summary->time_min }}
                </td>
                <td class="text-center">
                    {{ $summary->time_max }}
                </td>
                <td class="text-center">
                    {{ $summary->created_at }}
                </td>
                <td class="text-center">
                    {{ $summary->updated_at }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
