<?php

namespace core\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use core\models\Administrator;

/**
 * AdministratorSearch represents the model behind the search form about `core\models\Administrator`.
 */
class AdministratorSearch extends Administrator
{
    public function rules()
    {
        return [
            [['id', 'Group_id', 'is_admin', 'Postcode_id', 'Administrator_id', 'Contact_id', 'login_attempts', 'update_by', 'create_by'], 'integer'],
            [['title', 'username', 'password', 'password_hash', 'password_reset_token', 'auth_key', 'last_visit_time', 'name', 'firstname', 'lastname', 'picture', 'email', 'phone', 'mobile', 'fax', 'company', 'address', 'comments', 'internal_comments', 'break_from', 'break_to', 'dob_date', 'ignore_activity', 'sms_subscription', 'email_subscription', 'validation_key', 'status', 'update_time', 'create_time'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Administrator::find()->where('is_admin = 1');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'Group_id' => $this->Group_id,
            'is_admin' => $this->is_admin,
            'last_visit_time' => $this->last_visit_time,
            'Postcode_id' => $this->Postcode_id,
            'Administrator_id' => $this->Administrator_id,
            'Contact_id' => $this->Contact_id,
            'break_from' => $this->break_from,
            'break_to' => $this->break_to,
            'dob_date' => $this->dob_date,
            'login_attempts' => $this->login_attempts,
            'update_time' => $this->update_time,
            'update_by' => $this->update_by,
            'create_time' => $this->create_time,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'internal_comments', $this->internal_comments])
            ->andFilterWhere(['like', 'ignore_activity', $this->ignore_activity])
            ->andFilterWhere(['like', 'sms_subscription', $this->sms_subscription])
            ->andFilterWhere(['like', 'email_subscription', $this->email_subscription])
            ->andFilterWhere(['like', 'validation_key', $this->validation_key])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}