<option value="">By State</option>
<? foreach($statelist as $row)
	{?>
		<option value="<?=$row['id']?>"><?=$row['state']?></option>
	<?}?>