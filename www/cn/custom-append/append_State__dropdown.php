<select name="<?php echo $dropdown_Name; ?>" class="<?php echo $dropdown_Class; ?>" id="<?php echo $dropdown_ID; ?>">
    <option value="0" id=''><?php echo $dropdown_valueNil; ?></option>

    <?php
$r = $dosql->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=$dropdown_tableID");
$fieldsel = explode(',', $r['fieldsel']);

foreach ($fieldsel as $value) {
    $va = explode('=', $value);
    ?>
			<option value="<?php echo $va[1]; ?>" id=''><?php echo $va[0]; ?></option>
	<?php
}
?>
</select>




<!--  ================================================================================================  -->
<!--  ______________________________        Place this in [HTML]        ______________________________  -->
<!--  ================================================================================================  -->
<!-- <?php

// /***  (Set) recognition-Name  ***/
// $dropdown_Name = 'state';
// $dropdown_ID = 'state';
// /***  (Set) Button-Percentage  ***/
// $dropdown_Class = 'dropdown_100';

// /***  (Set) 1st Value  ***/
// $dropdown_valueNil = '请选择「大州」';
// /***  (Get) Value [from database]  ***/
// $dropdown_tableID = 5;

// /***  (Insert) State [dropdown]  ***/
// include('custom-append/append_State__dropdown.php');

;?> -->