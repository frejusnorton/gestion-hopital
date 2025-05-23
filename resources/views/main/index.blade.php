<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../">
	<!-- Titre du site -->
	<title>@yield('title', 'Polyclinique Biosso - Votre partenaire médical')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description"
		content="Une plateforme moderne dédiée aux services de santé, aux professionnels médicaux et aux patients. Prenez rendez-vous, accédez à des conseils médicaux et bien plus encore." />
	<meta name="keywords"
		content="santé, médecine, hôpital, docteur, pharmacie, consultation, rendez-vous médical, soins, bien-être, plateforme santé" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta property="og:locale" content="fr_FR">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Polyclinique Biosso  - Votre partenaire médical">
	<meta property="og:description"
		content="Accédez facilement aux soins médicaux grâce à notre plateforme de santé en ligne. Trouvez des médecins, pharmacies et services adaptés à vos besoins.">
	<meta property="og:site_name" content="Polyclinique Biosso">
	<link rel="shortcut icon" href="assets/media/logos/logo-pharmacie.jpg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">


	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
				data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
				data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
				data-kt-drawer-toggle="#kt_aside_mobile_toggle">
				<!--begin::Aside Toolbarl-->
				<div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
					<!--begin::User-->
					<div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px">
							<img src="{{ Auth::user()->profil ? asset('storage/' . Auth::user()->profil) : asset('assets/media/avatars/blank.png') }}"
								alt="{{ Auth::user()->nom}} {{ Auth::user()->prenom}}" />
						</div>
						<!--end::Symbol-->
						<!--begin::Wrapper-->
						<div class="aside-user-info flex-row-fluid flex-wrap ms-5">
							<!--begin::Section-->
							<div class="d-flex">
								<!--begin::Info-->
								<div class="flex-grow-1 me-2">
									<!--begin::Username-->
									<a href="#"
										class="text-white text-hover-primary fs-6 fw-bold">{{ Auth::user()->nom}}
										{{ Auth::user()->prenom}}</a>
									<!--end::Username-->
									<!--begin::Description-->
									<span
										class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ Auth::user()->profession->name ?? ""}}
									</span>
									<!--end::Description-->
									<!--begin::Label-->
									<div class="d-flex align-items-center text-success fs-9">
										<span class="bullet bullet-dot bg-success me-1"></span>en ligne
									</div>
									<!--end::Label-->
								</div>
								<!--end::Info-->
								<!--begin::User menu-->
								<div class="me-n2">
									<!--begin::Action-->
									<a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
										data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
										data-kt-menu-overflow="true">
										<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
										<span class="svg-icon svg-icon-muted svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path opacity="0.3"
													d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
													fill="black" />
												<path
													d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</a>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
										data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
													<img src="{{ Auth::user()->profil ? asset('storage/' . Auth::user()->profil) : asset('assets/media/avatars/blank.png') }}"
														alt="{{ Auth::user()->nom}} {{ Auth::user()->prenom}}" />
												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bolder d-flex align-items-center fs-5">
														{{ Auth::user()->nom}} {{ Auth::user()->prenom}}

													</div>
													<a href="#"
														class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email}}</a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<div class="menu-item px-5">
											<a href="{{ route('profil.index', ['user' => Auth::user()->id]) }}" class="menu-link px-5">Mon compte</a>
										</div>
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-5 mb-5" data-kt-menu-trigger="hover"
											data-kt-menu-placement="right-start">
											<a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Langue
													<span
														class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Français
														<img class="w-15px h-15px rounded-1 ms-2"
															src="assets/media/flags/france.svg" alt="" /></span></span>
											</a>

										</div>

										<div class="menu-item px-5">
											<button id="deconnexion" class="btn btn-light-danger px-5">Se déconnecter</button>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->

									</div>
									<!--end::Menu-->
									<!--end::Action-->
								</div>
								<!--end::User menu-->
							</div>
							<!--end::Section-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::User-->
				</div>
				<!--end::Aside Toolbarl-->
				<!--begin::Aside menu-->
				<div class="aside-menu flex-column-fluid">
					<!--begin::Aside Menu-->
					<div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper"
						data-kt-scroll="true" data-kt-scroll-height="auto"
						data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
						data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
						<!--begin::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
							id="#kt_aside_menu" data-kt-menu="true">
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path opacity="0.3"
													d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
													fill="black" />
												<path
													d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Administration</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion">
									<div class="menu-item">
										<a class="menu-link" href="{{route('roles.index')}}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Rôle</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="{{route('permission.index')}}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Permissions</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="{{route('service.index')}}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Services</span>
										</a>
									</div>

									<div class="menu-item">
										<a class="menu-link" href="{{route('profession.index')}}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Professions</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="{{route('admin.index')}}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Administrateurs</span>
										</a>
									</div>


								</div>
							</div>


							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path
													d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
													fill="black" />
												<path opacity="0.3"
													d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
													fill="black" />
												<path opacity="0.3"
													d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Gestions des patients</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion">
									<div class="menu-item">
										<a class="menu-link" href="{{ route('patient.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Listes des patients</span>
										</a>
									</div>
								</div>
							</div>

							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path
													d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
													fill="black" />
												<path opacity="0.3"
													d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
													fill="black" />
												<path opacity="0.3"
													d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Gestions des médécins</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion">
									<div class="menu-item">
										<a class="menu-link" href="#">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Listes des médécins</span>
										</a>
									</div>
								</div>
							</div>

							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path
													d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
													fill="black" />
												<path opacity="0.3"
													d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
													fill="black" />
												<path opacity="0.3"
													d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Suivi des utilisateurs</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion">
									<div class="menu-item">
										<a class="menu-link" href="{{ route('patient.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Activité utilisateur</span>
										</a>
									</div>
								</div>
							</div>

							<div class="menu-item">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path
													d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z"
													fill="black" />
												<path opacity="0.3"
													d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Version 1.0</span>
									</sp>
							</div>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside menu-->

			</div>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" style="" class="header align-items-stretch">
					<!--begin::Brand-->
					<div class="header-brand">
						<!--begin::Logo-->
						<a href="{{route('home')}}">
							<img alt="Logo" src="assets/media/logos/logo-pharmacie.jpg" class="h-25px h-lg-50px" />
						</a>
						<!--end::Logo-->
						<!--begin::Aside minimize-->
						<div id="kt_aside_toggle"
							class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
							data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
							data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr092.svg-->
							<span class="svg-icon svg-icon-1 me-n1 minimize-default">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none">
									<rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1" fill="black" />
									<path
										d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z"
										fill="black" />
									<path opacity="0.5"
										d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z"
										fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
							<span class="svg-icon svg-icon-1 minimize-active">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none">
									<rect opacity="0.3" width="12" height="2" rx="1"
										transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
									<path
										d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
										fill="black" />
									<path
										d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
										fill="#C4C4C4" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside minimize-->
						<!--begin::Aside toggle-->
						<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
							<div class="btn btn-icon btn-active-color-primary w-30px h-30px"
								id="kt_aside_mobile_toggle">
								<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none">
										<path
											d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
											fill="black" />
										<path opacity="0.3"
											d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
											fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
						</div>
						<!--end::Aside toggle-->
					</div>
					<!--end::Brand-->
					<div class="toolbar">
						@yield('toolbar')
						<!--end::Toolbar-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Post-->
					<div class="post d-flex flex-column-fluid" id="kt_post">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							@yield('content')
						</div>
						<!--end::Container-->
					</div>
					<!--end::Post-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
					<!--begin::Container-->
					<div
						class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
						<!--begin::Copyright-->
						<div class="text-dark order-2 order-md-1">
							<span class="text-muted fw-bold me-1">2025©</span>
							<a href="https://keenthemes.com" class="text-gray-800 text-hover-primary">Polyclinique
								Biosso</a>
						</div>
						<!--end::Copyright-->
						<!--begin::Menu-->
						<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
							<li class="menu-item">
								<a href="#" class="menu-link px-2">A propos</a>
							</li>
							<li class="menu-item">
								<a href="#" class="menu-link px-2">Support</a>
							</li>

						</ul>
						<!--end::Menu-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->





	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
					fill="black" />
				<path
					d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
					fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->
	<!--end::Main-->
	<script>var hostUrl = "assets/";</script>

	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>

	<script src="assets/js/custom/widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script>
    @include('main.js')
	@yield('scripts')
</body>
<!--end::Body-->

</html>