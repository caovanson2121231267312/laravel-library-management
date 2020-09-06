<div class="modal fade" id="editUser" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header set-bg">
                <h3 class="card-title">{{ trans('message.edit_user') }}</h3>
                <button type="button" class="close white" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('users.update', 'user') }}">
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
                            <label>{{ trans('message.password') }}</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
    
                        <div class="form-group">
                            <label>{{ trans('message.phone_number') }}</label>
                            <input type="text" class="form-control phone" name="phone_number" required
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
