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
     <form action="{{ route('updateDoctor',$doctor->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
    
            <label class="form-label">Doctor Name :</label>
            <input type="text" name="name" placeholder="Dr.Name ..." class="col-6 form-control mb-4 text-white" value="{{ $doctor->name }}">
            
            <label class="form-label">Phone :</label>
            <input type="text" name="phone" placeholder="Phone ..." class="col-6 form-control mb-4 text-white" value="{{ $doctor->phone }}">
            
            <label class="form-label">Room No :</label>
            <input type="number" name="room" class="col-6 form-control mb-4 text-white" value="{{ $doctor->room }}">
    
            <label class="form-label">Speciality :</label>
            <select name="speciality" class="form-select mb-4 col-6" value="{{ $doctor->speciality }}">
                <option value="" class="text-muted">--speciality--</option>
                <option value="Nose">Nose</option>
                <option value="eye">eye</option>
                <option value="leg">leg</option>
                <option value="hand">hand</option>
            </select>

    
            <label class="form-label">New Image :</label>
            <input type="file" name="image" class="col-6 form-control mb-4">
    
            <label class="form-label">Current Image :</label>
            <img src="/doctorimage/{{ $doctor->image }}" alt="doctorImage" width="80px" height="80px">
            <br>

            <button class="btn btn-primary" name="button">Update Doctor</button>
    </form>




  </div>
    </div>

   @include('Admin.js')
  </body>
</html>

