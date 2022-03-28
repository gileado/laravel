@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Support') }}</div>
                    <div class="card-body">
                        <form action="/" method="post">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text" id="name" name="customer_name" placeholder="Name"
                                    pattern=[A-Z\sa-z]{3,20} required>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input class="form-control" type="email" id="email" name="customer_email" placeholder="email@yahoo.com"
                                    required>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="reason">Reason for Contact</label>
                                <input class="form-control" type="text" id="reason" name="reason_title" required
                                    placeholder="Specify Reason here" pattern=[A-Za-z0-9\s]{8,60}>
                            </div>
                            
                            <br>
                            <div class="form-group">
                                <label for="message">Explain further issues</label>
                                <textarea class="form-control" id="message" name="customer_detailed_message" placeholder="Describe your reason in a detailed manner here." required></textarea>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
