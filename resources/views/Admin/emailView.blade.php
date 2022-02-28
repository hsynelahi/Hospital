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

     <form action="{{ route('sendEmail',$email->id) }}" method="POST">

        @csrf
    
            <label class="form-label">Greeting :</label>
            <input type="text" name="greeting" placeholder="Greeting ..." class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">Body :</label>
            <input type="text" name="body" placeholder="Body ..."  placeholder="Phone ..." class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">Action Text :</label>
            <input type="text" name="actiontext" placeholder="Action Text ..."  class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">Action Url :</label>
            <input type="text" name="actionurl" placeholder="Action Url ..."  class="col-6 form-control mb-4 text-white" required>
            
            <label class="form-label">End Part :</label>
            <input type="text" name="endpart" placeholder="End Part ..."  class="col-6 form-control mb-4 text-white" required>
    
            <input type="submit" name="submit" class="btn btn-success col-6 p-2" value="Send Email">
    
    </form>



  </div>
    </div>

   @include('Admin.js')
  </body>
</html>

