<?php 
namespace backend\widgets\cities;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Deliverytocitys;
use yii\helpers\ArrayHelper;

class Cities extends Widget
{
    /* It gets delivery id and generate curent cities for this delivery
     */
    public $deliveryid;
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $citys = ArrayHelper::map(\common\models\Citys::find()->all(), 'id', 'name');
        return $this->render('cities' , 
            [
                'cities' => $citys,
                'did' => $this->id,
            ]);
    }
}
