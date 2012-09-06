<?php echo"<?php";?> if ($model !== null):?>
<table border="1">

	<tr>
<?php
  foreach($this->tableSchema->columns as $column)
        {
  ?>
		<th width="80px">
		      <?php echo $this->getAttributeLabel($column->name); ?>
		</th>
 <?php } ?>
	</tr>
	<?php echo "<?php";?> foreach($model as $row): ?>
	<tr>
        <?php
  foreach($this->tableSchema->columns as $column)
        {
          ?>
		<td>
            <?php if (!$column->isForeignKey): ?>
            <?php echo "<?php"; ?> echo $row-><?php echo $column->name; ?>; ?>
            <?php else: ?>
            <?php $relations = $this->findRelation($this->modelClass, $column);?>
            <?php $relationName = $relations[0];?>
            <?php echo '<?php'; ?> echo $row-><?php echo $relationName; ?>; ?>
            <?php endif; ?>
		</td>
       <?php 
        }
     ?>
	</tr>
     <?php echo"<?php"; ?> endforeach; ?>
</table>
<?php echo"<?php";?> endif; ?>