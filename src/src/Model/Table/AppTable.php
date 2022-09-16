<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Class AppTable
 * @package App\Model\Table
 */
class AppTable extends Table
{
    public const TABLE = null;

    protected $conn = null;

    public $f = [];

    /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        if (static::TABLE) {
            $this->setTable(static::TABLE);
        }

        // $this->setFields();
        $this->conn = ConnectionManager::get('default');
        $this->addBehavior('Timestamp');
    }

    // バリデーション用文字列
    protected function validationText($type = "char_limit", $value = false)
    {
        $message = null;
        switch ($type) {
            // 文字数制限
            case "char_limit":
                $message = "{$value} 文字以上は入力出来ません";
                break;
                // 数字のみ
            case "int":
                $message = "数字のみを入力してください";
                break;
                // 正式な URL
            case "url":
                $message = "正式な URL を入力してください (例：http://domain.com/)";
                break;
                // 正式な電話番号
            case "tel":
                $message = "正式な番号を入力してください (例：0355546662)";
                break;
                // 正式な E-mail
            case "email":
                $message = "正式な E-mail を入力してください (例：mail@domain.com)";
                break;
                // 正式な郵便番号
            case "postcode":
                $message = "正式な郵便番号を入力してください (例：154-0001)";
                break;
            case "empty":
                $message = "「{$value}」が空欄です";
                break;
                // 通常
            default:
            }

        return $message;
    }
}
