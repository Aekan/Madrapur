<?phpuse yii\helpers\Html;use yii\jui\JuiAsset;//use kartik\widgets\FileInput;use kartik\file\FileInput;use wbraganca\dynamicform\DynamicFormWidget;use lajax\translatemanager\models\Language;//kartik\file\FileInputAsset::register($this);?><div id="panel-option-values" class="panel panel-default">    <div class="panel-heading">        <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Látnivalók</h3>    </div>    <?php DynamicFormWidget::begin([        'widgetContainer' => 'dynamicform_wrapper',        'widgetBody' => '.form-options-body',        'widgetItem' => '.form-options-item',        'min' => 0,        'insertButton' => '.add-item',        'deleteButton' => '.remove-item',        'model' => $sights[0],        'formId' => 'dynamic-form',        'formFields' => [            'name',            'description',            'image'        ],    ]); ?>    <table class="table table-bordered table-striped margin-b-none">        <thead>            <tr>                <th style="width: 60px; text-align: center"></th>                <th class="required">Tartalom</th>                <th style="width: 188px;">Kép</th>                <th style="width: 20px;"></th>            </tr>        </thead>        <tbody class="form-options-body">            <?php foreach ($sights as $index => $sight): $uniqid=uniqid(); ?>                <tr class="form-options-item">                    <td class="sortable-handle text-center vcenter" style="cursor: move;">                        <i class="fa fa-arrows"></i>                    </td>                    <td class="vcenter"><!--                        <ul class="nav nav-tabs">                            <li class="active"><a href="#sight-<?= $index.'-'.$uniqid ?>" data-toggle="tab" class="sighttab"><?= Yii::t('app','Tartalom') ?></a></li>                            <?php if(!$model->isNewRecord) { ?><li><a href="#sighttranslate-<?= $index.'-'.$uniqid ?>" data-toggle="tab" class="sighttranslatetab">Fordítás</a></li><?php } ?>                        </ul>-->                        <!--<div class="tab-content">-->                            <!--<div class="tab-pane active" id="sight-<?= $index.'-'.$uniqid ?>">-->                                <?= $form->field($sight, "[{$index}]name")->textInput(['maxlength' => 128]); ?>                                <?= $form->field($sight, "[{$index}]description")->textarea(); ?><!--                            </div>                            <div class="tab-pane" id="sighttranslate-<?= $index.'-'.$uniqid ?>">-->                            <?php if(!$model->isNewRecord) {                                    echo '<br/><h4>Fordítás: </h4>';                                    foreach (Language::getLanguages() as $language) {                                        if($language->language_id!=Yii::$app->sourceLanguage) {                                            $langId=$language->language_id;                                            echo $language->name.'<br/>';                                            echo $form->field($sight, "[{$index}]nametranslate[{$langId}]")->textInput(['maxlength' => true]);                                            echo $form->field($sight, "[{$index}]descriptiontranslate[{$langId}]")->textarea(['maxlength' => true]);                                        }                                    }                                } ?>                            <!--</div>                        </div>-->                    </td>                    <td>                        <?php if (!$sight->isNewRecord): ?>                            <?= Html::activeHiddenInput($sight, "[{$index}]id"); ?>                            <?php //Html::activeHiddenInput($sight, "[{$index}]image_id"); ?>                            <?= Html::activeHiddenInput($sight, "[{$index}]deleteImg"); ?>                        <?php endif; ?>                        <?php                            $initialPreview=[];                            if (!$sight->isNewRecord && $sight->image!='') {                                $pathImg = Yii::$app->params['citiessightsPictures'] . $sight->image;                                $initialPreview[] = Html::img($pathImg, ['style' => 'max-width: 140px;']);                            }                        ?> <?php                       /* $this->registerJs('                            $("#city-image-'.$index.'").fileinput({                                previewFileType: "image",                                showCaption: false,                                showUpload: false,                                browseClass: "btn btn-default btn-sm",                                browseLabel: "Feltölt",                                browseIcon: "<i class="glyphicon glyphicon-picture"></i>",                                removeClass: "btn btn-danger btn-sm",                                removeLabel: "Törlés",                                removeIcon: "<i class="fa fa-trash"></i>",                                previewSettings: [                                    image: [width: "140px", height: "auto"]                                ],                                initialPreview => $initialPreview,                                layoutTemplates => [footer: ""]                            });                        ');*/                        ?>                        <!--<input id="city-image-<?= $index ?>" class="optionvalue-img" name="Citydescriptionsights[<?= $index ?>][name]" type="file" class="file" data-preview-file-type="text">-->                        <?= $form->field($sight, "[{$index}]image")->widget(FileInput::classname(), [                            'options' => [                                'multiple' => false,                                'accept' => 'image/*',                                'class' => 'optionvalue-img'                            ],                            'pluginOptions' => [                                'previewFileType' => 'image',                                'showCaption' => false,                                'showUpload' => false,                                'browseClass' => 'btn btn-default btn-sm',                                'browseLabel' => 'Feltölt',                                'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',                                'removeClass' => 'btn btn-danger btn-sm',                                'removeLabel' => 'Törlés',                                'removeIcon' => '<i class="fa fa-trash"></i>',                                'previewSettings' => [                                    'image' => ['width' => '140px', 'height' => 'auto']                                ],                                'initialPreview' => $initialPreview,                                'layoutTemplates' => ['footer' => '']                            ]                        ])->label(false) ?>                    </td>                    <td class="text-center vcenter">                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>                    </td>                </tr>            <?php endforeach; ?>        </tbody>        <tfoot>            <tr>                <td colspan="3"></td>                <td><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> Új</button></td>            </tr>        </tfoot>    </table>    <?php DynamicFormWidget::end(); ?></div><?php$js = <<<'EOD'$(".optionvalue-img").on("filecleared", function(event) {    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;    var id = event.target.id;    var matches = id.match(regexID);    if (matches && matches.length === 4) {        var identifiers = matches[2].split("-");        $("#citydescriptionsights-" + identifiers[1] + "-deleteimg").val("1");    }});var fixHelperSortable = function(e, ui) {    ui.children().each(function() {        $(this).width($(this).width());    });    return ui;};$(".form-options-body").sortable({    items: "tr",    cursor: "move",    opacity: 0.6,    axis: "y",    handle: ".sortable-handle",    helper: fixHelperSortable,    update: function(ev){        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");    }}).disableSelection();EOD;JuiAsset::register($this);$this->registerJs($js);?>