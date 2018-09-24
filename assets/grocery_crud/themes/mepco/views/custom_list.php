<?php

	$column_width = (int)(80/count($columns));
	$exists_column_width = (int)(80/count($columns));

	if(!empty($list)){
?><div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>

				<?php
				/*||
				$column->field_name == "category_image" ||
				$column->field_name == "sort_order"*/

				foreach($columns as $column){
					if($column->field_name == "file_download_url"){
						$column_width = 24;
					}
					else if($column->field_name == "sort_order"){
						$column_width = 20;
					}
					else if($column->field_name == "category_name"){
						$column_width = 10;
					}
					else if($column->field_name == "news_title" || $column->field_name == "news_description"
						|| $column->field_name == "from_date" || $column->field_name == "to_date"){
						$column_width = 25;
					}
					else if($column->field_name == "job_title" || $column->field_name == "job_qualification"
						|| $column->field_name == "job_experience" || $column->field_name == "job_description" || $column->field_name == "created_at"){
						$column_width = 25;
					}
					else
					{
						/*$column_width = $exists_column_width;*/
						$column_width = 50;
					}
					//echo $column_width;

					if($column->field_name != "category_type"){
					?>
				<th width='<?php echo $column_width?>%'>
					<?php /*<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>"
						rel='<?php echo $column->field_name?>'>*/ ?>
					<div class="text-left unset-field-sorting"
						rel='<?php echo $column->field_name?>'>

						<?php echo $column->display_as?>
					</div>
				</th>
				<?php
				}
				}
				?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !$unset_clone || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="list_actions" width='5%' style="text-align: center;">
					<div class="list_actions">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>

				<?php
				if($subject == "Products" || $subject == "Applications" || $subject == "FAQ" || $subject == "Category"){
					?>
					<th align="left" abbr="tools" axis="col1" class="" width='20%'>
						<div class="text-right list_actions">
							Priority
						</div>
					</th>
					<?php
				}
				?>

			</tr>
		</thead>
		<tbody>
<?php $i=0; foreach($list as $num_row => $row){ ?>
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<?php foreach($columns as $column){
				if($column->field_name != "category_type"){
				?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }

			}
			?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td align="left" width='20%'>
				<div class='tools'>
				<?php
					if(isset($row->tran_id)){
						if($subject == "Products"){
							$dataKey = $row->tran_id;
							$dataCase = 5;
						}
						if($subject == "Applications"){
							$dataKey = $row->tran_id;
							$dataCase = 7;
						}
					}
					else if(isset($row->category_id)){
						if(isset($row->category_type) && $row->category_type == "Product"){
							$dataKey = $row->category_id;
							$dataCase = 8;
						}
						else if(isset($row->category_type) && $row->category_type == "Application")
						{
							$dataKey = $row->category_id;
							$dataCase = 1;
						}

					}
					else if(isset($row->gallery_id)){
						$dataKey = $row->gallery_id;
						$dataCase = 3;
					}
					else if(isset($row->news_id)){
						$dataKey = $row->news_id;
						$dataCase = 4;
					}
					else if(isset($row->faq_id)){
						$dataKey = $row->faq_id;
						$dataCase = 2;
					}
					else if(isset($row->job_id)){
						$dataKey = $row->job_id;
						$dataCase = 6;
					}
					else{
						$dataKey = '';
						$dataCase = '';
					}
					$dataStatus = $row->status;
					if(isset($row->priority)){
						$dataPriority = $row->priority;
					}

				?>
					<?php if($dataStatus == 1){ ?>
						<a id="fa_status_<?php echo $i; ?>"
							data-sno="<?php echo $i; ?>"
							data-key="<?php echo $dataKey; ?>"
							data-case="<?php echo $dataCase; ?>"
							data-status="<?php echo $dataStatus; ?>"
							onclick = "return active_disable(this);"
							href="javascript:void(0);" title="Active" class="active-row" >



                    		<i class="fa fa-check text-success c-pointer status status-icon fa-close-fa-check" data-toggle="tooltip" style="" title="Active"></i>
                    		<!-- <i class="fa c-pointer status fa-times text-danger" data-toggle="tooltip" style="" title="Disable" ></i> -->
                    	</a>

					<?php }else{ ?>
						<a id="fa_status_<?php echo $i; ?>"
							data-sno="<?php echo $i; ?>"
							data-key="<?php echo $dataKey; ?>"
							data-case="<?php echo $dataCase; ?>"
							data-status="<?php echo '2'; ?>"
							onclick = "return active_disable(this);"
							href="javascript:void(0);" title="Disable" class="active-row" >
						<i class="fa fa-close text-danger c-pointer status status-icon fa-close-fa-check" data-toggle="tooltip" style="" title="Disable"></i>
						<!-- <i class="fa c-pointer status fa-times text-danger" data-toggle="tooltip" style="" title="Disable" ></i> -->
						</a>

						<?php } ?>


                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button">
							<!-- <span class='edit-icon'></span> -->
								<i class="fa edit-icon fa-pencil text-primary c-pointer" data-toggle="tooltip" style="" title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' data-original-title="Click here to Edit"></i>

							</a>
					<?php }?>

					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
                    			<i class="fa c-pointer status fa-trash text-danger delete-icon" data-toggle="tooltip" style="" title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' ></i>
                    			</a>
                    <?php }?>

                    <?php /*if(!$unset_clone){?>
                        <a href='<?php echo $row->clone_url?>' title='Clone <?php echo $subject?>' class="clone_button"><span class='clone-icon'></span></a>
                    <?php }?>
					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button"><span class='read-icon'></span></a>
					<?php }*/?>
					<?php
					/*if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php
								}
							?></a>
					<?php }
					}*/
					?>
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>


			<?php
				if($subject == "Products" || $subject == "Applications" || $subject == "FAQ" || $subject == "Category"){

					if($subject == "Category"){
						$slug = strtolower($row->category_type);
					}
					else
					{
						$slug = '';
					}

					?>
					<td align="left" width='20%'>
						<div class="text-center">
							<a href="javascript:void(0);" class="priority-up" data-id="<?php echo $dataKey; ?>" data-priority="<?php echo $dataPriority; ?>" data-case-id = "<?php echo $dataCase; ?>" data-page = "<?php echo strtolower($subject); ?>" data-direction="up" data-slug="<?php echo $slug; ?>">
								<!-- <i class="fa fa-arrow-up" aria-hidden="true"></i> -->
								<img title="Up" class="arrow-dir" src="<?php echo base_url().'assets/site/img/up-arrow.png'; ?>">
							</a>

							<a href="javascript:void(0);" class="priority-down" data-id="<?php echo $dataKey; ?>" data-priority="<?php echo $dataPriority; ?>" data-case-id = "<?php echo $dataCase; ?>" data-page = "<?php echo strtolower($subject); ?>" data-direction="down" data-slug="<?php echo $slug; ?>">
								<!-- <i class="fa fa-arrow-down" aria-hidden="true"></i> -->
								<img title="Down" class="arrow-dir" src="<?php echo base_url().'assets/site/img/down-arrow.png'; ?>">
							</a>

						</div>
					</th>
					<?php
				}
			?>


		</tr>
<?php $i++; } ?>

<style type="text/css">
img.arrow-dir {
    width: 20px;
}
.text-left.unset-field-sorting {
    text-transform: capitalize;
}
.flexigrid div.bDiv td div{
    white-space: initial;
}
.active-row, .edit_button, .delete-row {
    padding: 0px 5px 5px 5px;
}
.priority-up {
    margin: 0px -7px 0px 0px;
}
</style>
		</tbody>
		</table>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>common/app/js/api-js-base.js"></script>


<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>
