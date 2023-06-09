@extends('admin.layouts.master')
@section('tittle')
{{ $tittle }}
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xl-6">
                <h1>{{$tittle}}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('departments.index')}}">Department</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{session('success')}}
            {{session()->forget('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            {{session('warning')}}
            {{session()->forget('warning')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            {{session('failed')}}
            {{session()->forget('warning')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <section class="section dashboard">
            <div class="col-xxl-4 col-md-12">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="col-xl-6">
                                    <h5 class="card-title">Admin Pages <span> | {{$tittle}}
                                        </span>
                                    </h5>
                                </div>
                                <div class="input-group d-flex justify-content-end">
                                    <a class="btn btn-secondary" style="width:40px; height:40px" href="{{route('departments.create')}}">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Total Member</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($departments as $key => $department)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $department->code }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            {{ $department->users->count() }}
                                            <button type="button" class="btn btn-outline-success" style="border: none;" data-bs-toggle="modal" data-bs-target="#listUserModal{{ $department->id }}">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </td>
                                        <td style="width: 176px;">
                                            <a class="btn btn-outline-info department_list_btn" href="{{route('departments.show',$department->id)}}">
                                                <i class="bi bi-person-vcard"></i>
                                            </a>
                                            <a class="btn btn-outline-success department_list_btn" href="{{route('departments.edit',$department->id)}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger department_list_btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $department->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <form action="{{route('departments.destroy',$department->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade" id="deleteModal{{ $department->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                            Confirm Delete
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete the department with the name is
                                                        <b>{{ $department->name }}</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger w-100px">Remove</button>
                                                        <button type="button" class="btn btn-secondary w-100px" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal fade" id="listUserModal{{ $department->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">
                                                        List User
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($department->users->count()>0)
                                                    <div class="d-flex justify-content-end">
                                                        <a type="button" class="btn btn-outline-info" href="{{route('departments.users',$department->id)}}">List
                                                            Detail</a>
                                                    </div>
                                                    @endif

                                                    <div class="table1">
                                                        <div class="table1-row table1-header">
                                                            <div class="table1-cell">STT</div>
                                                            <div class="table1-cell">Code</div>
                                                            <div class="table1-cell">Fullname</div>
                                                            <div class="table1-cell">Email</div>
                                                        </div>
                                                        @forelse ($department->users as $key => $user)
                                                        <div class="table1-row">
                                                            <div class="table1-cell">{{++$key}}</div>
                                                            <div class="table1-cell">{{$user->code}}</div>
                                                            <div class="table1-cell">{{$user->fullname}}</div>
                                                            <div class="table1-cell">{{$user->email}}</div>
                                                        </div>
                                                        @empty
                                                        <div class="table1-row">
                                                            <div class="table1-row">Don't have member in
                                                                {{$department->name}}
                                                            </div>
                                                        </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary w-100px" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr></tr>
                                    <tr>
                                        <td class="row">No relevant data available for the conditions</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection
