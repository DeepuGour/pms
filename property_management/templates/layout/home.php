<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['animate', 'owl.carousel.min', 'owl.theme.default.min','magnific-popup','flaticon','style']) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    
    
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
   
    
    <?= $this->Html->script(['jquery.min', 'jquery-migrate-3.0.1.min', 'popper.min','bootstrap.min','jquery.easing.1.3','jquery.waypoints.min','jquery.stellar.min','owl.carousel.min','jquery.magnific-popup.min','jquery.animateNumber.min','scrollax.min','google-map','main']) ?>
    <?= $this->fetch('script') ?>
</body>
</html>
