<field><?php if (isset($ShowLabel) && $ShowLabel == 'on') { ?><ShowLabel position="<?php if (isset($LabelPosition) && !empty($LabelPosition)) { $position = explode('-', $LabelPosition); $position = $position[0]; echo $position; } else {echo 'left';} ?>"><![CDATA[<label for='ufo-field-id-<?php echo $id;?>' <?php if (isset($LabelCSSClass) && !empty($LabelCSSClass)) {echo "class='$LabelCSSClass'";}; if (isset($LabelPosition)) { $style = array(); $align = explode('-',$LabelPosition); $align = $align[count($align)-1]; $style[] = "text-align:$align"; }; if (isset($LabelCSSStyle) && !empty($LabelCSSStyle)) { $style = array(); $style[] = $LabelCSSStyle; }; if (count($style) > 0) {echo " style='". implode(';',$style). "'";}; ?>><?php echo $Label;if(isset($Required) && $Required == 'on' && isset($SetRequiredSuffix) && $SetRequiredSuffix == 'on' && isset($RequiredSuffix) && !empty($RequiredSuffix)) {?><span <?php if (isset($RequiredSuffixCSSClass) && !empty($RequiredSuffixCSSClass)) {echo "class='$RequiredSuffixCSSClass'";}; if (isset($RequiredSuffixCSSStyle) && !empty($RequiredSuffixCSSStyle)) {echo " style='$RequiredSuffixCSSStyle'";}; ?>><?php echo $RequiredSuffix; ?></span><?php }?></label>]]></ShowLabel><?php } ?><?php if (isset($ShowDescription) && $ShowDescription == 'on') { ?><ShowDescription position="<?php if (isset($DescriptionPosition) && !empty($DescriptionPosition)) { echo $DescriptionPosition; } else {echo 'bottom';} ?>"><![CDATA[<div <?php if (isset($DescriptionCSSClass) && !empty($DescriptionCSSClass)) {echo "class='$DescriptionCSSClass'";}; if (isset($DescriptionCSSStyle) && !empty($DescriptionCSSStyle)) {echo " style='$DescriptionCSSStyle'";}; ?>><?php if (isset($Description)) {echo $Description; }; ?></div>]]></ShowDescription><?php } ?><?php if (((isset($Required) && $Required == 'on')||(isset($Validate) && $Validate == 'on')) && isset($RequiredMessage) && !empty($RequiredMessage)) { ?><RequiredMessage position="<?php if (isset($RequiredMessagePosition) && !empty($RequiredMessagePosition)) { echo $RequiredMessagePosition; } else {echo 'right';} ?>"><![CDATA[<div id='ufo-field-id-<?php echo $id;?>-invalid' <?php if (isset($RequiredMessageCSSClass) && !empty($RequiredMessageCSSClass)) {echo "class='$RequiredMessageCSSClass'";};?> style='<?php if (isset($RequiredMessageCSSStyle) && !empty($RequiredMessageCSSStyle)) {echo trim($RequiredMessageCSSStyle, ' ;') . ';';};?>display:none'></div>]]></RequiredMessage><?php } ?><?php if (isset($Validate) && $Validate == 'on' && isset($SetValidMessage) && $SetValidMessage == 'on' && isset($ValidMessage)) { ?><ValidMessage position="<?php if (isset($ValidMessagePosition) && !empty($ValidMessagePosition)) { echo $ValidMessagePosition; } else {echo 'right';} ?>"><![CDATA[<div id='ufo-field-id-<?php echo $id;?>-valid' <?php if (isset($ValidCSSClass) && !empty($ValidCSSClass)) {echo "class='$ValidCSSClass'";};?> style='<?php if (isset($ValidCSSStyle) && !empty($ValidCSSStyle)) {echo trim($ValidCSSStyle, ' ;') . ';';};?>display:none'><?php if (!empty($ValidMessage)) { echo $ValidMessage; } ?></div>]]></ValidMessage><?php } ?><?php if ((isset($Validate) && $Validate == 'on') || (isset($Required) && $Required == 'on')) { ?><Validation><![CDATA[<?php $config = (object) array(); $config->events = (object) array(); if (isset($Required) && $Required == 'on') { $config->Required = TRUE; $config->events->blur[] = 'required'; } if (isset($Validate) && $Validate == 'on') { $config->Validate = TRUE; } if (isset($InvalidCSSClass) && !empty($InvalidCSSClass)) { $config->InvalidCSSClass = $InvalidCSSClass; } if (isset($SetValidMessage) && $SetValidMessage == 'on') { $config->showValid = TRUE; if (isset($ValidMessageAbsolutePosition) && $ValidMessageAbsolutePosition == 'on') { $config->ValidMessageAbsolutePosition = TRUE; } if (isset($ValidMessagePosition) && !empty($ValidMessagePosition)) { $config->ValidMessagePosition = $ValidMessagePosition; } if (isset($ValidCSSClass) && !empty($ValidCSSClass)) { $config->ValidCSSClass = $ValidCSSClass; } if (isset($ValidCSSStyle) && !empty($ValidCSSStyle)) { $config->ValidCSSStyle = $ValidCSSStyle; } if (isset($ValidMessage) && !empty($ValidMessage)) { $config->ValidMessage = htmlspecialchars(str_replace('&#39;', '\'', $ValidMessage)); } } if (isset($RequiredMessage) && !empty($RequiredMessage)) { $config->RequiredMessage = htmlspecialchars(str_replace('&#39;', '\'', $RequiredMessage)); } if (isset($AbsolutePosition) && $AbsolutePosition == 'on') { $config->AbsolutePosition = TRUE; } if (isset($RequiredMessagePosition) && !empty($RequiredMessagePosition)) { $config->RequiredMessagePosition = $RequiredMessagePosition; } if (isset($RequiredMessageCSSClass) && !empty($RequiredMessageCSSClass)) { $config->RequiredMessageCSSClass = $RequiredMessageCSSClass; } if (isset($RequiredMessageCSSStyle) && !empty($RequiredMessageCSSStyle)) { $config->RequiredMessageCSSStyle = $RequiredMessageCSSStyle; } if (isset($SetDefaultValue) && $SetDefaultValue == 'on' && isset($DefaultValue) && !empty($DefaultValue)) { $config->DefaultValue  = $DefaultValue; if (isset($IsBlankValue) && $IsBlankValue == 'on') { $config->IsBlankValue = TRUE; } if (isset($DefaultValueCSSClass) && !empty($DefaultValueCSSClass)) { $config->DefaultValueCSSClass = $DefaultValueCSSClass; $config->events->blur[] = 'default'; $config->events->focus[] = 'default'; } } $config->events->blur[] = 'email'; if (count( (array) $config->events) > 0) { $config->id = "ufo-field-id-$id"; $config->form = "ufo-form-id-$formid"; $js = 'ufoFormsConfig.validations.push(' . json_encode($config) . ');'; echo "<script type='text/javascript'>" . $js . "</script>"; } ?>]]></Validation><?php } ?><Input <?php if (isset($SetSize) && $SetSize == 'on' && isset($Width) && !empty($Width) && isset($WidthUnit) && $WidthUnit != 'chars') {echo ' width="' . $Width . $WidthUnit . '"';}; ?><?php if (isset($RowCSSClass) && !empty($RowCSSClass) && isset($SetStyle) && $SetStyle == 'on') {echo ' rowclass="' . $RowCSSClass . '"';}; ?><?php if (isset($InputPosition) && !empty($InputPosition)) {echo ' position="' . $InputPosition . '"';}; ?>><![CDATA[<input type='text' id='ufo-field-id-<?php echo $id;?>' value='{id-<?php echo $id ?>}' name='id-<?php echo $id;?>' <?php $class = array();if (isset($CSSClass) && !empty($CSSClass)) { $class[] = $CSSClass; };if (count($class) > 0) {echo " class='" . implode(' ', $class) . "'";};if (isset($SetSize) && $SetSize == 'on' && isset($Width) && !empty($Width) && isset($WidthUnit) && $WidthUnit == 'chars') {echo "size='$Width'";};$style = array();if (isset($SetSize) && $SetSize == 'on' && isset($Width) && !empty($Width) && isset($WidthUnit) && !empty($WidthUnit) && $WidthUnit != 'chars') {$style[] = "width:{$Width}{$WidthUnit}";};if (isset($SetStyle) && $SetStyle == 'on' && isset($CSSStyle) && !empty($CSSStyle)) { $style[] = $CSSStyle; };if (count($style) > 0) {echo " style='" . implode(';', $style) . "'";};?>/>]]></Input></field>