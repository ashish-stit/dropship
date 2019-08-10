<style>
.form-gap {
    padding-top: 20px;
    margin: auto;
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


.container {
padding: 28px;
width: 500px;
margin-top: -35px;
}

h2
{
text-align: center;
font-family: serif;
}

p{
  text-align: center;
font-family: serif;
}

.btn-block{

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


</style>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
 <div class="form-gap">
   <div class="container">
   
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h2>Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  
                  <div class="panel-body">
    
                    <form class="needs-validation signup_form" method="POST" action="{{ route('password.emp') }}" novalidate>
                       @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="name"  value="{{ old('email') }}" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required>
                        </div>
                         @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block signbtn" value="Reset Password" type="submit">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>