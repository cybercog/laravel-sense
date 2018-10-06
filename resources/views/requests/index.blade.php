@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Requests Summary</h2>
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
        @foreach($summaries as $summary)
            <tr>
                <td class="text-center">
                    {{ $summary->id }}
                </td>
                <td class="uuid text-center">
                    <a href="/sense/requests/{{ $summary->request_id }}">
                        {{ $summary->request_id }}
                    </a>
                </td>
                <td>
                    <kbd>{{ $summary->method }}</kbd>
                    {{ $summary->url }}
                </td>
                <td class="text-center">
                    {{ $summary->queries_count }}
                </td>
                <td class="text-center">
                    {{ $summary->time_total }}
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
