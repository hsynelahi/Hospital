@if (session()->has('message'))
<div class="alert alert-success col-6">
  <button class="close" type="button" data-dismiss="alert">x</button>  
  {{ session()->get('message') }}   
</div>
@endif