<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name', 'Gestion école') }}</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Global Theme Styles -->
	<link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="{{ asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
	<link href="{{ asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/base/custom-style.css')}}" rel="stylesheet" type="text/css" />


	<!--RTL version:<link href="{{ asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

	<!--end::Global Theme Styles -->

	<!--begin::Page Vendors Styles -->
	<link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
		type="text/css" />

	<!--RTL version:<link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
	<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css')}} " rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
	

	<!--RTL version:<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="{{ asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
	class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">

					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__tools">

								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle"
									class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
									<span></span>
								</a>

								<!-- END -->

								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle"
									class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>

								<!-- END -->

								<!-- BEGIN: Responsive Header Menu Toggler -->
								<!-- <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a> -->

								<!-- END -->

								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
									class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>

								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>

					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

						<!-- BEGIN: Horizontal Menu -->


						<!-- END: Horizontal Menu -->

						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar"
							class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width"
										m-dropdown-toggle="click" m-dropdown-persistent="1">
										<a href="#" class="m-nav__link m-dropdown__toggle"
											id="m_topbar_notification_icon">
											<span
												class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
											<span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center"
													style="background: url(../../assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">

													<span class="m-dropdown__header-subtitle">Notifications</span>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand"
															role="tablist">
															<li class="nav-item m-tabs__item">
																<a class="nav-link m-tabs__link active"
																	data-toggle="tab"
																	href="#topbar_notifications_notifications"
																	role="tab">
																	Articles
																</a>
															</li>
															<li class="nav-item m-tabs__item">
																<a class="nav-link m-tabs__link" data-toggle="tab"
																	href="#topbar_notifications_events"
																	role="tab">Evenements</a>
															</li>
															<li class="nav-item m-tabs__item">
																<a class="nav-link m-tabs__link" data-toggle="tab"
																	href="#topbar_notifications_logs"
																	role="tab">Comments</a>
															</li>

														</ul>
														<div class="tab-content">
															<div class="tab-pane active"
																id="topbar_notifications_notifications" role="tabpanel">
																<div class="m-scrollable" data-scrollable="true"
																	data-height="250" data-mobile-height="200">
																	<div
																		class="m-list-timeline m-list-timeline--skin-light">
																		<div class="m-list-timeline__items">
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																				<span class="m-list-timeline__text">12
																					new users registered</span>
																				<span class="m-list-timeline__time">Just
																					now</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span
																					class="m-list-timeline__text">System
																					shutdown <span
																						class="m-badge m-badge--success m-badge--wide">pending</span></span>
																				<span class="m-list-timeline__time">14
																					mins</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span class="m-list-timeline__text">New
																					invoice received</span>
																				<span class="m-list-timeline__time">20
																					mins</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span class="m-list-timeline__text">DB
																					overloaded 80% <span
																						class="m-badge m-badge--info m-badge--wide">settled</span></span>
																				<span class="m-list-timeline__time">1
																					hr</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span
																					class="m-list-timeline__text">System
																					error - <a href="#"
																						class="m-link">Check</a></span>
																				<span class="m-list-timeline__time">2
																					hrs</span>
																			</div>
																			<div
																				class="m-list-timeline__item m-list-timeline__item--read">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span href=""
																					class="m-list-timeline__text">New
																					order received <span
																						class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
																				<span class="m-list-timeline__time">7
																					hrs</span>
																			</div>
																			<div
																				class="m-list-timeline__item m-list-timeline__item--read">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span
																					class="m-list-timeline__text">Production
																					server down</span>
																				<span class="m-list-timeline__time">3
																					hrs</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge"></span>
																				<span
																					class="m-list-timeline__text">Production
																					server up</span>
																				<span class="m-list-timeline__time">5
																					hrs</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="topbar_notifications_events"
																role="tabpanel">
																<div class="m-scrollable" data-scrollable="true"
																	data-height="250" data-mobile-height="200">
																	<div
																		class="m-list-timeline m-list-timeline--skin-light">
																		<div class="m-list-timeline__items">
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																				<a href=""
																					class="m-list-timeline__text">New
																					order received</a>
																				<span class="m-list-timeline__time">Just
																					now</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																				<a href=""
																					class="m-list-timeline__text">New
																					invoice received</a>
																				<span class="m-list-timeline__time">20
																					mins</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																				<a href=""
																					class="m-list-timeline__text">Production
																					server up</a>
																				<span class="m-list-timeline__time">5
																					hrs</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																				<a href=""
																					class="m-list-timeline__text">New
																					order received</a>
																				<span class="m-list-timeline__time">7
																					hrs</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																				<a href=""
																					class="m-list-timeline__text">System
																					shutdown</a>
																				<span class="m-list-timeline__time">11
																					mins</span>
																			</div>
																			<div class="m-list-timeline__item">
																				<span
																					class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																				<a href=""
																					class="m-list-timeline__text">Production
																					server down</a>
																				<span class="m-list-timeline__time">3
																					hrs</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="topbar_notifications_logs"
																role="tabpanel">
																<div class="m-stack m-stack--ver m-stack--general"
																	style="min-height: 180px;">
																	<div
																		class="m-stack__item m-stack__item--center m-stack__item--middle">
																		<span class="">All caught up!<br>No new
																			logs.</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
										m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span
												class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
											<span class="m-nav__link-icon"><i class="flaticon-share"></i></span>
										</a>
										<div class="m-dropdown__wrapper">
											<span
												class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center"
													style="background: url(assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
													<span class="m-dropdown__header-title">Raccourcis</span>
												</div>
												<div class="m-dropdown__body m-dropdown__body--paddingless">
													<div class="m-dropdown__content">
														<div class="data" data="false" data-height="380"
															data-mobile-height="200">
															<div class="m-nav-grid m-nav-grid--skin-light">
																<div class="m-nav-grid__row">
																	<a href="#" class="m-nav-grid__item">
																		<i class="m-nav-grid__icon flaticon-file-2"></i>
																		<span class="m-nav-grid__text">Crée une
																			facture</span>
																	</a>
																	<a href="#" class="m-nav-grid__item">
																		<i class="m-nav-grid__icon flaticon-list-1"></i>
																		<span class="m-nav-grid__text">Ajouter un Bon de
																			commande</span>
																	</a>
																</div>
																<div class="m-nav-grid__row">
																	<a href="#" class="m-nav-grid__item">
																		<i
																			class="m-nav-grid__icon flaticon-user-add"></i>
																		<span class="m-nav-grid__text">Nouveau
																			Client</span>
																	</a>
																	<a href="#" class="m-nav-grid__item">
																		<i
																			class="m-nav-grid__icon flaticon-clipboard"></i>
																		<span class="m-nav-grid__text">Nouveau
																			produit</span>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
										m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<!-- <img src="{{ asset('assets/app/media/img/users/user4.jpg')}}"
													class="m--img-rounded " alt="" /> -->
												<span class="m--marginless">{{ Auth::user()->nom_prof.' '.Auth::user()->prenom_prof }} </span>
											</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span
												class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center"
													style="background-color: #5867dd;">
													<div class="m-card-user m-card-user--skin-dark">

														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">
																{{ Auth::user()->nom_prof.' '.Auth::user()->prenom_prof }} 
															</span>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">Section</span>
															</li>
															<li class="m-nav__item">
															<a href="{{ route('prof.compte.index') }}" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">Changer mot de passe</span>

																		</span>
																	</span>
																</a>
															</li>

															<li class="m-nav__separator m-nav__separator--fit">
															</li>
															<li class="m-nav__item">
																<a href="{{ route('prof.logout') }}"
																	class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
																	onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
																	{{ __('Se déconnecter') }}
																</a>

																<form id="logout-form" action="{{ route('prof.logout') }}"
																	method="POST" style="display: none;">
																	@csrf
																</form>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>

		<!-- END: Header -->

		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
					class="la la-close"></i></button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
					m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
							<a href="{{ route('prof.dashboard') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> 
									<span class="m-menu__link-wrap"> 
										<span class="m-menu__link-text headingstyle">Tableau de Bord</span>
									</span>
								</span></span>
							</a>
						</li>

						
						<li id="evenement" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-user-ok"></i>
								<span class="m-menu__link-text  menuu">Evenements</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li id="index_evenement" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
									<a href="" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
											<span class="m-menu__link-text">Liste des evenements</span>
											<i class=""></i>
										</a>
									</li>
									<li id="create_evenement" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
										<a href="" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
											<span class="m-menu__link-text">Ajouter evenements</span><i class=""></i>
										</a>
									</li>


								</ul>
							</div>
						</li>
					

						{{-- Changer mot de passe --}}

						<li class="m-menu__section ">
							<h4 class="m-menu__section-text">Utilisateur</h4>
							<i class="m-menu__section-icon flaticon-more-v2"></i>
						</li>


						<li id="compte" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-user-ok"></i>
								<span class="m-menu__link-text  menuu">Compte</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu "> 
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li id="change_password" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
										<a href="" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
											<span class="m-menu__link-text">Changer mot de passe</span>
											<i class=""></i>
										</a>
									</li>
								</ul>
							</div>

						</li>






					</ul>
				</div>

				<!-- END: Aside Menu -->
			</div>

			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">

				@yield('content')

			</div>
		</div>

		<!-- end:: Body -->

		<!-- begin::Footer -->
		<footer class="m-grid__item		m-footer ">
			<div class="m-container m-container--fluid m-container--full-height m-page__container">
				<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
					<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						<span class="m-footer__copyright">
							2019 &copy; Solution réaliser par <a href="#" class="m-link">Inkpainter</a>
						</span>
					</div>

				</div>
			</div>
		</footer>

		<!-- end::Footer -->
	</div>

	<!-- end:: Page -->

	<!-- begin::Quick Sidebar -->
	<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
		<div class="m-quick-sidebar__content m--hide">
			<span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
			<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">

				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs"
						role="tab">Traçabilité</a>
				</li>
			</ul>
			<div class="tab-content">

				<div class="tab-pane active" id="m_quick_sidebar_tabs_logs" role="tabpanel">
					<div class="m-list-timeline m-scrollable">
						<div class="m-list-timeline__group">
							<div class="m-list-timeline__heading">
								Suivi de l'application
							</div>
							<div class="m-list-timeline__items">
								<div class="m-list-timeline__item">
									<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
									<a href="" class="m-list-timeline__text">Création d'une facture</a>
									<span class="m-list-timeline__time">5 hrs</span>
								</div>
								<div class="m-list-timeline__item">
									<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
									<a href="" class="m-list-timeline__text">Création d'une facture</a>
									<span class="m-list-timeline__time">6 hrs</span>
								</div>
								<div class="m-list-timeline__item">
									<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
									<a href="" class="m-list-timeline__text"> Ajout d'un nouveau client </a>
									<span class="m-list-timeline__time">7 hrs</span>
								</div>
								<div class="m-list-timeline__item">
									<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
									<a href="" class="m-list-timeline__text">Ajout d'un nouveau produit</a>
									<span class="m-list-timeline__time">7 hrs</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end::Quick Sidebar -->

	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>


	<!--begin::Global Theme Bundle -->
	<script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

	<!--end::Global Theme Bundle -->

	<!--begin::Page Vendors -->
	<script src="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript">
	</script>

	<!--end::Page Vendors -->

	<!--begin::Page Scripts -->
	<script src="{{ asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js')}} " type="text/javascript"></script>

	<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>



	{{-- ckeditor --}}
	<script src="{{ asset('assets/app/js/ckeditor/ckeditor.js') }}"></script>

	<!--end::Page Scripts -->

	@yield('ckeditor')
	@yield('datatable')
	@yield('timepicker')
</body>

<!-- end::Body -->

</html>