@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Query</h2>

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
                Explain
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
            <td>
                <a href="/sense/queries/{{ $query->id }}">
                    <kbd>EXPLAIN</kbd>
                </a>
            </td>
            <td class="text-center">
                {{ $query->created_at }}
            </td>
            <td class="text-center">
                {{ $query->updated_at }}
            </td>
        </tr>
    </table>

    <h3 class="mt-4 mb-4">Query Explain</h3>

    @if (count($query->explanation) > 0)
        @foreach($query->explanation->result as $explain)
            <table class="table">
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
                @foreach ($explain as $key => $value)
                    <tr>
                        <th class="text-center">
                            {{ $key }}
                        </th>
                        <td class="text-center">
                            {{ $value ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endforeach
    @else
        <p>There are no explains for this query.</p>
    @endif
@endsection
