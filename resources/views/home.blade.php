@extends('layouts.main')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">

            <!-- create button -->
            <div class="my-3">
                <a href="{{ route('home.create') }}" class="btn btn-primary">Create Application here</a>
            </div>
            <form id="frm" action="{{route('home.update')}}" method="POST">
                @csrf
                <table class="table" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sno</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">phone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Uploads</th>
                        </tr>
                    </thead>

                    <tbody>
                        @csrf
                        @foreach($values as $key => $value)
                        <tr>
                            <th scope="row">{{ $key+1 }}.</th>
                            <td> {{ $value->name }}</td>
                            <td> {{ $value->email }}</td>
                            <td> {{ $value->phone }}</td>
                            <td>
                                @if($value->status == '2')
                                <select class="custom-select" name="status[{{$value->id}}][]" disabled>
                                    <option value="0" {{ ( $value->status == '0') ? 'selected' : '' }}> Inactive</option>
                                    <option value="1" {{ ( $value->status == '1') ? 'selected' : '' }}> Active</option>
                                    <option class="approved" value="2" {{ ( $value->status == '2') ? 'selected' : '' }}>Approved</option>
                                </select>

                                @else
                                <select class="custom-select" name="status[{{$value->id}}][]">
                                    <option value="0" {{ ( $value->status == '0') ? 'selected' : '' }}> Inactive</option>
                                    <option value="1" {{ ( $value->status == '1') ? 'selected' : '' }}> Active</option>
                                    <option class="approved" value="2" {{ ( $value->status == '2') ? 'selected' : '' }}>Approved</option>
                                </select>
                                @endif

                            </td>
                            <td> <img src="{{ asset('uploads/'.$value->file) }}" name="file[]" alt="not found" class="img-fluid w-100" style="height: 100px;"> </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <!-- submit button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
