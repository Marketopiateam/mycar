@extends('layouts.front-end.app')

@section('title', translate('account-delete'))

@section('content')
<div class="container for-container rtl">
    <h2 class="text-center mt-3 headerTitle">{{ translate('type_your_credincials')}}</h2>
    <div class="for-padding text-justify">
        <form action="{{route('del-acc-act')}}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label font-semibold">
                    {{ translate('email') }} / {{ translate('phone')}}
                </label>
                <input class="form-control text-align-direction" type="text" name="user_id" id="si-email"
                        value="{{old('user_id')}}" placeholder="{{ translate('enter_email_address_or_phone_number') }}"
                        required>
                <div class="invalid-feedback">{{ translate('please_provide_valid_email_or_phone_number') }} .</div>
            </div>
            <div class="form-group">
                <label class="form-label font-semibold">{{ translate('password') }}</label>
                <div class="password-toggle rtl">
                    <input class="form-control text-align-direction" name="password" type="password" id="si-password" placeholder="{{ translate('password_must_be_7+_Character')}}" required>
                    <label class="password-toggle-btn">
                        <input class="custom-control-input" type="checkbox">
                            <i class="tio-hidden password-toggle-indicator"></i>
                            <span class="sr-only">{{ translate('show_password') }}</span>
                    </label>
                </div>
            </div>
            @php($recaptcha = getWebConfig(name: 'recaptcha'))
            @if(isset($recaptcha) && $recaptcha['status'] == 1)
                <div id="recaptcha_element" class="w-100" data-type="image"></div>
                <br/>
            @else
                <div class="row py-2">
                    <div class="col-6 pr-2">
                        <input type="text" class="form-control border __h-40" name="default_recaptcha_id_customer_login" value=""
                            placeholder="{{ translate('enter_captcha_value') }}" autocomplete="off">
                    </div>
                    <div class="col-6 input-icons mb-2 w-100 rounded bg-white">
                        <a href="javascript:" class="d-flex align-items-center align-items-center get-login-recaptcha-verify" data-link="{{ URL('/customer/auth/code/captcha') }}">
                            <img src="{{ URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_login') }}" class="input-field rounded __h-40" id="customer_login_recaptcha_id" alt="">
                            <i class="tio-refresh icon cursor-pointer p-2"></i>
                        </a>
                    </div>
                </div>
            @endif
            <button class="btn btn--primary btn-block btn-shadow" type="submit">{{ translate('delete-account') }}</button>
        </form>
    </div>
</div>
@endsection