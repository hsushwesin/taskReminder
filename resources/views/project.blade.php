@extends('layout.layout')
@section('content')
<!-- Material form contact -->
<div class="container">
    {{-- <h1 class="grey-text mt-4 d-inline">Welcome Task Project</h1> --}}
<div class="card mt-4">

    <h5 class="card-header indigo white-text text-center py-4">
        <strong>Project Name</strong>
    </h5>
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <!--Card content-->
    <div class="card-body px-lg-5 pt-3">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route("projectInsert")}}" method="post">
        @csrf
            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="project_name">
                <label for="Project Name">Project Name</label>
            </div>

            <!-- Send button -->
            <button class="btn btn-indigo btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>
<!-- Material form contact -->
@endsection