<div>Hello {{$name}}</div>
<div>Click on link below to reset password</div>

<a href="{{route('getReset' , [$id, $token])}}">Reset Password</a>