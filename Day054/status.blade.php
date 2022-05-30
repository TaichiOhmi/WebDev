<div class="modal fade" id="spotmap-{{ $log->spot_id }}" aria-hidden="true" aria-labelledby="logMapToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logMapToggleLabel">{{ $log->spot->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="map"></div>
            @dump($log->spot->spot)
            <div class="visually-hidden" id="lat">{{ $log->spot->spot->getLat() }}</div>
            <div class="visually-hidden" id="lng">{{ $log->spot->spot->getLng() }}</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#user-{{ $log->user_id }}" data-bs-toggle="modal" data-bs-dismiss="modal">Angler Profile</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="user-{{ $log->user_id }}" aria-hidden="true" aria-labelledby="logUserToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center" id="logUserToggleLabel2">
            @if ($log->user->avatar)
                <img src="{{ asset('/storage/images/'.$log->user->avatar) }}" alt="{{ $log->user->avatar }}" class="img-fluid img-thumbnail rounded-circle mx-auto d-block" width="50" height="50" style="">
            @else
                <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon" style="font-size:50px;"></i>
            @endif
            <div class="ms-3">
                {{ $log->user->name }}
            </div>
            </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Tackles
        <hr>
            Best Spot
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" data-bs-target="#spotmap-{{ $log->spot_id }}" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="">Go Map</button>
        </div>
      </div>
    </div>
</div>
