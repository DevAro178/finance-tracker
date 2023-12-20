<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0" />
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">{{ $transaction->name }}</h4>
                                </div>
                                <div class="card-body container">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Account
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-xs font-weight-bold mb-0">{{ $transaction->account->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">
                                                Category
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-xs font-weight-bold mb-0">{{ $transaction->category->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Amount
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-xs font-weight-bold mb-0">{{ $transaction->amount }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Note
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-xs font-weight-bold mb-0">{{ $transaction->note }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col d-flex justify-content-center">
                                            <a href="{{ route('edit.transaction', ['id' => $transaction->id]) }}"
                                                class="btn btn-sm mb-0 me-1 btn-primary"><i class="fa fa-pencil text-xs"
                                                    aria-hidden="true"></i>
                                                &nbsp;&nbsp;Edit</a>
                                        </div>
                                        <div class="col d-flex justify-content-center">
                                            <a href="{{ route('delete.transaction', ['id' => $transaction->id]) }}"
                                                class="btn btn-sm mb-0 me-1 btn-danger"><i class="fa fa-trash text-xs"
                                                    aria-hidden="true"></i>
                                                &nbsp;&nbsp;Delete</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-authlayout>
