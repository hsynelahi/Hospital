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


  @include('Admin.body')
    </div>

   @include('Admin.js')
  </body>
</html>

