<?php
/**
 * Created by PhpStorm.
 * User: vstriukov
 * Date: 31.7.18
 * Time: 13:22
 */

namespace console\controllers;


use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll();


        $admin = $auth->createRole('Admin');
        $manager = $auth->createRole('Manager');


        $auth->add($admin);
        $auth->add($manager);

        $UserCUD = $auth->createPermission('UserCRUD');
        $UserCUD->description = 'Создание, редактирование, удаление пользователей.';
        $auth->add($UserCUD);

        $UserR = $auth->createPermission('UserR');
        $UserR->description = 'Чтение пользователей';
        $auth->add($UserR);

        $auth->addChild($manager,$UserR);

        $auth->addChild($admin, $manager);

        $auth->addChild($admin, $UserCUD);

        $auth->assign($admin, 14);
        
        $auth->assign($manager, 15);
    }
}