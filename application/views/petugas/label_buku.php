
<body onload="window.print();">
<center><h2>Label Eksemplar Buku</h2></center>
<?php	foreach($book as $buku) { ?>
<center>
			<table>
				<img alt='barcode' src='<?php echo base_url();?>assets/barcode.php?codetype=Code128&size=50&text=<?php echo $buku->id_eksemplar?>&print=true' style="width:25%; height:15%;"/>
				<?php echo $buku->judul;?>
				&nbsp|&nbsp
				<?php echo $buku->isbn;?>
			</table>
			
			<?php }
?>
</body>
	