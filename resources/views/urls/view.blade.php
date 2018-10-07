@extends('sense::app')

@section('content')
    <h2 class="mt-4 mb-4">Url</h2>

    <table class="table">
        <tr>
            <th>
                #
            </th>
            <th>
                Address
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
                {{ $url->id }}
            </td>
            <td>
                {{ $url->address }}
            </td>
            <td class="text-center">
                {{ $url->created_at }}
            </td>
            <td class="text-center">
                {{ $url->updated_at }}
            </td>
        </tr>
    </table>

    <h2 class="mt-4 mb-4">Url Requests</h2>
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
        @foreach($url->requests as $request)
            <tr>
                <td class="text-center">
                    {{ $request->id }}
                </td>
                <td>
                    <a href="/sense/requests/{{ $request->correlation_id }}">
                        {{ $request->correlation_id }}
                    </a>
                </td>
                <td class="text-center">
                    <kbd>{{ $request->method }}</kbd>
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
