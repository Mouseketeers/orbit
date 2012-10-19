
<% if SlideshowSlides %>
<% require javascript(orbit/javascript/slideshow.js) %>
<div id="slideshow">
	<% control SlideshowSlides %>
	<div>
		$SlideImage.CroppedImage(910,300)
		<div class="content typography"><span class="description">$Content</span></div>
	</div>
	<% end_control %>
</div>
<% end_if %>