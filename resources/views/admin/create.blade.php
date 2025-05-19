@extends('layouts.app')

@section('content')
@if ($errors->any())
 <div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
 </div>
    
@endif
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
        @csrf
           <div class="my-3 p-3 bg-body rounded shadow-sm">
               <div class="mb-3 row">
                   <label for="nim" class="col-sm-2 col-form-label">nama</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='name' id="nama">
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name='password' id="password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name='email' id="email">
                </div>
            </div>
        <div class="mb-3 row">
            
  <!--    <label for="permissions" class="col-sm-2 col-form-label">Berikan Hak Akses</label>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="create" id="permCreate">
            <label class="form-check-label" for="permCreate">
                Tambah
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="read" id="permRead">
            <label class="form-check-label" for="permRead">
                Lihat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="edit" id="permEdit">
            <label class="form-check-label" for="permEdit">
                Edit
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="delete" id="permDelete">
            <label class="form-check-label" for="permDelete">
                Hapus
            </label>
        </div>
    </div>
</div> -->

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                  <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-4">password</th>
                            <th class="col-md-2">email</th>
                            <th class="col-md-2">role</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach ($user as $no => $data)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->password }}</td>
        <td>{{ $data->email }}</td>
    </tr>
@endforeach

                    </tbody>
                </table>
               
          </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
  @endsection