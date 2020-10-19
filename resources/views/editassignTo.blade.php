@extends('layout.layout')
@section('content')
<div class="container">
    <div class="card mt-4">
    @if (Session("delete"))   
    <div class="alert alert-danger">
    {{Session("delete")}}
    </div>
    @endif
    
    <!-- Material form register -->
<div class="card mt-4">

    <h5 class="card-header indigo white-text text-center py-4">
        <strong>Assign To Form</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" action="{{route("updateassignTo", $editassignTo->id)}}" method="post">
        @csrf
            
            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="to" value="{{$editassignTo->to}}">
                <label for="">Assign To</label>
                @error('person')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>            
            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="id_number" value="{{$editassignTo->id_number}}">
                <label for="">ID Number</label>
                @error('id_number')
                    <p class="text-danger">{{$message}}</p>
                @enderror               
            </div>
            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="position" value="{{$editassignTo->position}}">
                <label for="">Position</label>
                @error('position')
                    <p class="text-danger">{{$message}}</p>
                @enderror               
            </div>           

            <!-- Order button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
</div>

@endsection