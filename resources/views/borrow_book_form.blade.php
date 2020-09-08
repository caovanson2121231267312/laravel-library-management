<div class="modal fade" id="borrowBookForm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-12 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign text-center">{{ trans('request.selected_books') }}</h3>
					<div class="list-group list-group-alternate listBooks"> 
                    </div>
                    @if (Auth::check())
                        <div class="text-center">
                            <a href="{{ route('user.index', Auth::id()) }}">
                                <button class="btn btn-primary">{{ trans('request.go_to_request') }}</button>
                            </a>
                        </div>
                    @endif
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
