
<div class="container">
      <form class="form-signin" action="/admin/check" method="POST">
        <h2 class="form-signin-heading">登陆</h2>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="密码" required>
        <label for="word" class="sr-only">
            验证码
         </label>
          <input type="text" id="word" name="word"  class="form-control" placeholder="验证码" required>
          <?php echo $img;?>
        <button class="btn btn-lg btn-primary btn-block mt15" type="submit">登陆</button>
      </form>
      <?php if(isset($error) && !empty($error)) {?>
      		<div class="rows"><span>登陆失败，请重新登陆</span></div>
      <?php }?>
</div> <!-- /container -->

