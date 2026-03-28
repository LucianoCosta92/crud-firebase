@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Contacts List
                        <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">Add Contact</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $id => $contact)
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td>{{ $contact['first_name'] ?? '' }}</td>
                                    <td>{{ $contact['last_name'] ?? '' }}</td>
                                    <td>{{ $contact['phone'] ?? '' }}</td>
                                    <td>{{ $contact['email'] ?? '' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="#" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
