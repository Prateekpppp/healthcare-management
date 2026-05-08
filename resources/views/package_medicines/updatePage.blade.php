@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                    <h2 class="page-header">Package Medicine</h2>
                    <a href="{{route('pages.packageMedicine',['id' => $package->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> View All
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updatePackageMedicine')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id ?? ''}}" >
                        @endif
                        <input name="package_id" type="hidden" class="form-control" id="package_id" value="{{$package->id ?? ''}}" >

                        <div class=" col-md-4 form-group">
                            <label>Package:</label>
                            <input type="text" name="package" class="form-control" id="package" value="{{$package->name ?? ''}}" disabled>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Medicine:</label>
                            <select name="medicine_id" class="form-control" required id="medicine_id">
                                    <option value="">Select</option>
                                    @foreach($medicines as $medicine)
                                        <option {{isset($data->medicine_id) && $data->medicine_id == $medicine->id ? 'selected' : ''}} value="{{$medicine->id}}">{{ $medicine->name}}</option>
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