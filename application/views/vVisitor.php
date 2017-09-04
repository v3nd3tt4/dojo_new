<p><span class="glyphicon glyphicon-tint"></span> IP anda: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
<p><span class="glyphicon glyphicon-screenshot"></span> Hari ini : <?php if($hari_ini->hari_ini==0){echo 0;}else{echo $hari_ini->hari_ini;} ?> viewer</p>
<p><span class="glyphicon glyphicon-share"></span> Kemarin : <?php if($hari_ini->hari_ini==0){echo 0;}else{echo $kemarin->kemarin;} ?> viewer</p>
<p><span class="glyphicon glyphicon-user"></span> Total  : <?php if($hari_ini->hari_ini==0){echo 0;}else{echo $total->total;} ?> viewer</p>