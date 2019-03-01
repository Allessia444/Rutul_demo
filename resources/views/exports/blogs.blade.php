<style type="text/css">
.username
{
   background-color: #FFB6C1; 
}

.blogname
{
    background-color: #ADD8E6;

}
</style>
<table>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Blog Name</th>
            <th>Blog Category Name</th>
            <th>Blog Description</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $key => $blog)
     
        <tr>
            <td>{{ $blog->user->fname }}</td>
            <td>{{ $blog->name }}</td>
            <td>{{ $blog->blog_category->name }}</td>
            <td>{{ $blog->description }}</td>
            <td>{{ $blog->created_at }}</td>
            <td>{{ $blog->updated_at }}</td>
        </tr>
      
        @endforeach
    </tbody>
</table>