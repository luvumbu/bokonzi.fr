<h1 class="inscription">
Inscription
</h1>
<form class="bkz-width-50pc">
    <div class="form-group">
      <label for="email1">Email address</label>
      <input type="email" class="form-control" id="mail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password1">Password</label>
      <input type="password" class="form-control" id="password1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input type="password" class="form-control" id="password2" placeholder="Password">
      </div>

    <div type="submit" class="btn btn-primary" title="inscription" onclick="connexion_submit(this)" id="inscription">Submit</div>
  </form>
  <style>
      .bkz-width-50pc 
      {
          width: 50%;
          margin: auto;
          margin-top:100px;
      }
      @media screen and (max-width: 1280px)
{
    .bkz-width-50pc 
      {
          width: 80%;
 
      }
}
.inscription 
{
  text-align:center ; 
  margin-top:50px;
}

  </style>