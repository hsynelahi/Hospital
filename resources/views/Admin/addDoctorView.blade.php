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
     <form action="{{ route('addDoctor') }}" method="POST" enctype="multipart/form-data">

        @csrf
    
            <label class="form-label">Doctor Name :</label>
            <input type="text" name="name" placeholder="Dr.Name ..." class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">Phone :</label>
            <input type="text" name="phone" placeholder="Phone ..." class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">Room No :</label>
            <input type="number" name="room" class="col-6 form-control mb-4 text-white" required>
    
            <label class="form-label">Speciality :</label>
            <select name="speciality" class="form-select mb-4 col-6">
                <option value="" class="text-muted">--speciality--</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Dental">Dental</option>
                <option value="General Health">General Health</option>
                <option value="pediatrician">pediatrician</option>
                <option value="Ophthalmologist">Ophthalmologist</option>
            </select>

    
            <label class="form-label">Image :</label>
            <input type="file" name="image" class="col-6 form-control mb-4" required>

            <input type="submit" name="submit" class="btn btn-success col-6 p-2" value="Add Doctor">
    
    </form>



  </div>
    </div>

   @include('Admin.js')
  </body>
</html>

