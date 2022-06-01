<!-- Modal -->
<div class="modal fade" id="getCurrentLocation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="">lat: <span id="lat"></span></li>
                            <li class="">lng: <span id="lng"></span></li>
                        </ul>
                    </div>
                    <div class="col">
                        <button class="btn btn-info btn-lg currentBtn" onclick="getCurrentLocation()">Get Current Location</button>
                    </div>
                </div>
                <div id="map" style="height:500px"></div>
            </div>
        </div>
    </div>
</div>
