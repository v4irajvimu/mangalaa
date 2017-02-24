<style type="text/css">
/* Style the buttons that are used to open and close the accordion panel */
button.accordion {
	background-color: #eee;
	color: #444;
	cursor: pointer;
	padding: 18px;
	width: 100%;
	text-align: left;
	border: none;
	outline: none;
	transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
	background-color: #ddd;
}

/* Style the accordion panel. Note: hidden by default */
div.panel {
	padding: 0 18px;
	background-color: white;
	display: none;
}

.pnl_row h3{
	font-size: 15px;
	margin-left: 45px;
}

.pnl_row h5{
	font-size: 12px;
	font-weight: normal;
	margin-left: 73px;
}
.pnl_row span{
	margin-right: 10px;
}

</style>

<script type="text/javascript">
$(document).ready(function(){
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        	panel.style.display = "none";
        } else {
        	panel.style.display = "block";
        }
    }
}

$(".accordion").each(function(){
	add_cont($(this));
});

function add_cont(obj){
	var pkg_id = obj.attr('id');
	$.post("index.php/main/load_data/packages/get_pkg_features", {
        pkg_id:pkg_id
    }, function(r){
	       $("panel_"+pkg_id).html(r);

    },"text");
}

$(document).on("click",".accordion", function(){
	
});

});
</script>


<div class="page-top" id="templatemo_about">
</div> <!-- /.page-header -->

<div class="middle-content">
	
		<div class="container">
			<div class="row">
				<h1 class="text-center" style="font-size:35px; margin-bottom: 15px">Packages</h1>
			</div>
		<?php
		foreach ($packages as $value) {
			?>
			<button id="<?=$value->id?>" class="accordion"><span class=" glyphicon glyphicon-camera"></span> <?=$value->name?> <span class="right"><?=$value->total?> LKR</span></button>
			<div class="panel" >
				<div class="container">
					<div class="row">
						<h4><?=$value->desc?></h4>
					</div>
					<div class="row pnl_row" id="panel_<?=$value->id?>">
						<div class="row">
							<h3><span class="glyphicon glyphicon-tags"></span> fgdfsdfs dfsdfs</h3>
							<h5>sdfsdfsdf sdfsdfsdf</h5>
						</div>
						<div class="row">
							<h3><span class="glyphicon glyphicon-tags"></span> hgjghjghj</h3>
							<h5>gdfgr ffgdgdfg</h5>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		?>
		

		



	</div> <!-- /.container -->
</div> <!-- /.middle-content -->
