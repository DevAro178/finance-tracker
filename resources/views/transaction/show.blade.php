<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0"/>
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-100">
            <div class="container mt-8">
              <div class="row d-flex justify-content-center">
                {{-- <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                      <h4 class="font-weight-bolder">Add Transaction</h4>
                      <p class="mb-0">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('add.transaction.store')}}">
                        @csrf

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Title" aria-label="Title" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <input type="date" class="form-control form-control-lg" name="date" placeholder="date" aria-label="date" value="{{old('date')}}">
                          @error('date')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="amount" placeholder="Amount" aria-label="Amount" value="{{old('amount')}}">
                          @error('amount')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control form-control-lg" name="note" placeholder="Note" aria-label="Note">{{old('note')}}</textarea>
                          @error('note')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>


                        <div class="text-center">
                          <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Add Transaction</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> --}}
            <div class="col-md-6 mt-4">
                <div class="card h-100 mb-4">
                  <div class="card-header pb-0 px-3">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="mb-0">This Month's Transaction's</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                      @forelse ($transactions as $transaction)
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                              <div class="d-flex align-items-center">
                              <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                              <div class="d-flex flex-column">
                                  <h6 class="mb-1 text-dark text-sm">{{$transaction['name']}}</h6>
                                  <span class="text-xs">{{$transaction['date']}}, at {{ date('h:i A', strtotime($transaction['created_at'])) }}</span>
                              </div>
                              </div>
                              <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                              - {{$transaction['amount']}} pkr
                              </div>
                          </li>
                      @empty
                          <div class="d-flex justify-content-center"><p class="text-xs font-weight-bold mb-0">No Transactions Today.</p></div>
                      @endforelse
                    </ul>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </section>
      </main>
</x-authlayout>
