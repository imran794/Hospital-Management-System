<form class="main-form" action="{{ route('admin.appointment.store') }}" method="POST">
  @csrf
  <div class="row mt-5 ">
    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
      <input type="text" name="name" class="form-control" placeholder="Full name">
      @error('name')
      <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
      <input type="text" name="email" class="form-control" placeholder="Email address..">
    </div>
    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
      <input type="date" name="date" class="form-control">
      @error('date')
      <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
      <select name="doctor" id="departement" class="custom-select">
        @foreach($doctors as $doctor)
        <option value="{{ $doctor->doctor_name }}">{{ $doctor->doctor_name }} ({{ $doctor->doctor_speciality }}) </option>
        @endforeach
      </select>
      @error('doctor')
      <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
      <input type="text" name="number" class="form-control" placeholder="Number..">
        @error('number')
      <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
      <textarea name="message" name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="margin-bottom: 50px; background-color: #00D9A5;">Submit Request</button>
</form>