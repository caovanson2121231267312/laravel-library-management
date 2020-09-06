<div class="modal fade" id="addPublisher" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header set-bg">
                <h3 class="card-title">{{ trans('message.add_publisher') }}</h3>
                <button type="button" class="close white" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('publishers.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ trans('message.name') }}</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('name') ? 'error' : '' }}" 
                            name="name" required
                            placeholder="{{ trans('message.input_name_of_user') }}"
                            required>
                        @if ($errors->has('name'))
                            <span class="error">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>{{ trans('message.email') }}</label>
                        <input 
                            type="email" 
                            class="form-control {{ $errors->has('email') ? 'error' : '' }}" 
                            name="email"
                            placeholder="{{ trans('message.input_email_of_publisher') }}"
                            required>
                        @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>{{ trans('message.address') }}</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address"
                            placeholder="{{ trans('message.input_address_of_publisher') }}"
                            required>
                        @if ($errors->has('address'))
                            <span class="error">
                                {{ $errors->first('address') }}
                            </span>
                        @endif
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
