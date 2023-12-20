<x-layout>
    <x-bannerPrimary class="bg-primary" />
    <x-sidebar />
    <x-mainWrapper class="border-radius-lg">
        <x-navbar :pageName="'Dashboard'" />
        <x-container>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-4 mb-xl-0 mb-4">
                            <div class="card bg-transparent shadow-xl">
                                <div class="overflow-hidden position-relative border-radius-xl"
                                    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="card-body position-relative z-index-1 p-3">
                                        <i class="fas fa-wifi text-white p-2"></i>
                                        <h5 class="text-white mt-4 mb-5 pb-2">
                                            4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                                    <h6 class="text-white mb-0">{{ auth()->user()->name }}</h6>
                                                </div>
                                                <div>
                                                    <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                    <h6 class="text-white mb-0">{{ date('m/y', strtotime('+5 year')) }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                                <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png"
                                                    alt="logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="row">
                                @foreach ($accounts as $account)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div
                                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fas fa-landmark opacity-10"></i>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">{{ $account->name }}</h6>
                                                <span class="text-xs">{{ $account->type }}</span>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0">{{ $account->balance }} pkr</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- <div class="col-md-4 mt-md-0 mt-4">
                      <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fab fa-paypal opacity-10"></i>
                          </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                          <h6 class="text-center mb-0">Paypal</h6>
                          <span class="text-xs">Freelance Payment</span>
                          <hr class="horizontal dark my-3">
                          <h5 class="mb-0">$455.00</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                      <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fab fa-paypal opacity-10"></i>
                          </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                          <h6 class="text-center mb-0">Paypal</h6>
                          <span class="text-xs">Freelance Payment</span>
                          <hr class="horizontal dark my-3">
                          <h5 class="mb-0">$455.00</h5>
                        </div>
                      </div>
                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Your Transaction's</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('transaction') }}"
                                        class="btn btn-outline-primary btn-sm mb-0">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                            @include('transaction.ul', ['transactions' => $today_transactions])
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                            @include('transaction.ul', ['transactions' => $yesterday_transactions])
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Invoices</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <ul class="list-group">
                                <div class="d-flex justify-content-center">
                                    <p class="text-xs font-weight-bold mb-0">No Invoices Yet.</p>
                                </div>
                                {{-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                        <span class="text-xs">#MS-415646</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        $180
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                      </div>
                    </li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <x-footer />
        </x-container>
    </x-mainWrapper>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>

</x-layout>
