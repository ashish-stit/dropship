<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {    margin: auto;
    width: 510px;
    border: 1px solid #dee2e6!important;
    margin-top: 50px;

}

input[type=text], input[type=password] {
  width: 450px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 5px;
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
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #33b5e5;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

.container {
  padding: 16px;
  width: 500px;
 
}

h2
{
  text-align: center;
}
span.psw {
  float: right;
  padding-top: 16px;
  color: #33b5e5;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
     color: #33b5e5;
     
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<div class="border">
<form  method="POST" action="{{ route('login') }}">
  <h2>Sign in</h2>
  <div class="container">
      @csrf
    <div for="uname"><b>Username</b>
    <input type="text" placeholder="Enter Email" value="{{ old('email') }}" name="email" autofocus="autofocus"  class="@error('email') is-invalid @enderror" id="email"required>
      @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div for="psw"><b>Password</b>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
        @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    <button type="submit">Sign in</button><br>
   </div>

  <div class="container" style="background-color:#33b5e51; width: 450px; margin-top: -20px;">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw" style="color: #33b5e5;">Forgot<a href="#">password?</a></span>
  </div>
</form>
</div>
</body>
</html>
