
<div class="uk-width-1">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/voucher/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/voucher" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>
</div>

<div class="spacer"></div>

<div id="error-message-wrapper"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
    <?php echo CHtml::hiddenField('action','addVoucherNew')?>
    <?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
    <input type="hidden" name="voucher_owner" id="voucher_owner" value="admin">
    <?php if (!isset($_GET['id'])):?>
        <?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/voucher/Do/Add")?>
    <?php endif;?>

    <?php
    $has_already_used=false;
    if (isset($_GET['id'])){
        if (!$data=Yii::app()->functions->getVoucherCodeByIdNew($_GET['id'])){
            echo "<div class=\"uk-alert uk-alert-danger\">".
                Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
            return ;
        }

        if (isset($data['found'])){
            if ( $data['found']>0){
                $has_already_used=true;
            }
        }
    }
    ?>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Voucher name")?></label>
        <?php echo CHtml::textField('voucher_name',$data['voucher_name'],
            array(
                'data-validation'=>'required' ,
                'class'=>"voucher_name"
            ))?>
    </div>
    <?php if ($has_already_used):?>
        <p class="uk-text-small uk-text-danger"><?php echo t("This voucher has already been used editing the voucher name may cause error on the system")?></p>
        <?php echo CHtml::hiddenField('disabled_voucher_code')?>
    <?php endif;?>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Type")?></label>
        <?php
        echo CHtml::dropDownList('voucher_type',$data['voucher_type'],
            Yii::app()->functions->voucherType(),array(
                'data-validation'=>"required"
            ))
        ?>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Discount")?></label>
        <?php echo CHtml::textField('amount',
            normalPrettyPrice($data['amount'])
            ,array('data-validation'=>'required','class'=>'numeric_only'))?>
        <span class="uk-text-muted"><?php echo Yii::t("default","Voucher amount discount.")?></span>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Voucher Over")?></label>
        <?php echo CHtml::textField('over',
            normalPrettyPrice($data['voucher_over'])
            ,array('data-validation'=>'required','class'=>'numeric_only'))?>
        <span class="uk-text-muted"><?php echo Yii::t("default","Voucher amount over.")?></span>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Expiration")?></label>
        <?php
        echo CHtml::hiddenField('expiration',$data['expiration']);
        echo CHtml::textField('expiration1',FormatDateTime($data['expiration'],false),
            array(
                'class'=>'j_date' ,
                'data-id'=>'expiration',
                'data-validation'=>"required"
            ))
        ?>
    </div>

    <?php
    $joining_merchant=isset($data['joining_merchant'])?json_decode($data['joining_merchant'],true):'';
    ?>
    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Applicable to merchant")?></label>
        <?php
        echo CHtml::dropDownList('joining_merchant[]',(array)$joining_merchant,
            Yii::app()->functions->merchantList(true),array(
                //'data-validation'=>"required",
                'multiple'=>true,
                'class'=>"chosen"
            ))
        ?>
    </div>
    <p class="uk-text-muted uk-text-small">
        <?php echo t("leave empty if you want to apply to all merchants")?>
    </p>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Used only once")?></label>
        <?php
        echo CHtml::checkBox('used_once',
            $data['used_once']==2?true:false,
            array(
                'class'=>"icheck",
                'value'=>2
            ))
        ?>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo Yii::t("default","Hide in Frontend")?></label>
        <?php
        echo CHtml::checkBox('hide_in_front',
            $data['hide_in_front']==1?true:false,
            array(
                'class'=>"icheck",
                'value'=>1
            ))
        ?>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label"><?php echo t("Status") ?></label>
        <?php echo CHtml::dropDownList('status',
            isset($data['status'])?$data['status']:"",
            (array)statusList(),
            array(
                'class'=>'uk-form-width-large',
                'data-validation'=>"required"
            ))?>
    </div>


    <div class="uk-form-row">
        <label class="uk-form-label"></label>
        <input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
    </div>

</form>