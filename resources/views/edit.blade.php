<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <script src="{{url('jquery.min.js')}}"></script>
    <script src="{{url('bootstrap.min.js')}}"></script>
</head>

<body>

    <div class="container">
        <h2>Update Employee</h2>
        <form action="{{route('emplooyee.update',['emplooyee' => $emplooyee->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" value="{{$emplooyee->name}}" id="name" placeholder="Enter name"
                    name="name">
            </div>
            <div class="form-group">
                <label for="pwd">Age:</label>
                <input type="number" class="form-control" value="{{$emplooyee->age}}" id="age" placeholder="Enter age"
                    name="age">
            </div>
            <div class="form-group">
                <label for="pwd">Salary:</label>
                <input type="number" class="form-control" value="{{$emplooyee->salary}}" id="salary"
                    placeholder="Enter salary" name="salary">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

</body>

</html>