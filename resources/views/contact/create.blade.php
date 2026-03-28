@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Contact
                        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-danger">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="first_name">E-mail Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
