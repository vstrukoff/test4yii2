<?php

use yii\db\Migration;

/**
 * Class m180804_121949_rbac_init
 */
class m180804_121949_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('Admin');
        $manager = $auth->createRole('Manager');


        $auth->add($admin);
        $auth->add($manager);

        $UserC = $auth->createPermission('UserCRUD');
        $UserC->description = 'Создание пользователей.';
        $auth->add($UserC);

        $UserR = $auth->createPermission('UserCRUD');
        $UserR->description = 'Чтение пользователей.';
        $auth->add($UserR);

        $UserU = $auth->createPermission('UserCRUD');
        $UserU->description = 'Назначение ролей пользователей.';
        $auth->add($UserU);

        $UserD = $auth->createPermission('UserR');
        $UserD->description = 'Удаление пользователей';
        $auth->add($UserD);

        // наделение правами

        $auth->addChild($manager,$UserR);

        $auth->addChild($admin, $UserC);

        $auth->addChild($admin, $UserR);

        $auth->addChild($admin, $UserU);

        $auth->addChild($admin, $UserD);

        // присвоение ролей

        $auth->assign($admin, 14);

        $auth->assign($manager, 15);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->authManager->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180804_121949_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
