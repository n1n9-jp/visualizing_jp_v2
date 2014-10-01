<footer id="content-info" class="container container_12" role="contentinfo">
	<div class="grid_12">

		<div class="footer-column">
				<h4>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></h4>
				<?php dynamic_sidebar('sidebar-footer'); ?>
		</div>

		<div class="footer-column">
			<ul>
			<h4 class="header-underline">category</h4>
				<li class="menu-dataset"><a href="http://localhost:8888/visualizing_jp/category/dataset/">データセット</a></li>
				<li class="menu-method"><a href="http://localhost:8888/visualizing_jp/category/method/">メソッド</a></li>
				<li class="menu-framework"><a href="http://localhost:8888/visualizing_jp/category/framework/">フレームワーク</a></li>
				<li class="active menu-showcase"><a href="http://localhost:8888/visualizing_jp/category/showcase/">ショーケース</a></li>
				<li class="menu-event"><a href="http://localhost:8888/visualizing_jp/category/event/">イベント</a></li>
			</ul>
		</div>

		<div class="footer-column last">
			<ul>
				<h4 class="header-underline">about:</h4>
				<li><a href="http://localhost:8888/visualizing_jp/about/">visualizing.jpについて</a></li>
				<li><a href="http://localhost:8888/visualizing_jp/contact/">コンタクト</a></li>
				<li><a href="https://www.facebook.com/pages/visualizingjp/175190925974218">Facebook</a></li>
				<li><a href="https://twitter.com/visualizing_jp">Twitter</a></li>
				<li><a href="https://plus.google.com/+VisualizingJp/">Google+</a></li>
			</ul>
		</div>

	</div>
</footer>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>