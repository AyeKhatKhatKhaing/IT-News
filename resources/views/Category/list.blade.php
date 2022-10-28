<table class="table table-hover">
    <thead>
    <tr>
        <td>#</td>
        <td>Title</td>
        <td>Owner</td>
        <td>Controls</td>
        <td>Created At</td>
    </tr>
    </thead>
    <tbody>
    @forelse(\App\Category::with("user")->get() as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->title}}</td>
            <td>{{$c->user->name}}</td>
            <td>
                <a href="{{route('category.edit',$c->id)}}" class="btn btn-outline-primary">
                    Edit
                </a>
                <form action="{{ route('category.destroy',$c->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {{$c->title}}')">Delete</button>
                </form>
            </td>
            <td>
                <span class="feather-calendar">{{$c->created_at->format("d m Y")}}</span>
                <br>
                <span class="feather-clock ">{{$c->created_at->format("h i A")}}</span>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">There is no category</td>
        </tr>
    @endforelse
    </tbody>
</table>
