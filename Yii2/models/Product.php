<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $idProduct
 * @property string $productName
 * @property string $category
 * @property int $supplierID
 *
 * @property Supplier $supplier
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productName', 'supplierID'], 'required'],
            [['supplierID'], 'integer'],
            [['productName'], 'string', 'max' => 40],
            [['category'], 'string', 'max' => 20],
            [['supplierID'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplierID' => 'supplierID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProduct' => 'Id Product',
            'productName' => 'Product Name',
            'category' => 'Category',
            'supplierID' => 'Supplier ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplierID' => 'supplierID']);
    }
}
