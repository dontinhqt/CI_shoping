<link rel="stylesheet" type="text/css" href="http://www.javascriptkit.com/script/script2/cssverticalmenu.css" />

<script type="text/javascript" src="http://www.javascriptkit.com/script/script2/cssverticalmenu.js"></script>
<style type="text/css">
/*#left{
float:left;
width:150px;
}
*/

#left ul{
list-style-type:none;
padding:0px;
margin:0px;
}

#left ul a{
width:125px;
padding-left:25px;
display:block;
line-height:18px;
color: #666666;
background:#EEEEEE url(arrow.gif) no-repeat 11px 7px;
border-bottom:1px solid #FFFFFF;
text-decoration:none;
border-top:1px solid #CCCCCC;
}

#left ul a:hover{
background: #99CC66 url(arrow.gif) no-repeat 11px 7px;
}

	/* demo sub menu basic */
#left li{
position: relative;
}

#left li ul{ /*SUB MENU STYLE*/
position: absolute;
width: 150px; /*WIDTH OF SUB MENU ITEMS*/
left: 0;
top: 0;
display: none;
}

#left li ul li{
float: left;
}

#left li ul a{
width: 140px; /*WIDTH OF SUB MENU ITEMS - 10px padding-left for A elements */
}

#left .arrowdiv{
position: absolute;
right: 2px;
background: transparent url(arrow.gif) no-repeat center right;
}

</style>
<!-- <div id="left">
<ul id="verticalmenu" class="glossymenu">
<li><a href="http://www.javascriptkit.com/">JavaScript Kit</a></li>
<li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Free JavaScripts</a></li>
<li><a href="http://www.javascriptkit.com/">JavaScript Tutorials</a></li>
<li><a href="#">References</a>
    <ul>
    <li><a href="http://www.javascriptkit.com/jsref/">JavaScript Reference</a></li>
    <li><a href="http://www.javascriptkit.com/domref/">DOM Reference</a></li>
    <li><a href="http://www.javascriptkit.com/dhtmltutors/cssreference.shtml">CSS Reference</a></li>
    </ul>
</li>
<li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >DHTML/ CSS Tutorials</a></li>
<li><a href="http://www.javascriptkit.com/howto/">web Design Tutorials</a></li>
<li><a href="#" >Helpful Resources</a>
    <ul>
    <li><a href="http://www.dynamicdrive.com">Dynamic HTML</a></li>
    <li><a href="http://www.codingforums.com">Coding Forums</a></li>
    <li><a href="http://www.cssdrive.com">CSS Drive</a></li>
    <li><a href="http://www.dynamicdrive.com/style/">CSS Library</a></li>
    <li><a href="http://tools.dynamicdrive.com/imageoptimizer/">Image Optimizer</a></li>
    <li><a href="http://tools.dynamicdrive.com/favicon/">Favicon Generator</a></li>
    </ul>
</li>
</ul>
</div> -->
<div id="left">
<h3>Danh Mục Sản Phẩm</h3>
	<?php
	echo $menu;
	?>
</div>
<script>
	$(document).ready(function(){
		$('#left ul:first').attr("id","verticalmenu");
	})
</script>