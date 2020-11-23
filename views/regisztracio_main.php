<h2>Regisztráció</h2> 
<form action="<?= SITE_ROOT ?>regisztralt" method="post">
      <label for="csaladi_nev">Családi név: <input type = "text" name="csaladi_nev" id = "csaladi_nev"></label><br>
      <label for="utonev">Utónév: <input type = "text" name="utonev" id = "utonev"></label><br>
      <label for="login_nev">Login: <input type = "text" name="login_nev" id = "login_nev"></label><br>
      <label for="jelszo_reg">Jelszó: <input type = "password" name="jelszo_reg" id = "jelszo_reg"></label><br> 
      <input type="submit" name="regisztracio" value="Regisztráció"><br>
      </form>
      <h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>