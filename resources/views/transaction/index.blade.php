<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0"/>
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-100">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                      <h4 class="font-weight-bolder">Add Transaction</h4>
                      <p class="mb-0">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('add.transaction.store')}}">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select form-control-lg" aria-label="Account" name="account_id">
                                <option selected>Select Account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{$account->id}}" {{ old('account') == $account->id ? 'selected' : '' }}>{{$account->name}}</option>
                                @endforeach
                            </select>
                          @error('account')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-control-lg" aria-label="Category" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach

                            </select>
                          @error('category')
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
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
</x-authlayout>
