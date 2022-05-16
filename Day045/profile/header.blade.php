<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <img src="#" alt="">
        @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon" style="font-size:150px;"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 d-inline">{{ $user->name }}</h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id == $user->id)
                    <a href="#">Edit</a>
                @else
                    <form action="#" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary fw-bold">Follow</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <strong>{{ $user->posts->count() }}</strong> Posts
            </div>
            <div class="col-auto">
                <a href="#" class="text-decoration-none text-dark">
                    <strong>0</strong> followers
                </a>
            </div>
            <div class="col-auto">
                <a href="#" class="text-decoration-none text-dark">
                    <strong>0</strong> following
                </a>
            </div>
        </div>
        <div class="row">
            <p class="fw-bold">
                {{ $user->introduction }}
            </p>
        </div>
    </div>
</div>
