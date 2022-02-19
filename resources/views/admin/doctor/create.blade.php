 @extends('admin.home')

@section('title','All Doctor')

@push('css')
@endpush


@section('content')

 <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">@isset($doctor) Update Doctor List @else Add Doctor list @endisset</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class=" btn btn-primary" href="{{ route('admin.doctor.index') }}">Back</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ isset($doctor) ? route('admin.doctor.update',$doctor->id) : route('admin.doctor.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($doctor)
                        @method('PUT')
                        @endisset
                      <div class="form-group">
                        <label for="exampleInputUsername1">Doctor Name</label>
                        <input style="color: #000"; type="text" name="doctor_name" class="form-control" id="exampleInputUsername1" placeholder="Doctor Name" value="{{ $doctor->doctor_name ?? old('doctor_name') }}">
                           @error('doctor_name')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input style="color: #000";  type="number" name="doctor_phone" class="form-control" id="exampleInputEmail1" placeholder="Doctor Phone Number" value="{{ $doctor->doctor_phone ?? old('doctor_phone') }}">
                         @error('doctor_phone')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Doctor Speciality</label>
                        <input style="color: #000";  type="text" name="doctor_speciality" class="form-control" id="exampleInputPassword1" placeholder="Doctor Speciality" value="{{ $doctor->doctor_speciality ?? old('doctor_speciality') }}">
                         @error('doctor_speciality')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Doctor Room</label>
                        <input style="color: #000"; type="text" name="doctor_room" class="form-control" id="exampleInputConfirmPassword1" placeholder="Doctor Room" value="{{ $doctor->doctor_room ?? old('doctor_room') }}">
                         @error('doctor_room')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Doctor Image</label>
                        <br>
                        <input  type="file" name="doctor_image" id="exampleInputConfirmPassword1" placeholder="Doctor Image">
                         @error('doctor_image')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror 
                        @isset($doctor)
                        <div class="pt-3">
                        <img width="200" src="{{ Storage::disk('public')->url('doctor/'.$doctor->doctor_image) }}" alt="doctor_image">
                        </div>
                        @endisset
                      </div>
                      <button type="submit" class="btn btn-primary me-2">
                        @isset($doctor)
                          Update
                          @else
                          Submit
                        @endisset
                      </button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
             
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          
          <!-- partial -->
        </div>



@endsection

@push('js')

   
@endpush