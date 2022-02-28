<!DOCTYPE html>
<html lang="en">
<head>
  @include('User.css')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
   @include('User.navbar')
  </header>

  @include('error')
 
  
  <div class="container mx-auto p-5" align="center">
      <table class="table table-responsive">
          <thead class="text-center p-2 thead-dark">
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Doctor</th>
              <th>Date</th>
              <th>Message</th>
              <th>Status</th>
              <th>Action</th>
          </thead>
          @foreach ($appointments as $appointment)
            <tr class="text-center p-2">
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->doctor }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->message }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <form action="{{ route('deletemyappointment',$appointment->id) }}" method="POST">
                        @csrf
                        @method('delete')
                         <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
          @endforeach
 
      </table>
  </div>

@include('User.footer')

@include('User.js')  

</body>
</html>
