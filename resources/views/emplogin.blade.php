<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form { margin: auto;
width: 510px;
border: 1px solid #dee2e6!important;
margin-top: 50px;
background-color:#f6f6f6;
border-radius: 5px;

}

input[type=text], input[type=password] {
width: 450px;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
border-radius: 5px;
font-family: serif;
font-size: 20px;

}
button {
background-color:#33b5e5;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 450px;
border-radius: 5px;
font-family: serif;
font-size: 20px;
}

button:hover {
opacity: 0.4;
background-color: #33b5e5;

}
.container {
padding: 28px;
width: 500px;
margin-top: -35px;
}

a:-webkit-any-link {
color:#33b5e5;
}

label {
cursor: default;
font-family: serif;
font-size: 20px;
}
h2
{
text-align: center;
font-family: serif;
}
span.psw {
float: right;
padding-top: 2px;
color: #33b5e5;
margin-right: 48px;
font-family:serif;


}

/ Change styles for span and cancel button on extra small screens /
@media screen and (max-width: 300px) {
span.psw {
display: block;
float: none;
color: #33b5e5;

}
.cancelbtn {
width: 100%;
}

</style>
</head>
<body>


<div class="border">
<form  method="POST" action="{{ route('login') }}">
  @csrf
  <h2>Sign in</h2>
  <div class="container">
     @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
      
    <div for="uname"><label><b>Username</b></label>
    <input type="text" placeholder="Enter Email" value="{{ old('email') }}" name="email" autofocus="autofocus"  class="@error('email') is-invalid @enderror" id="email"required>
      @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div for="psw"><label><b>Password</b></label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
        @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    <button type="submit" class="signbtn">Sign in</button><br>
   

  
  
    <span class="psw" style="color: #33b5e5;">Forgot  <a href="{{ route('EmpUpdatePass') }}">password?</a></span>
  </div>
</form>
</div>
</body>
</html>
