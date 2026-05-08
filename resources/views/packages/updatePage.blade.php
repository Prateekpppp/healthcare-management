@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Medicines</h2>
                <a href="{{route('pages.medicines')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> View All
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateMedicine')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id ?? ''}}" >
                        @endif

                        <div class=" col-md-4 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required="" value="{{$data->name ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Price:</label>
                            <input type="text" name="price" class="form-control" id="price" required="" value="{{$data->price ?? ''}}">
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3" required>
                                {{ $data->description ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection

@section('js')
    
    <script>
    </script>
@endsection