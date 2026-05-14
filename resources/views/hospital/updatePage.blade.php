@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Hospital</h2>
                <a href="{{route('pages.hospitals')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> View All
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateHospital')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id}}" >
                        @endif
                        <div class="col-md-4 form-group">
                            {{-- <img src="" alt="" srcset=""> --}}
                            <label>Logo:</label>
                            <input type="file" name="logo" class="form-control" >
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required 
                                value="{{ $data->name ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" 
                                value="{{ $data->email ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Phone:</label>
                            <input type="text" name="contact" class="form-control" required 
                                value="{{ $data->contact ?? '' }}">
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <label>Pan Number :</label>
                            <input type="text" name="pan_no" class="form-control" required 
                                value="{{ $data->pan_no ?? '' }}">
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <label>Registration Number :</label>
                            <input type="text" name="registration_no" class="form-control" required 
                                value="{{ $data->registration_no ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Address:</label>
                            <textarea name="address" class="form-control" rows="3" required>
                                {{ $data->address ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3">
                                {{ $data->description ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-12">
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Working Days",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection