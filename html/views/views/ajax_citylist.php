<option value="">By City</option>
<? foreach($citylist as $row)
	{?>
		<option value="<?=$row['id']?>"><?=$row['city']?></option>
	<?}?>