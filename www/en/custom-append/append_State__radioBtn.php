<label class="">
	<input type="radio" id="<?php echo $radio_ID ?>" name="<?php echo $radio_Name ?>" value="<?php echo $va[1] ?>">
	<div class="<?php echo $radio_Class ?>"><div>
		<span><?php echo $va[0] ?></span><br>
	</div></div>
</label>




<!--  ================================================================================================  -->
<!--  ______________________________        Place this in [HTML]        ______________________________  -->
<!--  ================================================================================================  -->
<!-- <?php
	// $r = $dosql->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=5");
	// $fieldsel = explode(',',$r['fieldsel']);

	// foreach($fieldsel as $value){
	// 	$va = explode('=',$value);

	// 	/***  (Set) recognition-Name [radio button]  ***/
	// 	$radio_Name = 'state';
	// 	$radio_ID = 'state';

	// 	/***  (Set) Button-Percentage [radio button]  ***/
	// 	$radio_borderBox = 'border-box_100';

	// 	/***  (Insert) State [radio button]  ***/
	// 	include('custom-append/append_State__radioBtn.php');
	// }
?> -->