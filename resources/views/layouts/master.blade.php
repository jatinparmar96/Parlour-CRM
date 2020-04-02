<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    	<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="fixed-header">
    <!-- BEGIN SIDEBAR -->
        <!-- BEGIN SIDEBPANEL-->

    @include('components.sidebar')
    <!-- END SIDEBAR -->
    <!-- END SIDEBAR -->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container">
      <!-- START PAGE HEADER WRAPPER -->
      <!-- START HEADER -->
      @include('components.header-navbar')
      <!-- END HEADER -->
      <!-- END PAGE HEADER WRAPPER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                @include('components.breadcrumb')
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->

          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            @yield('content')
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->

        </div>


        <!-- END PAGE CONTENT -->
        <!-- START FOOTER -->
        @include('components.footer')
        <!-- END FOOTER -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!--START QUICKVIEW -->
    <div id="quickview" class="quickview-wrapper" data-pages="quickview">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="">
			<a href="#quickview-notes" data-target="#quickview-notes"  data-toggle="tab" role="tab" >Notes</a>
		</li>
		<li>
			<a href="#quickview-alerts" data-target="#quickview-alerts" data-toggle="tab" role="tab">Alerts</a>
		</li>
		<li class="">
			<a class="active" href="#quickview-chat" data-toggle="tab" role="tab">Chat</a>
		</li>
	</ul>
	<a class="btn-icon-link invert quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-icon">close</i></a>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- BEGIN Notes !-->
		<div class="tab-pane no-padding" id="quickview-notes">
			<div class="view-port clearfix quickview-notes" id="note-views">
				<!-- BEGIN Note List !-->
				<div class="view list" id="quick-note-list">
					<div class="toolbar clearfix">
						<ul class="pull-right ">
							<li>
								<a href="#" class="delete-note-link"><i class="pg-icon">trash_alt</i></a>
							</li>
							<li>
								<a href="#" class="new-note-link" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">add</i></a>
							</li>
						</ul>
						<button aria-label="" class="btn-remove-notes btn btn-xs btn-block hide"><i class="pg-icon">close</i>Delete</button>
					</div>
					<ul>
						<!-- BEGIN Note Item !-->
						<li data-noteid="1" class="d-flex justify-space-between">
							<div class="left">
								<!-- BEGIN Note Action !-->
								<div class="form-check warning no-margin">
									<input id="qncheckbox1" type="checkbox" value="1">
									<label for="qncheckbox1"></label>
								</div>
								<!-- END Note Action !-->
								<!-- BEGIN Note Preview Text !-->
								<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
								<!-- BEGIN Note Preview Text !-->
							</div>
							<!-- BEGIN Note Details !-->
							<div class="d-flex right justify-content-end">
								<!-- BEGIN Note Date !-->
								<span class="date">12/12/20</span>
								<a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push">
									<i class="pg-icon">chevron_right</i>
								</a>
								<!-- END Note Date !-->
							</div>
							<!-- END Note Details !-->
						</li>
						<!-- END Note Item !-->
					</ul>
				</div>
				<!-- END Note List !-->
				<div class="view note" id="quick-note">
					<div>
						<ul class="toolbar">
							<li><a href="#" class="close-note-link"><i class="pg-icon">chevron_left</i></a>
							</li>
							<li><a href="#" data-action="Bold" class="fs-12"><i class="pg-icon">format_bold</i></a>
							</li>
							<li><a href="#" data-action="Italic" class="fs-12"><i class="pg-icon">format_italics</i></a>
							</li>
							<li><a href="#" class="fs-12"><i class="pg-icon">link</i></a>
							</li>
						</ul>
						<div class="body">
							<div>
								<div class="top">
									<span>21st april 2020 2:13am</span>
								</div>
								<div class="content">
									<div class="quick-note-editor full-width full-height js-input" contenteditable="true"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Notes !-->
		<!-- BEGIN Alerts !-->
		<div class="tab-pane no-padding" id="quickview-alerts">
			<div class="view-port clearfix" id="alerts">
				<!-- BEGIN Alerts View !-->
				<div class="view bg-white">
					<!-- BEGIN View Header !-->
					<div class="navbar navbar-default navbar-sm">
						<div class="navbar-inner">
							<!-- BEGIN Header Controler !-->
							<a href="javascript:;" class="action p-l-10 link text-color" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
								<i class="pg-icon">more_horizontal</i>
							</a>
							<!-- END Header Controler !-->
							<div class="view-heading">
								Notications
							</div>
							<!-- BEGIN Header Controler !-->
							<a href="#" class="action p-r-10 pull-right link text-color">
								<i class="pg-icon">search</i>
							</a>
							<!-- END Header Controler !-->
						</div>
					</div>
					<!-- END View Header !-->
					<!-- BEGIN Alert List !-->
					<div data-init-list-view="ioslist" class="list-view boreded no-top-border">
						<!-- BEGIN List Group !-->
						<div class="list-view-group-container">
							<!-- BEGIN List Group Header!-->
							<div class="list-view-group-header text-uppercase">
								Calendar
							</div>
							<!-- END List Group Header!-->
							<ul>
								<!-- BEGIN List Group Item!-->
								<li class="alert-list">
									<!-- BEGIN Alert Item Set Animation using data-view-animation !-->
									<a href="javascript:;" class="align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
										<p class="">
											<span class="text-warning fs-10"><i class="pg-icon">circle_fill</i></span>
										</p>
										<p class="p-l-10 overflow-ellipsis fs-12">
											<span class="text-color">David Nester Birthday</span>
										</p>
										<p class="p-r-10 ml-auto fs-12 text-right">
											<span class="text-warning">Today <br></span>
											<span class="text-color">All Day</span>
										</p>
									</a>
									<!-- END Alert Item!-->
									<!-- BEGIN List Group Item!-->
								</li>
								<!-- END List Group Item!-->
							</ul>
						</div>
						<!-- END List Group !-->
						<div class="list-view-group-container">
							<!-- BEGIN List Group Header!-->
							<div class="list-view-group-header text-uppercase">
								Social
							</div>
							<!-- END List Group Header!-->
							<ul>
								<!-- BEGIN List Group Item!-->
								<li class="alert-list">
									<!-- BEGIN Alert Item Set Animation using data-view-animation !-->
									<a href="javascript:;" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
										<p class="">
											<span class="text-complete fs-10"><i class="pg-icon">circle_fill</i></span>
										</p>
										<p class="col overflow-ellipsis fs-12 p-l-10">
											<span class="text-color link">Jame Smith commented on your status<br></span>
											<span class="text-color">“Perfection Simplified - Company Revox"</span>
										</p>
									</a>
									<!-- END Alert Item!-->
								</li>
								<!-- END List Group Item!-->
							</ul>
						</div>
						<div class="list-view-group-container">
							<!-- BEGIN List Group Header!-->
							<div class="list-view-group-header text-uppercase">
								Sever Status
							</div>
							<!-- END List Group Header!-->
							<ul>
								<!-- BEGIN List Group Item!-->
								<li class="alert-list">
									<!-- BEGIN Alert Item Set Animation using data-view-animation !-->
									<a href="#" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
										<p class="">
											<span class="text-danger fs-10"><i class="pg-icon">circle_fill</i></span>
										</p>
										<p class="col overflow-ellipsis fs-12 p-l-10">
											<span class="text-color link">12:13AM GTM, 10230, ID:WR174s<br></span>
											<span class="text-color">Server Load Exceeted. Take action</span>
										</p>
									</a>
									<!-- END Alert Item!-->
								</li>
								<!-- END List Group Item!-->
							</ul>
						</div>
					</div>
					<!-- END Alert List !-->
				</div>
				<!-- EEND Alerts View !-->
			</div>
		</div>
		<!-- END Alerts !-->
		<div class="tab-pane active no-padding" id="quickview-chat">
			<div class="view-port clearfix" id="chat">
				<div class="view bg-white">
					<!-- BEGIN View Header !-->
					<div class="navbar navbar-default">
						<div class="navbar-inner">
							<!-- BEGIN Header Controler !-->
							<a href="javascript:;" class="action p-l-10 link text-color" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
								<i class="pg-icon">add</i>
							</a>
							<!-- END Header Controler !-->
							<div class="view-heading">
								Chat List
								<div class="fs-11">Show All</div>
							</div>
							<!-- BEGIN Header Controler !-->
							<a href="#" class="action p-r-10 pull-right link text-color">
								<i class="pg-icon">more_horizontal</i>
							</a>
							<!-- END Header Controler !-->
						</div>
					</div>
					<!-- END View Header !-->
					<div data-init-list-view="ioslist" class="list-view boreded no-top-border">
						<div class="list-view-group-container">
							<div class="list-view-group-header text-uppercase">
								a</div>
							<ul>
								<!-- BEGIN Chat User List Item  !-->
								<li class="chat-user-list clearfix">
									<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
										<span class="thumbnail-wrapper d32 circular bg-success">
												<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
										</span>
										<p class="p-l-10 ">
											<span class="text-color">ava flores</span>
											<span class="block text-color hint-text fs-12">Hello there</span>
										</p>
									</a>
								</li>
								<!-- END Chat User List Item  !-->
							</ul>
						</div>
					</div>
				</div>
				<!-- BEGIN Conversation View  !-->
				<div class="view chat-view bg-white clearfix">
					<!-- BEGIN Header  !-->
					<div class="navbar navbar-default">
						<div class="navbar-inner">
							<a href="javascript:;" class="link text-color action p-l-10 p-r-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
								<i class="pg-icon">chevron_left</i>
							</a>
							<div class="view-heading">
								John Smith
								<div class="fs-11 hint-text">Online</div>
							</div>
							<a href="#" class="link text-color action p-r-10 pull-right ">
								<i class="pg-icon">more_horizontal</i>
							</a>
						</div>
					</div>
					<!-- END Header  !-->
					<!-- BEGIN Conversation  !-->
					<div class="chat-inner" id="my-conversation">
						<!-- BEGIN From Me Message  !-->
						<div class="message clearfix">
							<div class="chat-bubble from-me">
								Hello there
							</div>
						</div>
						<!-- END From Me Message  !-->
						<!-- BEGIN From Them Message  !-->
						<div class="message clearfix">
							<div class="profile-img-wrapper m-t-5 inline">
								<img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
							</div>
							<div class="chat-bubble from-them">
								Hey
							</div>
						</div>
						<!-- END From Them Message  !-->
						<!-- BEGIN From Me Message  !-->
						<div class="message clearfix">
							<div class="chat-bubble from-me">
								Did you check out Pages framework ?
							</div>
						</div>
						<!-- END From Me Message  !-->
						<!-- BEGIN From Me Message  !-->
						<div class="message clearfix">
							<div class="chat-bubble from-me">
								Its an awesome chat
							</div>
						</div>
						<!-- END From Me Message  !-->
						<!-- BEGIN From Them Message  !-->
						<div class="message clearfix">
							<div class="profile-img-wrapper m-t-5 inline">
								<img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
							</div>
							<div class="chat-bubble from-them">
								Yea
							</div>
						</div>
						<!-- END From Them Message  !-->
					</div>
					<!-- BEGIN Conversation  !-->
					<!-- BEGIN Chat Input  !-->
					<div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
						<div class="row">
							<div class="col-1 p-t-15">
								<a href="#" class="link text-color"><i class="pg-icon">add</i></a>
							</div>
							<div class="col-8 no-padding">
								<label class="d-none">Reply</label>
								<input type="text" class="form-control chat-input" data-chat-input="" data-chat-conversation="#my-conversation" placeholder="Say something">
							</div>
							<div class="col-2 link text-color m-l-10 m-t-15 p-l-10 b-l b-grey col-top">
								<a href="#" class="link text-color"><i class="pg-icon">camera</i></a>
							</div>
						</div>
					</div>
					<!-- END Chat Input  !-->
				</div>
				<!-- END Conversation View  !-->
			</div>
		</div>
	</div>
