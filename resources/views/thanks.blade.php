@extends('layouts.partials.header')
 @section('content')
<section>
<img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">  
<div class="container m-50 mtop-70">
  <div class="row">
    <div class="col-md-12 signup-fist-col" style="text-align: center;">
    	<img src="img/thanks.jpg" style="box-shadow:4px 4px 20px #000;border-radius:12px;"/>
    	<br/><br/>
      <p>This is to inform you that your account has been activated.</p> 
     
      <p>Your Video Editing Account gives you access to any of the Video Editing Market sites, where you can buy or sell digital goods like WordPress themes, background music, After Effects project files, photography and much, much more.</p>     
      <p>
        Now you can login. <a class="button create-accountes btn-primary" href="/login">Login</a>
      </p>
    </div>
    <div class="col-md-1"></div>
    
  </div>
</div> 
</section>
<section class="hero-bg-section">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
</section>


@endsection
