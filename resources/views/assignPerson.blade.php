@extends('layout.layout')
@section('content')
<!-- Material form contact -->
<div class="container">
    {{-- <h1 class="grey-text mt-4 d-inline">Welcome Task Project</h1> --}}
<div class="card mt-4">

    <h5 class="card-header blue white-text text-center py-2">
        <strong>Assign Person</strong>
    </h5>
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <!--Card content-->
    <div class="card-body px-lg-5 pt-3">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route("assignPInsert")}}" method="post">
        @csrf
            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="person">
                <label for="Assign Person Name">Assign Person Name</label>
            </div>

            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="id_number">
                <label for="ID">ID</label>
            </div>

            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="position">
                <label for="Position">Position</label>
            </div>

            <!-- Send button -->
            <button class="btn btn-primary" type="submit">Save</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>
<!-- Material form contact -->
@endsection