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
    
        <table class="table table-responsive">
            <thead class="text-center p-2 thead-dark">
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action2</th>
                <th>Action3</th>
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
                      <form action="{{ route('cancelAppointment',$appointment->id) }}" method="POST">
                        @csrf
                        @method('put')
                            <button class="btn btn-danger">Canceled</button>
                      </form>
                  </td>
                  <td>
                    <form action="{{ route('approveAppointment',$appointment->id) }}" method="POST">
                        @csrf
                        @method('put')
                            <button class="btn btn-success">Approved</button>
                      </form>
                  </td>
                  <td>
                    <form action="{{ route('emailView',$appointment->id) }}" method="POST">
                      @csrf
                      @method('get')
               
                          <button class="btn btn-primary">Send Email</button>
                    </form>
                  </td>
              </tr>
            @endforeach
   
        </table>
</div>

    </div>

   @include('Admin.js')
  </body>
</html>

