@extends('admin.home')
@section('title','All Doctor')
@push('css')
@endpush
@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> All Doctor </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="badge badge-success" href="{{ route('admin.doctor.create') }}">Add Doctor</a></li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Doctor List</h4>
					</p>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>SL No</th>
									<th>Image</th>
									<th>Doctor Name</th>
									<th>Doctor Number</th>
									<th>Doctor Speciality</th>
									<th>Doctor Room</th>
									<th>Created</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($doctors as $key=>$doctor)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td> <img width="100" src="{{ Storage::disk('public')->url('doctor/'.$doctor->doctor_image) }}" alt="doctor_image"></td>
									<td>{{ $doctor->doctor_name }}</td>
									<td>{{ $doctor->doctor_phone }}</td>
									<td>{{ $doctor->doctor_speciality }}</td>
									<td>{{ $doctor->doctor_room }}</td>
									<td>{{ $doctor->created_at->diffForHumans() }}</td>
									<td class="text-center">
										<a href="{{ route('admin.doctor.edit',$doctor->id) }}" class="btn btn-info waves-effect">
											Edit
										</a>
										<button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $doctor->id }})">
										Delete
										</button>
										<form id="delete-form-{{ $doctor->id }}" action="{{ route('admin.doctor.destroy',$doctor->id) }}" method="POST" style="display: none;">
											@csrf
											@method('DELETE')
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
@push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
function deleteTag(id) {
swal({
title: 'Are you sure?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!',
cancelButtonText: 'No, cancel!',
confirmButtonClass: 'btn btn-success',
da
buttonsStyling: false,
reverseButtons: true
}).then((result) => {
if (result.value) {
event.preventDefault();
document.getElementById('delete-form-'+id).submit();
} else if (
// Read more about handling dismissals
result.dismiss === swal.DismissReason.cancel
) {
swal(
'Cancelled',
'Your data is safe :)',
'error'
)
}
})
}
</script>
@endpush