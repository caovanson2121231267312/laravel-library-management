<div class="modal fade" id="requestForm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header contact-form">
                <button type="button" class="close white" data-dismiss="modal">&times;</button>
            </div>

            <div class="col-md-12 contact-form test text-center">
                    <h4 class="white-w3ls">{{ trans('request.borrow_books_form') }}</h4>
        
                    <form action="{{ route('requests.store') }}" method="post">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="name" value="{{ $user->name }}" disabled>
                            <label class="top-label">{{ trans('login.name') }}</label>
                            <span></span>
                        </div>

                        <div class="styled-input">
                            <input type="text" name="email" value="{{ $user->email }}" disabled>
                            <label class="top-label">{{ trans('login.email') }}</label>
                            <span></span>
                        </div>

                        <div class="styled-input">
                            <input type="text" name="phone_number" value="{{ $user->phone_number }}" disabled>
                            <label class="top-label">{{ trans('login.phone_number') }}</label>
                            <span></span>
                        </div>

                        <div class="styled-input number_of_borrow_books">
                        </div>

                        <div class="styled-input">
                            <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask name="borrowed_at" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}">
                            <label class="top-label">{{ trans('request.borrow_at') }}</label>
                            <span></span>
                        </div>

                        <div class="styled-input">
                            <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask name="returned_at" value="{{ \Carbon\Carbon::now()->addDays(config('request.date'))->format('m/d/Y') }}">
                            <label class="top-label">{{ trans('request.return_at') }}</label>
                            <span></span>
                        </div>

                        <div class="styled-input display-none">
                        </div>

                        <input type="submit" id="send" value="SEND">
                    </form>
                </div>
        </div>
    </div>
</div>
