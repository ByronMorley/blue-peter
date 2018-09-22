<div class="blue-peter">
	<div class="container-rel">
		<div class="typography">
            <% include TitlePane %>
			<div class="pane heading sub">
				<div class="section left">
					<h2>$PageTitle</h2>
				</div>
				<div class="section right">
					<ul class="icon-rack">
                        <% if $PreviousBlock %>
							<li><a href="$PreviousBlock.Link"><i class="fa fa-caret-left" aria-hidden="true"></i></a>
							</li>
                        <% end_if %>
                        <% if $NextBlock %>
							<li><a href="$NextBlock.Link"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
							</li>
                        <% end_if %>
					</ul>
				</div>
			</div>
            <% with $Block %>
                $Me
            <% end_with %>
		</div>
		<div class="d-flex block pagination-block">
			<ul class="pagination-lg">
				<li class="page-item"><a class="page-link" href="$Block.PresentationLink"><%t Menu.BACK_TO_MENU %></a></li>
			</ul>
			<ul class="pagination pagination-lg mx-right">
                <% if $BlockList %>
                    <% control $BlockList %>
						<li class="page-item $LinkingMode"><a class="page-link" href="$Link">$Pos</a></li>
                    <% end_control %>
                <% end_if %>
			</ul>
		</div>
	</div>
</div>