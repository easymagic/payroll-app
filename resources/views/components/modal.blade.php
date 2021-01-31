<form method="post" action="{{ $action }}" enctype="multipart/form-data">
@csrf

<div id="{{ $modal_id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $modal_header }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @yield('modal-body')
            </div>
            <div class="modal-footer">
                @yield('modal-footer')
            </div>
        </div>

    </div>
</div>
</form>