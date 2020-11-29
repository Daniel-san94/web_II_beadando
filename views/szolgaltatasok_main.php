<h2>Szolgáltatások</h2>

<?php echo $_SESSION['username']; ?>
  
<!--Ellenőrizzük, hogy viewInfo asszociációs tömb e, ha igen, akkor 1 szolgáltatás jelenik meg, ha nem akkor több. -->
<?php if (array_keys($viewInfo) !== range(0, count($viewInfo) - 1)): ?>
    <div class="container">
        <div class="container-item">
            <div>
            <h2>
                <?php echo $viewInfo['szolgaltatas'][0]->nev; ?>
            </h2>
            <p>
                <?php echo $viewInfo['szolgaltatas'][0]->leiras; ?>
            </p>
            <h2>
                <?php echo $viewInfo['szolgaltatas'][0]->ar; ?>
            </h2>
            </div>
            <div>
            <img src="<?php echo $viewInfo['szolgaltatas'][0]->kep_url; ?>"/>
            </div>
        </div>
    </div>
    <h2>Vélemények</h2>
    <div class="hozzaszolas-container">

        <?php foreach($viewInfo['hozzaszolasok'] as $hozzaszolas): ?>
            <div class="hozzaszolas" id="hid-<?php echo $hozzaszolas->id ?>">
            <p><?php echo $hozzaszolas->hozzaszolo  ?> </p>
            <p class="velemeny"><?php echo $hozzaszolas->velemeny  ?> </p>
            <p><?php echo $hozzaszolas->datum  ?> </p>
            <?php if ($_SESSION['username'] == $hozzaszolas->hozzaszolo  ): ?>
            <button onclick="velemenyszerkesztes(<?php echo $hozzaszolas->datum ?>)">&#9998;</button>
            <button>&#128465;</button>
            <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </div>
            <h2>Véleményezze a szolgáltatásunkat</h2>
            <form action="<?= SITE_ROOT ?>velemeny" method="POST">
            <label for="hozzaszolas">Hozzászólás:</label><input type="text" name="hozzaszolas" id="hozzaszolas"><br>
            <input type="hidden" name="szolgaltatas_id" value="<?php echo $viewInfo['szolgaltatas'][0]->id; ?>">
            <input type="hidden" name="action" value="add">
            <input type="submit"  value="Hozzászólás"><br>
            </form>
    <a href="<?php echo SITE_ROOT. "szolgaltatasok" ?>">
    Vissza
    </a>
<?php elseif (array_keys($viewInfo) == range(0, count($viewInfo) - 1)): ?>
    <div class="container">
        <?php foreach($viewInfo as $szolgaltatas): ?>
                <a class="szolg" href="<?php echo SITE_ROOT. "szolgaltatasok/id=". $szolgaltatas->id; ?>"/>
                    <div class="container-item">
                        <div>
                        <h2>
                            <?php echo $szolgaltatas->nev; ?>
                        </h2>
                        <p>
                            <?php echo $szolgaltatas->leiras; ?>
                        </p>
                        <h2>
                            <?php echo $szolgaltatas->ar; ?>
                        </h2>
                        </div>
                        <div>
                        <img src="<?php echo $szolgaltatas->kep_url; ?>"/>
                        </div>
                    </div>
                </a>
        <?php endforeach; ?>
    </div>
   
<?php else: ?>
    <h2>
        <?php echo $viewData['eredmény']; ?>
    </h2>
    <h4>
        <?php echo $viewData['uzenet']; ?>
    </h4>
    <a href="<?php echo SITE_ROOT. "szolgaltatasok" ?>">
    Vissza a szolgaltatasokhoz
    </a>
<?php endif; ?>