</div>
    <!-- END QUICKVIEW-->
    <!-- START OVERLAY -->
    <div class="overlay hide" data-pages="search">
	<!-- BEGIN Overlay Content !-->
	<div class="overlay-content has-results m-t-20">
		<!-- BEGIN Overlay Header !-->
		<div class="container-fluid">
			<!-- BEGIN Overlay Logo !-->
			<img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
			<!-- END Overlay Logo !-->
			<!-- BEGIN Overlay Close !-->
			<a href="#" class="close-icon-light btn-link btn-rounded  overlay-close text-black">
				<i class="pg-icon">close</i>
			</a>
			<!-- END Overlay Close !-->
		</div>
		<!-- END Overlay Header !-->
		<div class="container-fluid">
			<!-- BEGIN Overlay Controls !-->
			<input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
			<br>
			<div class="d-flex align-items-center">
				<div class="form-check form-check-inline right m-b-0">
					<input id="checkboxn" type="checkbox" value="1">
					<label for="checkboxn">Search within page</label>
				</div>
				<p class="fs-13 hint-text m-l-10 m-b-0">Press enter to search</p>
			</div>
			<!-- END Overlay Controls !-->
		</div>
		<!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
		<div class="container-fluid p-t-20">
			<span class="hint-text">
						suggestions :
				</span>
			<span class="overlay-suggestions"></span>
			<br>
			<div class="search-results m-t-30">
				<p class="bold">Pages Search Results: <span class="overlay-suggestions"></span></p>
				<div class="row">
					<div class="col-md-6">
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white ">
									<img width="36" height="36" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> on pages</h5>
								<p class="small-text hint-text">via john smith</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white ">
								<div>T</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> related topics</h5>
								<p class="small-text hint-text">via pages</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white ">
								<div>M
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> music</h5>
								<p class="small-text hint-text">via pagesmix</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
					</div>
					<div class="col-md-6">
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-info text-white d-flex align-items-center">
								<i class="pg-icon">facebook</i>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> on facebook</h5>
								<p class="small-text hint-text">via facebook</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-complete text-white d-flex align-items-center">
								<i class="pg-icon">twitter</i>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin ">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
								<p class="small-text hint-text">via twitter</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="d-flex m-t-15">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular text-white bg-danger d-flex align-items-center">
								<i class="pg-icon">google_plus</i>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10">
								<h5 class="no-margin ">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
								<p class="small-text hint-text">via google plus</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
					</div>
				</div>
			</div>
		</div>
		<!-- END Overlay Search Results !-->
	</div>
	<!-- END Overlay Content !-->
</div>
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
        <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/popper/umd/popper.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>
