<div class="bkz-width-50pc">
  <h1 class="connexion">
    Connexion
  </h1>
<form>
  <div class="form-group">
    <label for="mail1">Email address</label>
    <input type="email" class="form-control" id="mail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password1">Password</label>
    <input type="password" class="form-control" id="password1" placeholder="Password">
  </div>
  <div type="submit" class="btn btn-primary display_none"  title="connexion" onclick="connexion_submit(this)" id="submit">Submit</div>
</form>
</div>

<style>
  .bkz-width-50pc {
    width: 50%;
    margin: auto;
    margin-top: 50px;
  }
  .connexion {
    text-align: center;
    margin-bottom: 100px;
  }
</style>