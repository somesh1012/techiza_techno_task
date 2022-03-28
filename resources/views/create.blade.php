@extends('layouts.main')
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputphone1" placeholder="Phone number" required>
                </div>

                <select class="custom-select my-2" name="status" required>
                    <option value="" hidden> ---Select status ---</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                    <option value="2">Approved</option>
                </select>

                <div class="form-control my-3">
                    <input type="file" name="file" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection