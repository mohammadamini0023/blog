<!doctype html>
<html lang="en">
    <head>
        <title>ebay</title>
        <meta charset="utf8">
    </head>
    <body>
            @extends('layouts.app')
            @section('content')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('showindex1') }}" method="POST" >
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        {!! csrf_field() !!}
                        <select name="entercity" id="city">
                            <option></option>
                            @foreach($city as $citys)
                            <option value="{{$citys->city_id}}">{{$citys->city}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                    </form>
                </div>
              </div>
            </div>
          @endsection
          <!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- BS JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- Have fun using Bootstrap JS -->
<script type="text/javascript">
$(window).load(function() {
    $('#exampleModal').modal('show');
});
</script>
    </body>
</html>
