<x-layout>
    <x-bannerPrimary class="bg-primary" />
    <x-sidebar />
    <x-mainWrapper class="border-radius-lg">
        <x-navbar :pageName="'Settings'" />
        <x-container>

            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center">
                      <h6>Accounts</h6>
                      <a href="{{route('add.account')}}" class="btn btn-primary btn-sm ms-auto"><i class="fa fa-plus text-xs"></i> &nbsp;&nbsp;&nbsp;&nbsp;Add Account</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created On</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div>
                                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">John Michael</h6>
                                      <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td>
                                <td class="align-middle">
                                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div>
                                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">John Michael</h6>
                                      <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td>
                                <td class="align-middle">
                                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                  </a>
                                </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center">
                      <h6>Categories</h6>
                      <button class="btn btn-primary btn-sm ms-auto"><i class="fa fa-plus text-xs"></i> &nbsp;&nbsp;&nbsp;&nbsp;Add Category</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Spent</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="d-flex px-2">
                                  <div>
                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                  </div>
                                  <div class="my-auto">
                                    <h6 class="mb-0 text-sm">Spotify</h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-sm font-weight-bold mb-0">$2,500</p>
                              </td>
                              <td class="align-middle text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                  <span class="me-2 text-xs font-weight-bold">60%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="align-middle">
                                <button class="btn btn-link text-secondary mb-0">
                                  <i class="fa fa-pencil text-xs"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="d-flex px-2">
                                  <div>
                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                  </div>
                                  <div class="my-auto">
                                    <h6 class="mb-0 text-sm">Spotify</h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-sm font-weight-bold mb-0">$2,500</p>
                              </td>
                              <td class="align-middle text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                  <span class="me-2 text-xs font-weight-bold">60%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="align-middle">
                                <button class="btn btn-link text-secondary mb-0">
                                  <i class="fa fa-pencil text-xs"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="d-flex px-2">
                                  <div>
                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                  </div>
                                  <div class="my-auto">
                                    <h6 class="mb-0 text-sm">Spotify</h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-sm font-weight-bold mb-0">$2,500</p>
                              </td>
                              <td class="align-middle text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                  <span class="me-2 text-xs font-weight-bold">60%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="align-middle">
                                <button class="btn btn-link text-secondary mb-0">
                                  <i class="fa fa-pencil text-xs"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
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