<% if ManagedSlideshowSlides %>
<div id="featured" class="slideshow-wrapper">
	<div class="preloader"></div>
	<ul data-orbit data-options="animation:fade;slide_number:false">
		<% control ManagedSlideshowSlides %>
		<li data-orbit-slide="slide-$Pos">
			$SlideImage
			<% if Content %><div class="orbit-caption">$Content</div><% end_if %>
		</li>
		<% end_control %>
	</ul>
</div>
<% end_if %>