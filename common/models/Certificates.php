<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificates".
 *
 * @property int $id
 * @property string $purchase_price
 * @property string $sale_pice
 * @property string $certid
 * @property int $iid
 * @property string $donor_name
 * @property string $donor_phone
 * @property string $donor_email
 * @property string $recipient_name
 * @property string $recipient_phone
 * @property string $created_at
 * @property string $activated_at
 * @property string $closed_at
 * @property int $status
 *
 * @property Items $i
 */
class Certificates extends \yii\db\ActiveRecord
{
    const NEWITEM = 0; 
    const SENDFORPAYMENT = 1; 
    const PAID = 2; 
    const ACTIVETED = 3; 
    const FINISHED = 4; 
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_price', 'sale_price', 'certid', 'status'], 'required'],
            [['purchase_price', 'sale_price'], 'number'],
            [['iid', 'status'], 'integer'],
            [['created_at', 'activated_at', 'closed_at'], 'safe'],
            [['certid', 'donor_name', 'donor_phone', 'donor_email', 'recipient_name', 'recipient_phone'], 'string', 'max' => 255],
            [['certid'], 'unique'],
            [['iid'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['iid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_price' => 'Purchase Price',
            'sale_price' => 'Sale Pice',
            'certid' => 'Certid',
            'iid' => 'Iid',
            'donor_name' => 'Donor Name',
            'donor_phone' => 'Donor Phone',
            'donor_email' => 'Donor Email',
            'recipient_name' => 'Recipient Name',
            'recipient_phone' => 'Recipient Phone',
            'created_at' => 'Created At',
            'activated_at' => 'Activated At',
            'closed_at' => 'Closed At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }
    
    public function generateCert() 
    {
        $item = \common\models\Items::findOne($this->iid);
        $vaucherPath = "./img/vauchers/vaucher.png";
        $im = imagecreatefrompng($vaucherPath);
        $name = $item->name; 
        $shortDescription1 = $this->getStringOfDescription($item->short_description); 
        $shortDescription2 = $this->getStringOfDescription($item->short_description, 2);

        $till = Yii::$app->formatter->asTimestamp($this->created_at) + $item->lifetime*60*60*24; 
        $till = date('d-m-Y',$till);
        $date = 'Активировать до: '.$till;
        $cod = $this->certid;
        $fontpath2 = "./fonts/Jura-Bold.ttf";
        $fontpath1 = "./fonts/12161.otf";
        $color = imagecolorallocate($im, 0, 0, 0); 
        imagettftext($im, 32, 0, 420, 260, $color, $fontpath1, $name);
        imagettftext($im, 28, 0, 420, 350, $color, $fontpath1, $shortDescription1);
        imagettftext($im, 28, 0, 420, 395, $color, $fontpath1, $shortDescription2);
        imagettftext($im, 24, 0, 75, 380, $color, $fontpath2, $cod);
        imagettftext($im, 28, 0, 480, 437, $color, $fontpath1, $date);
        header("Content-type: image/png"); 
        imagepng($im); 
        imagedestroy($im);
        
    }

    protected function getStringOfDescription($description, $strnumber = 1)
    {
        $strlength = 46*2;
        $tmparr = explode(' ', $description);
        $i=0;
        $len = 0;
        $str ='';
        while (($len + strlen($tmparr[$i])) <= $strlength ) {
            $str = $str . $tmparr[$i] . ' ';   
            $len = strlen($str);
            $i++;
        }
        if ($strnumber === 1) return $str;

        $str ='';
        $len = 0;
        while (array_key_exists($i, $tmparr) && (($len + strlen($tmparr[$i])) <= $strlength) ) {
            $str = $str . $tmparr[$i] . ' ';   
            $len = strlen($str);
            $i++;
        }

        return $str;

    
    }

    public static function getNewCertID() 
    {

        $cert = 'not null';
        while ($cert) {
            $certid = self::generateRndString(4).'-'.self::generateRndString(6);

            $cert = \common\models\Certificates::find()
                ->where(['certid' => $certid])
                ->one();
        }

        return $certid;
    } 
    
    protected static function generateRndString($length = 8)
    {
        $chars = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
          $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public function onActivate()
    {
        // All we need to do when the sertificate has been activated. 
        return true;
    }
}
