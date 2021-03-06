<?php
/* @var $this SiteController */

/*
 * <div id="messagetoolbar" class="toolbar">
	<ul id="mailtoolbar">
		<li id="Compose"><a href="javascript:mailAction('composeMail');">Compose</a></li>
		<li id="Reply"><a href="javascript:mailAction('Reply');">Reply</a></li>
		<li id="Forward"><a href="javascript:mailAction('Forward');">Forward</a></li>
		<li id="Delete"><a href="javascript:mailAction('Delete');">Delete</a></li>
		</ul>
</div>
 */

?>


<div class="inbox-nav-bar no-content-padding text-left">

	<div class="air air-bottom inbox-space visible-lg visible-md pull-left" style="bottom:0px;position:initial;margin-right:10px;"><span class="mailboxsize"><strong></strong></span>
		<img src="img/logo.svg" alt="emails per account" style="height:25px;margin-left:4px;margin-bottom:2px;"><a href="javascript:void(0);" onclick="checkNewEmail();" style="margin-top: 3px;" class="pull-right checknewmail"><i class="fa fa-refresh fa-lg"></i></a><br>
		<div class="progress progress-micro">
			<div class="progress-bar progress-primary"></div>
		</div>
	</div>

	<!--<h1 class="page-title txt-color-blueDark visible-lg visible-md pull-left"><i class="fa fa-fw fa-inbox"></i> Inbox &nbsp;</h1>-->

	<div class="btn-group hidden-lg hidden-md pull-left" style="margin-right:4px;">
		<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<span id="folderSelect"></span> <i class="fa fa-caret-down"></i>
		</button>
		<ul class="dropdown-menu pull-left col-xs-3" id="mobfolder">
		</ul>
	</div>


	<div id="mailIcons" class="" style="display:flex;">

		<button class="btn btn-default visible-sm visible-xs checknewmail" onclick="checkNewEmail();" style="margin-right:2px;">
			<i class="fa fa-refresh"></i>
		</button>

		<button class="btn btn-default visible-sm visible-xs pull-left" style="margin-right:2px;"
				rel="tooltip" title="" data-placement="bottom" data-original-title="Compose New Email"
				type="button" onclick="getDataFromFolder('composeMail');">
			<i class="fa fa-pencil-square-o"></i>
		</button>

		<div class="btn-group pull-left" style="margin-right:2px;">
		<button class="btn btn-default" id="mvFolderButton"
				rel="tooltip" title="" data-toggle="dropdown" data-placement="top" data-original-title="Move to Folder"
				type="button" onclick="">
			<i class="fa fa-folder-open-o fa-lg"></i>
		</button>


		<ul id="mvtofolder" class="dropdown-menu"></ul>
		</div>

		<button class="btn btn-default deletebutton" style="margin-right:2px;"
				rel="tooltip" title="" data-placement="bottom" data-original-title="Trash"
				type="button" onclick="deleteEmail();">
			<i class="fa fa-trash-o fa-lg"></i>
		</button>

		<button class="btn btn-default hidden-xs" style="margin-right:2px;"
				rel="tooltip" title="" data-placement="bottom" data-original-title="Spam"
				type="button" onclick="movetofolder('Spam');">
			<i class="fa fa-ban fa-lg"></i>
		</button>


		<div class="" id="readEmailOpt" style="display:none;">

			<button class="btn btn-default btn-sm dropdown-toggle hidden-xs" onclick="replyToMail();">
				<i class="fa fa-reply"></i> Reply
			</button>

			<button class="btn btn-default btn-sm dropdown-toggle hidden-xs" onclick="forwardMail();">
				<i class="fa fa-arrow-right"></i> Forward
			</button>


			<div class="btn-group">

			<button class="btn btn-default btn-sm dropdown-toggle hidden-xs" data-toggle="dropdown"  style="display:none;" id='rawHead'>
				More <i class="fa fa-angle-down fa-lg"></i>
			</button>

			<ul class="dropdown-menu pull-right">
				<li>
					<a href="javascript:void(0);" onclick="showRawHeader();"><i
							class="fa fa-file-code-o"></i> View Header</a>
				</li>
			</ul>
			</div>

			<div class="btn-group">

			<button class="btn btn-default btn-sm dropdown-toggle visible-xs" data-toggle="dropdown">
				... <i class="fa fa-angle-down fa-lg"></i>
			</button>

			<ul class="dropdown-menu pull-right">
				<li id='replythis'>
					<a href="javascript:void(0);" onclick="replyToMail();"><i
							class="fa fa-reply"></i> Reply</a>
				</li>
				<li id='forwardthis'>
					<a href="javascript:void(0);" onclick="forwardMail();"><i
							class="fa fa-mail-forward"></i> Forward</a>
				</li>
				<li id='rawHead'>
					<a href="javascript:void(0);" onclick="showRawHeader();"><i
							class="fa fa-file-code-o"></i> View Header</a>
				</li>

			</ul>
			</div>

		</div>

		<div class="btn-group" id="boxEmailOption" style="display:none;">
			<button class="btn btn-default btn-sm dropdown-toggle hidden-xs" data-toggle="dropdown">
				More <i class="fa fa-angle-down fa-lg"></i>
			</button>

			<button class="btn btn-default btn-sm dropdown-toggle visible-xs" data-toggle="dropdown">
				... <i class="fa fa-angle-down fa-lg"></i>
			</button>
			<ul class="dropdown-menu pull-right">
				<li id='replythis'>
					<a href="javascript:void(0);" onclick="markAsRead();">Mark as read</a>
				</li>
				<li id='forwardthis'>
					<a href="javascript:void(0);" onclick="markAsUnread();">Mark as unread</a>
				</li>

			</ul>
		</div>

	</div>



	<div id="sendMaildiv" class="col col-xs-6 text-align-right pull-right" style="display:none;">
		<button class="btn btn-primary sendMailButton"
				type="button" onclick="sendMail()">
			Send
		</button>


		<button class="btn btn-danger" style="margin-left:10px;" type="button" rel="tooltip" data-placement="top"
				data-original-title="Discard" onclick="deleteEmail()"><i class="fa fa-trash-o"></i>
		</button>

	</div>

