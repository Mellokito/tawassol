<!-- begin::Body -->
@extends('layouts.admin.app')
@section('admin-content')
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
					<a href="{{ route('admin.dashboard') }}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> 
							<span class="m-menu__link-wrap"> 
								<span class="m-menu__link-text headingstyle">Tableau de Bord</span>
							</span>
						</span></span>
					</a>
				</li>

				
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">Paramétrage</h4>
					<i class="m-menu__section-icon flaticon-more-v2"></i>
				</li>

				{{-- Cycle scolaire --}}
				<li id="cycle_scolaire" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
					<a href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-user-ok"></i>
						<span class="m-menu__link-text  menuu">Cycle scolaire</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li id="index_cycle_scolaire" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="{{ route('cycle_scolaire.index') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Liste des cycles scolaires</span>
									<i class=""></i>
								</a>
							</li>
							<li id="create_cycle_scolaire" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('cycle_scolaire.create') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Ajouter cycle scolaire</span><i class=""></i>
								</a>
							</li>


						</ul>
					</div>
				</li>


				{{-- Niveau scolaire --}}
				<li id="niveau" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
					<a href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-user-ok"></i>
						<span class="m-menu__link-text  menuu">Niveau scolaire</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li id="index_niveau" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="{{ route('niveau_scolaire.index') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Liste des niveaux</span>
									<i class=""></i>
								</a>
							</li>
							<li id="create_niveau" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('niveau_scolaire.create') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Ajouter niveau</span><i class=""></i>
								</a>
							</li>
						</ul>
					</div>
				</li>


				{{-- Niveau scolaire --}}
				<li id="matiere" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
					<a href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-user-ok"></i>
						<span class="m-menu__link-text  menuu">Matière</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li id="index_matiere" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="{{ route('matiere.index') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Liste des matières</span>
									<i class=""></i>
								</a>
							</li>
							<li id="create_matiere" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('matiere.create') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Ajouter matière</span><i class=""></i>
								</a>
							</li>
							<li id="import_matiere" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('matiere.import.show') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Importer des matières</span><i class=""></i>
								</a>
							</li>
						</ul>
					</div>
				</li>


				<li id="prof" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
					<a href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-user-ok"></i>
						<span class="m-menu__link-text  menuu">Prof</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu "> 
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li id="index_prof" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('prof.index') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Liste des profs</span>
									<i class=""></i>
								</a>
							</li>
							<li id="index_create" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('prof.create') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Ajouter prof</span>
									<i class=""></i>
								</a>
							</li>

							<li id="import_prof" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="{{ route('prof.import.show') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
									<span class="m-menu__link-text">Importer des profs</span><i class=""></i>
								</a>
							</li>
						</ul>
					</div>
				</li>


				@if(Auth::user()->profil->id == 1)
					<li class="m-menu__section ">
						<h4 class="m-menu__section-text">Administration</h4>
						<i class="m-menu__section-icon flaticon-more-v2"></i>
					</li>


					<li id="utilisateur" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
						<a href="javascript:;" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-icon flaticon-user-ok"></i>
							<span class="m-menu__link-text  menuu">Utilisateurs</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu "> 
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li id="index_utilisateur" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
									<a href="{{ route('utilisateur.index') }}" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span></i>
										<span class="m-menu__link-text">Liste utilisateurs</span><i class=""></i>
									</a>
								</li>
								<li id="create_utilisateur" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
									<a href="{{ route('utilisateur.create') }}" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
										<span class="m-menu__link-text">Ajouter utilisateur</span>
										<i class=""></i>
									</a>
								</li>
							</ul>
						</div>

					</li>
					@endif

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
@endsection

		