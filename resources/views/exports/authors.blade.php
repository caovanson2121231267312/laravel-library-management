<table>
    <thead>
        <tr>
            <th>{{ trans('request.id') }}</th>
            <th>{{ trans('message.name') }}</th>
            <th>{{ trans('message.description') }}</th>
            <th>{{ trans('message.email') }}</th>
            <th>{{ trans('message.created_at') }}</th>
            <th>{{ trans('message.updated_at') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $key => $author)
            <tr>
                <td>{{ $key + config('const.one') }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->description }}</td>
                <td>{{ $author->email }}</td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

