
@extends('backend.app')

@section('title', 'Skill')

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
                                <h4>Skill List</h4>
                                <div class="box_right d-flex lms_block">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Skill
                                      </button>
                                </div>

                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                            // $classes = ['btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-primary', 'btn-secondary'];
                                        @endphp
                                        @foreach ($Skills as $skill)
                                        <tr>
                                            <th class="fw-bold" style="color: #757575;">{{$sl++}}</th>
                                            <td scope="row"> <a href="#" class="question_content fw-bold" style="color: #757575;">{{ Str::upper($skill->name) }}</a></td>


                                            <td><a href="#" class="status_btn" style="{{ $skill->status == '1' ? 'background: #05d34e;' : 'background: #000;' }}">{{ $skill->status == '1' ? 'Active' : 'Deactive' }}</a></td>
                                            <td>
                                                {{-- Update button --}}
                                                <a href="#" class="edit-button" data-id="{{ $skill->id }}" data-title="{{ $skill->title }}" data-status="{{ $skill->status }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>

                                                {{-- Delete button --}}
                                                <form id="delete-form-{{ $skill->id }}" action="{{ route('skill.destroy', $skill->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete(event, 'delete-form-{{ $skill->id }}')" style="background:none;border:none;color:red;cursor:pointer;">
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
        <form action="{{ route('skill.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSportModalLabel">Add New Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Skill Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
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

@endsection

@push('script')
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


