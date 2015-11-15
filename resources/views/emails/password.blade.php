@extends('emails._layout')

@section('title')
    Reset Your Password
@endsection

@section('content')
    <table>
        <tr>
            <td>
                <h1>Reset Your Password</h1>
                <p>Click here to reset your password:</p>
                <!-- button -->
                <table class="btn-primary" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <a href='{{ url("auth/password/reset/{$token}") }}'>Reset Password</a>
                        </td>
                    </tr>
                </table>
                <!-- /button -->
                <p>If you haven't requested password reset, please ignore this email.</p>
                <p>Thanks, have a lovely day.</p>
                <p><a href="http://twitter.com/">Follow @CleanSlate on Twitter</a></p>
            </td>
        </tr>
    </table>
@endsection