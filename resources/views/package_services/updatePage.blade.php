@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                    <h2 class="page-header">Service Packages</h2>
                    <a href="{{route('pages.servicePackage',['id' => $service->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> All Packages
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateServicePackage')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id ?? ''}}" >
                        @endif
                        <input name="service_id" type="hidden" class="form-control" id="id" value="{{$service->id ?? ''}}" >

                        <div class=" col-md-4 form-group">
                            <label>Service:</label>
                            <input type="text" name="name" class="form-control" id="service" value="{{$service->name ?? ''}}" disabled>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Package:</label>
                            <select name="package_id" class="form-control" required id="package_id">
                                    <option value="">Select</option>
                                    @foreach($packages as $package)
                                        <option {{isset($data->package_id) && $data->package_id == $package->id ? 'selected' : ''}} value="{{$package->id}}">{{ $package->name}}</option>
                                    @endforeach
                            </select>
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