@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Request Summary</h2>
    <table class="table">
        <tr>
            <th>
                #
            </th>
            <th class="uuid">
                Request ID
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
                {{ $requestSummary->id }}
            </td>
            <td class="uuid text-center">
                {{ $requestSummary->request_id }}
            </td>
            <td>
                <kbd>{{ $requestSummary->method }}</kbd>
                {{ $requestSummary->url }}
            </td>
            <td class="text-center">
                {{ $requestSummary->queries_count }}
            </td>
            <td class="text-center">
                {{ $requestSummary->time_total }}
            </td>
            <td class="text-center">
                {{ $requestSummary->created_at }}
            </td>
            <td class="text-center">
                {{ $requestSummary->updated_at }}
            </td>
        </tr>
    </table>

    <h2 class="mt-4 mb-4">Statements Summary</h2>
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
        @foreach($statementSummaries as $summary)
            <tr>
                <td class="text-center">
                    {{ $summary->id }}
                </td>
                <td class="statement">
                    {{ $summary->statement->value }}
                </td>
                <td class="text-center">
                    {{ $summary->queries_count }}
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
