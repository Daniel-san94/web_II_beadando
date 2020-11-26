<h2>Szolgáltatások</h2>
<div class="container">
<?php foreach($viewInfo as $szolgaltatas): ?>
        <a class="szolg" href="<?php echo SITE_ROOT. "szolgaltatasok/". $szolgaltatas->id; ?>"/>
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