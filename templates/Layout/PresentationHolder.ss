<div class="blue-peter">
	<div class="container">
		<h1 class="title bp-main-title">$Title</h1>

        <% if $MenuTemplate %>
            $BluePeterMenu
        <% else %>
			<h1 class="bp-sub-title">$Title</h1>
			<div class="bp-menu">

				<ul class="bp-blockholders">

					<li class="pane bp-blockholder">
						<div class="pane upper-section">
							<div class="section left">
								<h2>Title</h2>
							</div>
							<div class="section right">

							</div>
						</div>
						<ul class="pane bp-blockpages menu-3">
							<li class="bp-blockpage">
								<a href="$Link">
									<div class="triangle-bottomright"></div>
									<i class="fa $Icon" aria-hidden="true"></i>
									<span class="menu-title">$MenuTitle</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
        <% end_if %>
	</div>
</div>