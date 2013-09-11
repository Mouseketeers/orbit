<% if SlideshowSlides %>
<div id="featured" class="slideshow-wrapper hide-for-small">
	<div class="preloader"></div>
	<ul data-orbit data-options="animation:fade;slide_number:false">
		<% control SlideshowSlides %>
		<li data-orbit-slide="slide-$Pos">
			$SlideImage.SetWidth(910)
			<div class="orbit-caption">$Content</div>
		</li>
		<% end_control %>
	</ul>
</div>
<% end_if %>