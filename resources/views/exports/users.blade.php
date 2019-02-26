<table>
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    </thead>
    <tbody>
      
    @foreach($users as $user)
        <tr>
            <td>{{ $user->fname }}</td>
            <td>{{ $user->lname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_profile->gender }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>