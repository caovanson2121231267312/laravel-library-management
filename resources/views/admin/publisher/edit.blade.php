<div class="modal fade" id="editPublisher" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header set-bg">
                <h3 class="card-title">{{ trans('message.edit_publisher') }}</h3>
                <button type="button" class="close white" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('publishers.update', 'publisher') }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" value="">
                    <div class="card-body"> 
                        <div class="form-group">
                            <label>{{ trans('message.name') }}</label>
                            <input type="text" class="form-control name" name="name" required
                                placeholder="{{ trans('message.input_name_of_user') }}">
                        </div>
    
                        <div class="form-group">
                            <label>{{ trans('message.email') }}</label>
                            <input type="email" class="form-control email" name="email" required
                                placeholder="{{ trans('message.input_email_of_user') }}">
                        </div>
    
                        <div class="form-group">
                            <label>{{ trans('message.address') }}</label>
                            <input type="text" class="form-control address" name="address" required
                                placeholder="{{ trans('message.input_phone_number_of_user') }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('message.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
