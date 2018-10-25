<?php 

    use kartik\select2\Select2;
    $this->registerJsFile('/js/cityfordelivery.js');

?>

    <script>
        var curent_did = <?= $did ?>;  
    </script>

<h4>Список городов в которых работает эта служба:</h4>
<div id = 'cont_for_cities'>
    <ul id = 'cities_list'>
    </ul>

<?= Select2::widget([
    'name' => 'newcity',
    'id' => 'newcity',
    'value' => '',
    'data' => $cities,
    'options' => ['multiple' => false, 'placeholder' => 'Select states ...']
]); ?>

<input type="button" name="addButton" id="addButton" value="Добавить" />

</div>
