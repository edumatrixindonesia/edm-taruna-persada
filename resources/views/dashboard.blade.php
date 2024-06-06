@extends('admin.layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex row">
                    <div class="col-sm-7 align-content-center">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Selamat Datang, Administrator! 🎉</h3>
                            <!-- <p class="mb-4 text-white">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p> -->
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->

        <!--/ Total Revenue -->

    </div>
    <div class="row">
        <!-- Order Statistics -->

        <!--/ Order Statistics -->

        <!-- Expense Overview -->

        <!--/ Expense Overview -->

        <!-- Transactions -->

        <!--/ Transactions -->
    </div>
</div>
@endsection