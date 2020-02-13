Source: https://stackoverflow.com/questions/1597736/how-to-sort-an-array-of-associative-arrays-by-value-of-a-given-key-in-php
<?php
$inventory  = get_field('add_cases');
foreach ($inventory as $key => $row)
{
	$price[$key] = $row['result'];
}
array_multisort(str_replace(',','',$price), SORT_DESC, $inventory);
if( $inventory ) { ?>
	<?php
	foreach ( $inventory as $item ) { ?>
		<?php echo $item['type'];?>
		<?php echo $item['currency'].$item['result'];?>
		<?php
	} ?>
	<?php
} ?>