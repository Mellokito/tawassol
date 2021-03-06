@extends('layouts.admin.app-admin')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Tableau de bord</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Utilisateur</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Modifier utilisateur</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
    @include('shared.errors_succes')
    <div class="row">
        <div class="col-lg-12">
            <form class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                action="{{route('utilisateur.update',$utilisateur)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile"
                    id="main_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-progress">

                            <!-- here can place a progress bar-->
                        </div>
                        <div class="m-portlet__head-wrapper">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Modifier Utilisateur
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="btn-group">
                                    <button type="submit"
                                        class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-check"></i>
                                            <span>Enregistrer</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin: Form Body -->
                        <div class="m-portlet__body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">* Nom :</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input class="form-control m-input" type="text" name="nom"
                                                    value="{{ $utilisateur->nom_admin }}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">* Prénom :</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input class="form-control m-input" type="text" name="prenom"
                                                    value="{{ $utilisateur->prenom_admin }}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">* Login :</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input class="form-control m-input" type="text" name="login"
                                                    value="{{ $utilisateur->username }}" autocomplete="off">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="m-form__section m-form__section--first">
                                        
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">* Mot de pass :</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input class="form-control m-input" type="password" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">* Confirmer mot de
                                                passe :</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input class="form-control m-input" type="password"
                                                    name="password_confirmation">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-4 col-sm-12">* Rôle :</label>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <select class="form-control m-input" name="role">
                                                    @foreach ($profils as $profil)
                                                        <option value="{{ $profil->id }}" {{ $utilisateur->profil_id == $profil->id ? 'selected' : '' }}>{{ $profil->nom_profil }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-4 col-sm-12"></label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <label class="m-checkbox">
                                                    <input type="checkbox" {{ $utilisateur->statut == 'Actif' ? 'checked' : ''}} name="statut">Actif
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Portlet-->
        </div>
    </div>
</div>



<script>
    var li  = document.getElementById('utilisateur');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_utilisateur');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>
@endsection