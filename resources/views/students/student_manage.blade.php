@extends('layout.app')

@section('title', 'Student Management')

@section('content')
    <h1 class="text-center py-5">List Student</h1>
    <div class="container">
        <table class="table">
            <?php $index = 1; ?>
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $std)
                    <tr>
                        <th scope="row">{{ $index++ }}</th>
                        <td>{{ $std->fullname }}</td>
                        <td><?php echo explode(' ', $std->birthday)[0]; ?></td>
                        <td>{{ $std->address }}</td>
                        <td>
                            <a href="students/{{ $std->id }}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
