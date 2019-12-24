<!DOCTYPE html> 
<html> 
<head><title>Kartu Anggota Perpustakaan</title>
<style type="text/css">
body {font-family: Arial;}
td {padding: 10px;}
table {margin: auto;margin-top: 90px;}
</style> 
</head> 
<body width="1011px" height="638px" bgcolor="#181a1c" onload="window.print();">
<table border="0" width="50%" cellpadding="0" cellspacing="0">
<?php foreach ($anggota as $ang) : ?>
<tr>
<th colspan="3">
<img src="<?php echo base_url('images/polindra.png');?>" style="height:50px; width:50px;">
</th>
</tr>
<tr bgcolor="#e7e7e7">
<td width="150">Nama Lengkap</td>
<td width="250"><?php echo $ang->nama;?></td>
<td rowspan="4"> <?php if ($ang->foto == null) {?>
                 	<img src="<?php echo base_url('images/user/user.png');?>" style="width:100px; height:100px;" alt="logo images">
                 <?php } else {?>
                    <img src="<?php echo base_url().'images/user/'.$pro->foto?>" style="width:100px; height:100px;" alt="logo images">
                <?php } ?></td>
</tr>
<tr bgcolor="#e7e7e7">
<td>ID Card / NIM</td>
<td><?php echo $ang->id_card.''.$ang->nim;?></td>
</tr>
<tr bgcolor="#e7e7e7">
<td>Tanggal Kadaluarsa</td>
<td><?php echo $ang->tgl_berlaku;?></td>
</tr>
<tr bgcolor="#19bd9b">
<td colspan="3" align="center">Siprus Polindra 2019</td>
</tr>
<?php endforeach; ?>
</table> 
</body> 
</html>