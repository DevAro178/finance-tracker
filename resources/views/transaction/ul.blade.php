<ul class="list-group">
    @forelse ($transactions as $transaction)
        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
                <button
                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                        class="fas fa-arrow-down"></i></button>
                <div class="d-flex flex-column">
                    <a href="{{ route('single.transaction.show', ['id' => $transaction['id']]) }}"
                        class="mb-1 text-dark fw-bold text-sm">
                        {{ $transaction['name'] }}
                    </a>
                    <span class="text-xs">{{ $transaction['date'] }}, at
                        {{ date('h:i A', strtotime($transaction['created_at'])) }}</span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <p class="text-danger text-gradient text-sm font-weight-bold mb-0">- {{ $transaction['amount'] }} pkr
                </p>
                <div class="nav-item dropdown d-flex align-items-center ms-3">
                    <a href="javascript:;" class="nav-link text-secondary mb-0 p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md"
                                href="{{ route('edit.transaction', ['id' => $transaction['id']]) }}">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Edit</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <form action="{{ route('delete.transaction', ['id' => $transaction['id']]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item border-radius-md">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1 text-danger">
                                                <span class="font-weight-bold">Delete</span>
                                            </h6>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    @empty
        <div class="d-flex justify-content-center">
            <p class="text-xs font-weight-bold mb-0">No Transactions Today.</p>
        </div>
    @endforelse
</ul>