</div>
<div class="clearfix"></div>
<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="inbox-side-bar visible-lg  visible-md">

		<div style="position:relative;">
			<a href="javascript:void(0);" id="compose-mail" class="btn btn-primary btn-block"
			   onclick="getDataFromFolder('composeMail')"> <strong>Compose</strong> </a>

			<h6>  </h6>

			<ul class="inbox-menu-lg" id="folderul">

			</ul>

			<h6> Folders <a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Add Folder" class="pull-right txt-color-darken"><i class="fa fa-plus" onclick="addCustomFolder()"></i></a></h6>
			<ul class="inbox-menu-lg" id="folderulcustom" style="position:relative;margin-bottom:40px;">

			</ul>
		</div>
		<div class="air air-bottom fetch-space" style="bottom:40px;width: 185px;display:none;position:initial;">
		</div>

	</div>

	<div class="table-wrap fadeInRight no-content-padding" style="padding: 0px;">
		<!-- ajax will fill this area -->
		LOADING...
	</div>

</div>

<div id="contextMenu" class="dropdown clearfix">
	<ul class="dropdown-menu" id="contextMenuList" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
		<li><a tabindex="-1" href="javascript:void(0);" id="customRename">Rename</a></li>
		<li><a tabindex="-1" href="javascript:void(0);" id="customDelete">Delete</a></li>
		<li class="divider"></li>
		<li><a tabindex="-1" href="javascript:void(0);" onclick="$('#contextMenu').css('display','none')">Cancel</a></li>
	</ul>
</div>



<script type="text/javascript">


	$(document).ready(function () {
		$(document).on("contextmenu","ul li", function(event) {
			if($(event.target).parent().parent().attr('id')=="folderulcustom"){
				event.preventDefault();
				$("#contextMenu").css({
					display: "block",
					left:  event.pageX,
					top: event.pageY-110
				});
				$("#contextMenu").data('originalElement', event.target);
			}

		});

		$('#customRename').click(function(e){
			var originalElement = $("#contextMenu").data('originalElement');
			renameCustomFolder(originalElement.text,originalElement.id);
			$("#contextMenu").css('display','none');
		});

		$('#customDelete').click(function(e){
			var originalElement = $("#contextMenu").data('originalElement');
			deleteCustomFolder(originalElement.text,originalElement.id);
			$("#contextMenu").css('display','none');
		});

		functionTracer='huina';

		loadInitialPage();
		displayFolder();
		getDataFromFolder('Inbox');
		//currentTab();
		$('#invFriend').css('display','initial');

	});

</script>



