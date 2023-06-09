@extends('user.layout.master')
@section('tittle')
{{ $tittle }}
@endsection
@section('content')
<main id="main" class="main" style="margin-left: 0px; min-height:95vh;">
    <div class="list-apoint-user">
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
        <section class="section profile">
            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <h2>Hello, {{ $user->fullname }} </h2>
                            <button type="button" class="btn btn-light mb-2" data-bs-toggle="modal"
                                data-bs-target="#modalListCoupon">
                                My coupons <span
                                    class="badge bg-secondary text-light">{{$user->coupons->count()}}</span>
                            </button>
                            <!-- Modal list coupons -->
                            <div class="modal fade" id="modalListCoupon">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style='font-weight: bold;'>My coupons </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body" style="max-height: 90vh;overflow: auto;">
                                                @if($user->coupons->count()>0)
                                                <div class="table1">
                                                    <div class="table1-row table1-header">
                                                        <div class="table1-cell">#</div>
                                                        <div class="table1-cell">Name</div>
                                                        <div class="table1-cell">Price</div>
                                                        <div class="table1-cell">Time Expired</div>
                                                        <div class="table1-cell">Status</div>

                                                    </div>
                                                    @foreach ($user->coupons as $key => $coupon)
                                                    <div class="table1-row">
                                                        <div class="table1-cell">{{++$key}}</div>
                                                        <div class="table1-cell">{{$coupon->name}}</div>
                                                        <div class="table1-cell">{{$coupon->price}}</div>
                                                        <div class="table1-cell">
                                                            {{date('d/m/Y', strtotime($coupon->pivot->timeExpiredAt))}}
                                                        </div>
                                                        <div class="table1-cell">
                                                            @if($coupon->pivot->status)
                                                            <span class="badge rounded-pill bg-success">true</span>
                                                            @else
                                                            <span class="badge rounded-pill bg-warning">true</span>

                                                            @endif

                                                        </div>

                                                    </div>
                                                    @endforeach
                                                </div>
                                                @else
                                                <div class="table1-row">
                                                    <div class="table1-row">Don't have any apointment registed.
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="user_detail-tittle">My Packages</h5>
                                    @forelse($packages as $key=>$package)
                                    <div class="row row1">
                                        <div class="col-lg-1 col-md-2 label col1">{{++$key}}</div>
                                        <div class="col-lg-9 col-md-8 col2">
                                            <p style="font-weight: bold;">{{$package->name}}
                                            <p>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col3"><a type="button" class="btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDialogScrollable{{ $package->id }}">
                                                <i class="bi bi-person-vcard"></i>
                                            </a></div>
                                        <!-- Modal detail package -->
                                        <div class="modal fade" id="modalDialogScrollable{{ $package->id }}">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style='font-weight: bold;'>Detail
                                                            Package</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body" style="max-height: 90vh;overflow: auto;">
                                                            <div class="tab-content">
                                                                <div class="tab-pane fade show active profile-overview"
                                                                    id="profile-overview">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label "
                                                                            style='font-weight: bold;'>Name
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{$package['name']}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label"
                                                                            style='font-weight: bold;'>
                                                                            Code
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{$package['code']}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label"
                                                                            style='font-weight: bold;'>
                                                                            Price
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{($package['price'])}} đồng
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label"
                                                                            style='font-weight: bold;'>
                                                                            Type
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{$package['types']}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label"
                                                                            style='font-weight: bold;'>
                                                                            Status
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{$package['status']}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 label"
                                                                            style='font-weight: bold;'>
                                                                            Description</div>
                                                                        <div class="col-lg-8 col-md-8 text_justify">
                                                                            {{$package['description']}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="row">
                                        <div class="col-lg-9 col-md-8">Don't have package registration
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="detail_update-btn">
                            <a type="button" href="{{route('user.dashboard')}}" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="user_detail-tittle">My list apointments</h5>
                                    <div class="d-flex align-items-center">
                                        <table class="table table-striped">
                                            @if(count($apointments)>0)
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($apointments as $key => $apointment)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td> {{($apointment->time)}} </td>
                                                    <td> {{$apointment->status}} </td>
                                                    @if(date_create_from_format('H:i d/m/Y', $apointment->time) >
                                                    now()) <td> <a id="update-status" href="" data-bs-toggle="modal"
                                                            data-bs-target="#modalUpdateApointment{{ $apointment->id }}"
                                                            style="color:#0d6efd"><i class="ri-mark-pen-line"></i></a>
                                                    </td>
                                                    @else
                                                    <td></td>
                                                    @endif

                                                    <!-- Modal update apointment -->
                                                    <div class="modal fade"
                                                        id="modalUpdateApointment{{ $apointment->id }}">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style='font-weight: bold;'>
                                                                        Change status apointment</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <div class="tab-content">
                                                                            <form method="POST"
                                                                                action="{{route('user.setValueStatus')}}">
                                                                                @csrf
                                                                                @METHOD('PATCH')
                                                                                <section class="section dashboard">
                                                                                    <div class="col-xxl-4 col-md-12">
                                                                                        <div class="card info-card">
                                                                                            <div class="card-body">
                                                                                                <input type="hidden"
                                                                                                    name="id"
                                                                                                    value="{{$apointment->id}}">
                                                                                                <div class="row mb-3">
                                                                                                    <label
                                                                                                        for="inputText"
                                                                                                        class="col-sm-4 col-form-label">Code</label>
                                                                                                    <div
                                                                                                        class="col-sm-8">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="code"
                                                                                                            value="{{old('code')?old('code'):$apointment->code }}"
                                                                                                            readonly>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row mb-3">
                                                                                                    <label
                                                                                                        for="inputText"
                                                                                                        class="col-sm-4 col-form-label">Time</label>
                                                                                                    <div
                                                                                                        class="col-sm-8">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control"
                                                                                                            name="time"
                                                                                                            value="{{date('d-m-Y', strtotime(str_replace('/', '-', $apointment->time)))}}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row mb-3">
                                                                                                    <label
                                                                                                        for="inputText"
                                                                                                        class="col-sm-4 col-form-label">Status</label>
                                                                                                    <div
                                                                                                        class="col-sm-8">
                                                                                                        <select
                                                                                                            class="form-select"
                                                                                                            name="status">
                                                                                                            <option
                                                                                                                value="Confirmed"
                                                                                                                @if($apointment->
                                                                                                                status
                                                                                                                ==
                                                                                                                'Confirmed')
                                                                                                                selected
                                                                                                                @endif>Confirmed
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Cancelled"
                                                                                                                @if($apointment->
                                                                                                                status
                                                                                                                ==
                                                                                                                'Cancelled')
                                                                                                                selected
                                                                                                                @endif>Cancelled
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        @error('status')
                                                                                                        <div
                                                                                                            class="invalidate">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                        <script>
                                                                                                        window
                                                                                                            .onload =
                                                                                                            function() {
                                                                                                                document
                                                                                                                    .getElementById(
                                                                                                                        'update-status'
                                                                                                                    )
                                                                                                                    .click();
                                                                                                            }
                                                                                                        </script>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row mb-3">
                                                                                                    <label
                                                                                                        for="inputText"
                                                                                                        class="col-sm-4 col-form-label">Message</label>
                                                                                                    <div
                                                                                                        class="col-sm-8">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="message"
                                                                                                            value="{{old('message')?old('message'):$apointment->message }}">
                                                                                                        @error('message')
                                                                                                        <div
                                                                                                            class="invalidate">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                        <script>
                                                                                                        window
                                                                                                            .onload =
                                                                                                            function() {
                                                                                                                document
                                                                                                                    .getElementById(
                                                                                                                        'update-status'
                                                                                                                    )
                                                                                                                    .click();
                                                                                                            }
                                                                                                        </script>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                @endforeach
                                                @else
                                                <td class="row">Dont have any apointment registration</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class=" d-flex justify-content-end">
                                            {{ $apointments->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
