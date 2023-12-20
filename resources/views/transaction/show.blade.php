<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0" />
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container mt-8">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 mt-4">
                            <div class="card h-100 mb-4">
                                <div class="card-header pb-0 px-3">
                                    <div class="row">
                                        <h4 class="font-weight-bolder">All Transactions</h4>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <p class="mb-0">Select Month to see transactions</p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" id="dateSelector" class="form-control form-control-lg"
                                                name="date" placeholder="date" aria-label="date">
                                        </div>
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        @include('transaction.ul', ['transactions' => $transactions])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#dateSelector').change(function() {
                        $.get('/transaction/filter/' + $(this).val(), function(data) {
                            $('.card-body').html(data);
                        });
                    });
                </script>
        </section>
    </main>
</x-authlayout>
