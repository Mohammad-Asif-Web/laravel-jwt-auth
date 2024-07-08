
@extends('backend.app')

@section('title', 'Sports List')

@push('style')

@endpush

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="d-flex justify-content-between pt-3">
                                <h4>Sport List</h4>
                                <div class="box_right d-flex lms_block">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Sport
                                      </button>
                                </div>

                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                            $classes = ['btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-primary', 'btn-secondary'];
                                        @endphp
                                        @foreach ($sports as $sport)
                                        <tr>
                                            <th class="fw-bold" style="color: #757575;">{{$sl++}}</th>
                                            <td scope="row"> <a href="#" class="question_content fw-bold" style="color: #757575;">{{ Str::upper($sport->title) }}</a></td>
                                            <td>
                                                @foreach ( $sport->positions as $position )
                                                {{-- <a style="color: #fff;border-radius: 10px;padding: 5px;background-color: #884ffb; margin-right: 3px;">
                                                    {{$position->name}}
                                                </a> --}}
                                                <a href="javascript:void(0)" class="btn btn-sm {{$classes[rand(0,5)]}} mb-1">{{$position->name}}</a>
                                                @endforeach
                                            </td>
                                            <td><img src="{{ asset($sport->image) }}" style="width: 70px; height: 70px;"></td>
                                            <td><a href="#" class="status_btn" style="{{ $sport->status == '1' ? 'background: #05d34e;' : 'background: #000;' }}">{{ $sport->status == '1' ? 'Active' : 'Deactive' }}</a></td>
                                            <td>
                                                {{-- Update button --}}
                                                <a href="#" class="edit-button" data-id="{{ $sport->id }}" data-title="{{ $sport->title }}" data-status="{{ $sport->status }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>

                                                {{-- Delete button --}}
                                                <form id="delete-form-{{ $sport->id }}" action="{{ route('sport.destroy', $sport->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete(event, 'delete-form-{{ $sport->id }}')" style="background:none;border:none;color:red;cursor:pointer;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
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
            <div class="col-12">
                {{$errors}}
            </div>
        </div>
    </div>
</div>

<!-- Add New Sport Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="addSportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('sport.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSportModalLabel">Add New Sport</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Sport Name</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Sport Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Position Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="offense">Offense</option>
                            <option value="defense">Defense</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="positions" class="form-label">Positions</label>
                        <div id="positions-container">
                            <div class="input-group mb-2">
                                <input type="text" name="positions[]" class="form-control" placeholder="Position Name" required>
                                <button type="button" class="btn btn-success add-position">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editSportModal" tabindex="-1" aria-labelledby="editSportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editSportForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSportModalLabel">Edit Sport</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Sport Name</label>
                        <input type="text" class="form-control" id="editTitle" name="title" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">De-active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Sport Image</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('script')
{{-- add new sport with positions --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.add-position').addEventListener('click', function() {
            const positionContainer = document.getElementById('positions-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group', 'mb-2');
            newInputGroup.innerHTML = `
                <input type="text" name="positions[]" class="form-control" placeholder="Position Name" required>
                <button type="button" class="btn btn-danger remove-position"><i class="fa fa-minus"></i></button>
            `;
            positionContainer.appendChild(newInputGroup);
        });

        document.getElementById('positions-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-position')) {
                event.target.closest('.input-group').remove();
            }
        });
    });
</script>

{{-- update the sports with modal --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {

                const DOMAIN = window.location.origin;
                console.log(DOMAIN);

                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const status = this.getAttribute('data-status');

                const modal = new bootstrap.Modal(document.getElementById('editSportModal'));
                document.getElementById('editSportForm').setAttribute('action', `${DOMAIN}/dashboard/sport/${id}`);
                document.getElementById('editTitle').value = title;
                document.getElementById('editStatus').value = status;

                modal.show();
            });
        });
    });
</script>

<!-- Delete Button with SweetAlert Confirmation -->
<script>
    function confirmDelete(event, formId) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        })
    }
</script>
@endpush
