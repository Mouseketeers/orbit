<% if ManagedSlideshowSlides %>
<div id="featured" class="slideshow-wrapper">
	<div class="preloader"></div>
	<ul data-orbit data-options="animation:fade;slide_number:false">
		<% control ManagedSlideshowSlides %>
		<li data-orbit-slide="slide-$Pos">
			<% if Link %><a href="$Link.URLSegment" data-title="$SlideImage.Title"<% if LinkTargetBlank %> target="_blank"<% end_if %>>$SlideImage</a>
			<% else_if ExternalLink %><a href="$ExternalLink" data-title="$SlideImage.Title"<% if LinkTargetBlank %> target="_blank"<% end_if %>>$SlideImage</a>
			<% else %><div data-title="$SlideImage.Title">$SlideImage</div><% end_if %>
			<% if Content %><div class="orbit-caption">$Content</div><% end_if %>
		</li>
		<% end_control %>
	</ul>
</div>
<% end_if %>