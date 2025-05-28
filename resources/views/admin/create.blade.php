@extends('layouts.app')

@section('content')
{{-- @if ($errors->any())
 <div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item}}</li>
            @endforeach
        </ul>
    </div>
 </div>
    
@endif --}}
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
       <!-- START FORM -->
       <form action='{{route('admin.store')  }}' method='post'>
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        @csrf
           <div class="my-3 p-3 bg-body rounded shadow-sm">
               <div class="mb-3 row">
                   <label for="nim" class="col-sm-2 col-form-label" >nama</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='name' id="name" value="{{ old('name') }}">
                       @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

                    </div>
            </div><div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
        <select class="form-select" name="role" id="role">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
    </div>
</div>   
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">password</label>
                <div class="col-sm-10">
                  <input type="password" 
               class="form-control" 
               id="password" 
               name="password"
               required 
               autocomplete="new-password"
               value="{{ old('password') }}">
               @error('password')
              <div class="text-danger">{{ $message }}</div>
               @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">confirm password   </label>
                <div class="col-sm-10">
                  <input type="password" 
               class="form-control" 
               id="password_confirmation" 
               name="password_confirmation" 
               required 
               autocomplete="new-password"
               value="{{ old('password_confirmation') }}">
               @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
        @enderror


                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name='email' id="email" value="{{ old('email') }}">
                    @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

                </div>
            </div>
        <div class="mb-3 row">
            


            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
    

       

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
  @endsection