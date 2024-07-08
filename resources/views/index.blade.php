<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <script src="{{url('jquery.min.js')}}"></script>
    <script src="{{url('bootstrap.min.js')}}"></script>
</head>

<body>
    <div class="container">
        <h1>Employee List</h1>
        <a href="{{route('emplooyee.create')}}" class="btn btn-primary">Add Emplooyee</a>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->age }}</td>
                    <td>&#8377;{{ number_format($value->salary,2) }}</td>
                    <td><a href="{{route('emplooyee.edit',['emplooyee'=>$value->id])}}"
                            class="btn btn-link me-3">Edit</a>
                    </td>
                    <td>
                        <button class="btn btn-link me-3" onclick="DeleteRecord('{{$value->id}}')">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No Record Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
<script>
function DeleteRecord(id) {
    if (confirm("Are you sure you want delete this record?")) {
        var url = "{{ route('emplooyee.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            dataType: "JSON",
            success: function(result) {
                if (result.status == 200) {
                    location.href = "{{route('emplooyee.index')}}";
                }
            }
        });
    }
}
</script>

</html>