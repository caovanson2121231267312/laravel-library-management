<table>
    <thead>
        <tr>
            <th>{{ trans('request.id') }}</th>
            <th>{{ trans('message.name') }}</th>
            <th>{{ trans('message.email') }}</th>
            <th>{{ trans('message.address') }}</th>
            <th>{{ trans('message.created_at') }}</th>
            <th>{{ trans('message.updated_at') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($publishers as $key => $publisher)
            <tr>
                <td>{{ $key + config('const.one') }}</td>
                <td>{{ $publisher->name }}</td>
                <td>{{ $publisher->email }}</td>
                <td>{{ $publisher->address }}</td>
                <td>{{ $publisher->created_at }}</td>
                <td>{{ $publisher->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
