@foreach($product as $products)
<form method="POST" action="{{ route('updataProductPost',['product_id'=>$products->product_id])}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
<input type="hidden" name="user_id" value="{{ auth::id() }}">
        <fieldset enabled>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$products->name}}" id="name" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="text" id="price" value="{{$products->pprice}}" name="pprice" class="form-control" placeholder="price">
            </div>
            <div class="form-group">
                <label for="color">color</label>
                <select id="color" name="color" aria-valuenow="{{$products->color}}" class="form-control">
                    <option>green</option>
                    <option>yellow</option>
                    <option>red</option>
                    <option>blue</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category">category</label>
                <select id="category" name="category"  class="form-control">
                    @foreach($category as $categoris)
                    <option value="{{$categoris}}" >{{$categoris}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload image</span>
                </div>
                <div class="custom-file">
                    @foreach($upload as $uploads)
                  <input type="file" name="upimg" value="{{$uploads->path}}" class="custom-file-input" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    @endforeach
                </div>
              </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" value="{{$products->description}}" name="description" id="description "  placeholder="enter discription"></input>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @endforeach
        </fieldset>
    </form>
