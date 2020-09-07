<table>
    <thead>
        <tr>
            <th>{{ trans('request.id') }}</th>
            <th>{{ trans('message.name') }}</th>
            <th>{{ trans('message.email') }}</th>
            <th>{{ trans('message.phone_number') }}</th>
            <th>{{ trans('message.created_at') }}</th>
            <th>{{ trans('message.updated_at') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
