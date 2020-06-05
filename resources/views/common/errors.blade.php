{{-- {{dd($errors)}} --}}
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class='alert alert-danger'>
        @foreach ($errors as $error)
           {{$error}}
           <br/>
        @endforeach
    </div>
@endif