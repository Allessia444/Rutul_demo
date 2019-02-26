<table>
    <thead>
    <tr>
        <th>Blog Name</th>
        <th>Blog Category Name</th>
        <th>User Name</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->name }}</td>
            <td>{{ $blog->blog_category->name }}</td>
            <td>{{ $blog->user->fname }}</td>
            <td>{{ $blog->created_at }}</td>
            <td>{{ $blog->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>