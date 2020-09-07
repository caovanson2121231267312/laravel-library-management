<div class="modal fade" id="editAuthor" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header set-bg">
                <h3 class="card-title">{{ trans('message.edit_author') }}</h3>
                <button type="button" class="close white" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('authors.update', 'author') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" value="">
                    <div class="card-body"> 
                        <div class="form-group">
                            <label>{{ trans('message.name') }}</label>
                            <input 
                                type="text" 
                                class="form-control name {{ $errors->has('name') ? 'error' : '' }}" 
                                name="name"
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
                                class="form-control email {{ $errors->has('email') ? 'error' : '' }}" name="email"
                                required>
                                @if ($errors->has('email'))
                                    <span class="error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.description') }}</label>
                            <textarea class="form-control description" rows="3" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.avatar') }}</label>
                            <div class="custom-file">
                                <input 
                                    type="file" 
                                    class="custom-file-input" 
                                    id="inputGroupFile02"
                                    name="avatar">
                                <label class="custom-file-label"
                                    for="inputGroupFile02"></label>
                            </div>
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
