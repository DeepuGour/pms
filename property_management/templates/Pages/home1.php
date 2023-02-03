<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
            </a>
            <h1>
                Welcome to CakePHP <?= h(Configure::version()) ?> Strawberry (🍓)
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="message default text-center">
                            <small>Please be aware that this page will not be shown if you turn off debug mode unless you replace templates/Pages/home.php with your own version.</small>
                        </div>
                        <div id="url-rewriting-warning" style="padding: 1rem; background: #fcebea; color: #cc1f1a; border-color: #ef5753;">
                            <ul>
                                <li class="bullet problem">
                                    URL rewriting is not properly configured on your server.<br />
                                    1) <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/installation.html#url-rewriting">Help me configure it</a><br />
                                    2) <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                                </li>
                            </ul>
                        </div>
                        <?php Debugger::checkSecurityKeys(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h4>Environment</h4>
                        <ul>
                        <?php if (version_compare(PHP_VERSION, '7.4.0', '>=')) : ?>
                            <li class="bullet success">Your version of PHP is 7.4.0 or higher (detected <?= PHP_VERSION ?>).</li>
                        <?php else : ?>
                            <li class="bullet problem">Your version of PHP is too low. You need PHP 7.4.0 or higher to use CakePHP (detected <?= PHP_VERSION ?>).</li>
                        <?php endif; ?>

                        <?php if (extension_loaded('mbstring')) : ?>
                            <li class="bullet success">Your version of PHP has the mbstring extension loaded.</li>
                        <?php else : ?>
                            <li class="bullet problem">Your version of PHP does NOT have the mbstring extension loaded.</li>
                        <?php endif; ?>

                        <?php if (extension_loaded('openssl')) : ?>
                            <li class="bullet success">Your version of PHP has the openssl extension loaded.</li>
                        <?php elseif (extension_loaded('mcrypt')) : ?>
                            <li class="bullet success">Your version of PHP has the mcrypt extension loaded.</li>
                        <?php else : ?>
                            <li class="bullet problem">Your version of PHP does NOT have the openssl or mcrypt extension loaded.</li>
                        <?php endif; ?>

                        <?php if (extension_loaded('intl')) : ?>
                            <li class="bullet success">Your version of PHP has the intl extension loaded.</li>
                        <?php else : ?>
                            <li class="bullet problem">Your version of PHP does NOT have the intl extension loaded.</li>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Filesystem</h4>
                        <ul>
                        <?php if (is_writable(TMP)) : ?>
                            <li class="bullet success">Your tmp directory is writable.</li>
                        <?php else : ?>
                            <li class="bullet problem">Your tmp directory is NOT writable.</li>
                        <?php endif; ?>

                        <?php if (is_writable(LOGS)) : ?>
                            <li class="bullet success">Your logs directory is writable.</li>
                        <?php else : ?>
                            <li class="bullet problem">Your logs directory is NOT writable.</li>
                        <?php endif; ?>

                        <?php $settings = Cache::getConfig('_cake_core_'); ?>
                        <?php if (!empty($settings)) : ?>
                            <li class="bullet success">The <em><?= h($settings['className']) ?></em> is being used for core caching. To change the config edit config/app.php</li>
                        <?php else : ?>
                            <li class="bullet problem">Your cache is NOT working. Please check the settings in config/app.php</li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column">
                        <h4>Database</h4>
                        <?php
                        $result = $checkConnection('default');
                        ?>
                        <ul>
                        <?php if ($result['connected']) : ?>
                            <li class="bullet success">CakePHP is able to connect to the database.</li>
                        <?php else : ?>
                            <li class="bullet problem">CakePHP is NOT able to connect to the database.<br /><?= h($result['error']) ?></li>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>DebugKit</h4>
                        <ul>
                        <?php if (Plugin::isLoaded('DebugKit')) : ?>
                            <li class="bullet success">DebugKit is loaded.</li>
                            <?php
                            $result = $checkConnection('debug_kit');
                            ?>
                            <?php if ($result['connected']) : ?>
                                <li class="bullet success">DebugKit can connect to the database.</li>
                            <?php else : ?>
                                <li class="bullet problem">DebugKit is <strong>not</strong> able to connect to the database.<br /><?= $result['error'] ?></li>
                            <?php endif; ?>
                        <?php else : ?>
                            <li class="bullet problem">DebugKit is <strong>not</strong> loaded.</li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>Getting Started</h3>
                        <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/">CakePHP Documentation</a>
                        <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/tutorials-and-examples/cms/installation.html">The 20 min CMS Tutorial</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>Help and Bug Reports</h3>
                        <a target="_blank" rel="noopener" href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
                        <a target="_blank" rel="noopener" href="http://cakesf.herokuapp.com/">Slack</a>
                        <a target="_blank" rel="noopener" href="https://github.com/cakephp/cakephp/issues">CakePHP Issues</a>
                        <a target="_blank" rel="noopener" href="http://discourse.cakephp.org/">CakePHP Forum</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>Docs and Downloads</h3>
                        <a target="_blank" rel="noopener" href="https://api.cakephp.org/">CakePHP API</a>
                        <a target="_blank" rel="noopener" href="https://bakery.cakephp.org">The Bakery</a>
                        <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/">CakePHP Documentation</a>
                        <a target="_blank" rel="noopener" href="https://plugins.cakephp.org">CakePHP plugins repo</a>
                        <a target="_blank" rel="noopener" href="https://github.com/cakephp/">CakePHP Code</a>
                        <a target="_blank" rel="noopener" href="https://github.com/FriendsOfCake/awesome-cakephp">CakePHP Awesome List</a>
                        <a target="_blank" rel="noopener" href="https://www.cakephp.org">CakePHP</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>Training and Certification</h3>
                        <a target="_blank" rel="noopener" href="https://cakefoundation.org/">Cake Software Foundation</a>
                        <a target="_blank" rel="noopener" href="https://training.cakephp.org/">CakePHP Training</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
     <!-- <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Properties</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-properties owl-carousel">
              <div class="item">
                <div class="property-wrap ftco-animate">
		        			<a href="#" class="img" style="background-image: url(/img/work-1.jpg);">
		        				<div class="rent-sale">
		        					<span class="sale">Sale</span>
		        				</div>
		        				<p class="price"><span class="orig-price">$300,000</span></p>
		        			</a>
		        			<div class="text">
		        				<ul class="property_list">
		        					<li><span class="flaticon-bed"></span>3</li>
		        					<li><span class="flaticon-bathtub"></span>2</li>
		        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
		        				</ul>
		        				<h3><a href="#">The Blue Sky Home</a></h3>
		        				<span class="location">Oakland</span>
		        				<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
		        					<span class="fa fa-link"></span>
		        				</a>
		        				<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
		        					<div class="d-flex align-items-center">
			        					<div class="img" style="background-image: url(/img/person_1.jpg);"></div>
			        					<h3 class="ml-2">John Dorf</h3>
			        				</div>
			        				<span class="text-right">2 weeks ago</span>
		        				</div>
		        			</div>
		        		</div>
              </div>
              <div class="item">
                <div class="property-wrap ftco-animate">
		        			<a href="#" class="img" style="background-image: url(/img/work-2.jpg);">
		        				<div class="rent-sale">
		        					<span class="rent">Rent</span>
		        				</div>
		        				<p class="price"><span class="old-price">800,000</span><span class="orig-price">$3,050<small> / mo</small></span></p>
		        			</a>
		        			<div class="text">
		        				<ul class="property_list">
		        					<li><span class="flaticon-bed"></span>3</li>
		        					<li><span class="flaticon-bathtub"></span>2</li>
		        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
		        				</ul>
		        				<h3><a href="#">The Blue Sky Home</a></h3>
		        				<span class="location">Oakland</span>
		        				<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
		        					<span class="fa fa-link"></span>
		        				</a>
		        				<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
		        					<div class="d-flex align-items-center">
			        					<div class="img" style="background-image: url(/img/person_1.jpg);"></div>
			        					<h3 class="ml-2">John Dorf</h3>
			        				</div>
			        				<span class="text-right">2 weeks ago</span>
		        				</div>
		        			</div>
		        		</div>
              </div>
              <div class="item">
                <div class="property-wrap ftco-animate">
		        			<a href="#" class="img" style="background-image: url(/img/work-3.jpg);">
		        				<div class="rent-sale">
		        					<span class="rent">Rent</span>
		        				</div>
		        				<p class="price"><span class="orig-price">$300<small> / mo</small></span></p>
		        			</a>
		        			<div class="text">
		        				<ul class="property_list">
		        					<li><span class="flaticon-bed"></span>3</li>
		        					<li><span class="flaticon-bathtub"></span>2</li>
		        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
		        				</ul>
		        				<h3><a href="#">The Blue Sky Home</a></h3>
		        				<span class="location">Oakland</span>
		        				<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
		        					<span class="fa fa-link"></span>
		        				</a>
		        				<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
		        					<div class="d-flex align-items-center">
			        					<div class="img" style="background-image: url(/img/person_1.jpg);"></div>
			        					<h3 class="ml-2">John Dorf</h3>
			        				</div>
			        				<span class="text-right">2 weeks ago</span>
		        				</div>
		        			</div>
		        		</div>
              </div>
              <div class="item">
                <div class="property-wrap ftco-animate">
		        			<a href="#" class="img" style="background-image: url(/img/work-4.jpg);">
		        				<div class="rent-sale">
		        					<span class="rent">Rent</span>
		        				</div>
		        				<p class="price"><span class="orig-price">$300<small> / mo</small></span></p>
		        			</a>
		        			<div class="text">
		        				<ul class="property_list">
		        					<li><span class="flaticon-bed"></span>3</li>
		        					<li><span class="flaticon-bathtub"></span>2</li>
		        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
		        				</ul>
		        				<h3><a href="#">The Blue Sky Home</a></h3>
		        				<span class="location">Oakland</span>
		        				<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
		        					<span class="fa fa-link"></span>
		        				</a>
		        				<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
		        					<div class="d-flex align-items-center">
			        					<div class="img" style="background-image: url(/img/person_1.jpg);"></div>
			        					<h3 class="ml-2">John Dorf</h3>
			        				</div>
			        				<span class="text-right">2 weeks ago</span>
		        				</div>
		        			</div>
		        		</div>
              </div>
              <div class="item">
                <div class="property-wrap ftco-animate">
		        			<a href="#" class="img" style="background-image: url(/img/work-5.jpg);">
		        				<div class="rent-sale">
		        					<span class="rent">Rent</span>
		        				</div>
		        				<p class="price"><span class="orig-price">$300<small> / mo</small></span></p>
		        			</a>
		        			<div class="text">
		        				<ul class="property_list">
		        					<li><span class="flaticon-bed"></span>3</li>
		        					<li><span class="flaticon-bathtub"></span>2</li>
		        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
		        				</ul>
		        				<h3><a href="#">The Blue Sky Home</a></h3>
		        				<span class="location">Oakland</span>
		        				<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
		        					<span class="fa fa-link"></span>
		        				</a>
		        				<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
		        					<div class="d-flex align-items-center">
			        					<div class="img" style="background-image: url(/img/person_1.jpg);"></div>
			        					<h3 class="ml-2">John Dorf</h3>
			        				</div>
			        				<span class="text-right">2 weeks ago</span>
		        				</div>
		        			</div>
		        		</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Properties</span>
            <h2 class="mb-2">Properties for this Cities</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-4">
    				<a href="#" class="search-place img" style="background-image: url(/img/place-1.jpg);">
							<div class="desc">
								<h3><span>Miami</span></h3>
								<span>24 Properties</span>
							</div>
    				</a>
    			</div>
    			<div class="col-md-4">
    				<a href="#" class="search-place img" style="background-image: url(/img/place-2.jpg);">
							<div class="desc">
								<h3><span>Chicago</span></h3>
								<span>20 Properties</span>
							</div>
    				</a>
    			</div>
    			<div class="col-md-4">
    				<a href="#" class="search-place img" style="background-image: url(/img/place-3.jpg);">
							<div class="desc">
								<h3><span>Illinoi</span></h3>
								<span>15 Properties</span>
							</div>
    				</a>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section services-section bg-darken">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Work flow</span>
            <h2 class="mb-3">How it works</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">[Mon Jan 30 15:54:15 2023] 127.0.0.1:59978 Closing
              <div class="media-body py-md-4 text-center">
              	<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>01</span>
              	<img src="/img/blob.svg" alt="">
              	</div>
                <h3>Evaluate Property</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>02</span>
              	<img src="/img/blob.svg" alt=""></div>
                <h3>Meet Your Agent</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>03</span>
              	<img src="/img/blob.svg" alt=""></div>
                <h3>Close the Deal</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>04</span>
              	<img src="/img/blob.svg" alt=""></div>
                <h3>Have Your Property</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-7 order-md-last d-flex align-items-stretch">
						<div class="img w-100 img-2 mr-md-2" style="background-image: url(/img/about.jpg);"></div>
						<div class="img w-100 img-2 ml-md-2" style="background-image: url(/img/about-2.jpg);"></div>
					</div>
					<div class="col-md-5 wrap-about py-md-5 ftco-animate">
	          <div class="heading-section pr-md-5">
	            <h2 class="mb-4">Ecoverde Real Estate</h2>

	            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-counter img" id="section-counter">
    	<div class="container">
    		<div class="row pt-md-5">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1000">0</strong>
                <span>Area <br>Population</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2500">0</strong>
                <span>Total <br>Properties</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="500">0</strong>
                <span>Average <br>House</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                  	<span class="fa fa-quote-left"></span>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(/img/person_1.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                  	<span class="fa fa-quote-left"></span>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(/img/person_2.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                  	<span class="fa fa-quote-left"></span>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(/img/person_3.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                  	<span class="fa fa-quote-left"></span>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(/img/person_1.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                  	<span class="fa fa-quote-left"></span>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(/img/person_2.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-agent">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Agents</span>
            <h2 class="mb-4">Our Agents</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="/img/team-1.jpg" class="img-fluid" alt="Colorlib Template">
		    				<div class="desc">
		    					<h3><a href="properties.html">Carlos Henderson</a></h3>
									<p class="h-info"><span class="location">Listing</span> <span class="details">10 Properties</span></p>
		    				</div>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="/img/team-2.jpg" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Mike Bochs</a></h3>
								<p class="h-info"><span class="location">Listing</span> <span class="details">10 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="/img/team-3.jpg" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Jessica Moore</a></h3>
								<p class="h-info"><span class="location">Listing</span> <span class="details">10 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="/img/team-4.jpg" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Sarah Geronimo</a></h3>
								<p class="h-info"><span class="position">Listing</span> <span class="details">10 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        </div>
    	</div>
    </section>


    <section class="ftco-section ftco-no-pt">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
                <a href="blog-single.html" class="block-20 img" style="background-image: url('/img/image_1.jpg');">
	              </a>
	              <div class="meta mb-3">
                  <div><a href="#">June 01, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
	              <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
                <a href="blog-single.html" class="block-20 img" style="background-image: url('/img/image_2.jpg');">
	              </a>
	              <div class="meta mb-3">
                  <div><a href="#">June 01, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
	              <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
                <a href="blog-single.html" class="block-20 img" style="background-image: url('/img/image_3.jpg');">
	              </a>
	              <div class="meta mb-3">
                  <div><a href="#">June 01, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
	              <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
                <a href="blog-single.html" class="block-20 img" style="background-image: url('/img/image_4.jpg');">
	              </a>
	              <div class="meta mb-3">
                  <div><a href="#">June 01, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
	              <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>		

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Ecoverde</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Community</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Search Properties</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>For Agents</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Reviews</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>FAQs</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Our Story</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Meet the team</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Press</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon fa fa-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div> -->
</body>
</html>
