@if ($suggestions)

    <p class="fw-bold text-secondary">
        Suggestions for you
    </p>
    @foreach ($suggestions as $user)
        <div class="row align-items-center mb-3">
            <div class="col-auto">
                <a href="#">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/images/'.$user->avatar) }}" alt="avatar image" class="rounded-circle" style="height: 3.5rem;width: 3.5rem;">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary" style="font-size: 3.5rem"></i>
                    @endif
                </a>
            </div>
            <div class="col ps-0 text-truncate">
                <a href="#" class="text-decoration-none text-dark fw-bold small">{{ $user->name }}</a>
            </div>
            <div class="col-auto">
                <form action="{{ route('follow.store', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm border-0 bg-transparent p-0 text-primary">Follow</button>
                </form>
            </div>
        </div>
    @endforeach


    {{-- @isset($suggestions)
        <div class="row mt-5">
            Suggestions for you
            <ul class="list-unstyled">
            @foreach ($suggestions as $suggestion)
                <li class="mt-2 d-flex">
                    <a href="{{ route('profile.show', $suggestion->id) }}" class="text-decoration-none me-2">
                        @if ($suggestion->avatar)
                            <img src="{{ asset('/storage/images/'.$suggestion->avatar) }}" alt="{{ $suggestion->avatar }}" class="img-fluid rounded-circle" width="50" height="50" style="width: 3.5rem; height:3.5rem;">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center" style="font-size:3.5rem;"></i>
                        @endif
                    </a>
                    <a href="{{ route('profile.show', $suggestion->id) }}" class="text-decoration-none text-dark me-auto my-auto text-truncate" style="width:10rem;">
                        {{ $suggestion->name }}
                    </a>
                    <form action="{{ route('follow.store', $suggestion->id) }}" method="post" class="ms-auto my-auto">
                        @csrf
                        <button type="submit" class="btn btn-sm border-0 bg-transparent p-0 text-primary">
                            Follow
                        </button>
                    </form>
                </li>
            @endforeach
            </ul>
        </div>
    @endisset --}}



@endif
