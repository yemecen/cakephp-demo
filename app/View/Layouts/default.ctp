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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	 <meta name="viewport" content="width=device-with, initial-scale=1.0,width=340"/>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

		<title></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
				 
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

		<link rel="stylesheet" href="">
		<script src=""></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
				<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

		<div class="container">
		    <div class="row">
		    	<nav class="navbar navbar-default">
		        	<a class="navbar-brand" href="/products">
                        <i class="fas fa-home"></i>
                      </a>
		            <div class="container-fluid">
		                <ul class="nav navbar-nav navbar-right">
		                    <!--@if(Session::has('ShoppingCard'))-->
		                    <li class="dropdown">
		                      <a href="shoppingCard"><i class="fas fa-shopping-cart"></i> Sepetim <span class="badge"><!--{{Session::has('ShoppingCard') ? Session::get('ShoppingCard')->cartTotalQuantity : ''}}--></span></a>
		                    </li>
		                     <!--@else-->
		                    <li><a href="shoppingCard"><i class="fas fa-shopping-cart"></i> Sepetim <span class="badge">0</span></a></li>
		                     <!--@endif-->
		                </ul>
		                    
		            </div>
		        </nav>
		    </div>
		</div>
		<div id="content">

			<?php echo $this->fetch('content'); ?>
		</div>

</body>
</html>
