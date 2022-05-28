<!-- Modal -->
<div class="modal fade" id="getCurrentLocation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col">
                        <ul class="list-group">
                            <li class="list-group-item">lat: <span id="lat"></span></li>
                            <li class="list-group-item">lng: <span id="lng"></span></li>
                        </ul>
                    </div>
                    <div class="col">
                        <button class="btn btn-info currentBtn" onclick="getCurrentLocation()">Get Current Location</button>
                    </div>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="map" style="height:500px"></div>
            </div>
        </div>
    </div>
</div>
