<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

@include('Admin.css')
  </head>
  <body>
    <div class="container-scroller">
  @include('Admin.navbar')

<div class="container m-3 p-5">
    @include('error')
    <table class="table">
        <thead class="text-center p-2 thead-dark">
            <th>Doctor Name</th>
            <th>Phone</th>
            <th>Speciality</th>
            <th>Room N.o</th>
            <th>Image</th>
            <th>Action</th>
            <th>Action2</th>
        </thead>
        @foreach ($doctors as $doctor)
        <tr class="text-center p-2">
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>{{ $doctor->speciality }}</td>
            <td>{{ $doctor->room }}</td>
            <td>
                <img src="/doctorImage/{{ $doctor->image }}" alt="doctorImage" width="70px" height="70px">
            </td>
            <td>
                <form action="{{ route('deleteDoctor',$doctor->id) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button class="btn btn-danger">Delete</button>

                </form>
            </td>
            <td>
                <a href="{{ route('updateDoctorView',$doctor->id) }}" class="btn btn-primary">Update</a>
            </td>
        </tr>
        @endforeach
  
    </table>
</div>

    </div>

   @include('Admin.js')
  </body>
</html>

