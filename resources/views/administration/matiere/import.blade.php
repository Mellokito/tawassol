@extends('layouts.admin.app-admin')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('admin.dashboard') }}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__item">
                    <a href="{{ route('matiere.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">Matière</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Importer des matières</span>
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
            action="{{route('matiere.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-progress">

                            <!-- here can place a progress bar-->
                        </div>
                        <div class="m-portlet__head-wrapper">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Importer des matières
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="btn-group mr-4">
                                    <a href="{{ route('matiere.telecharger') }}" class="btn btn-dark  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-file"></i>
                                            <span>Exemple de fichier</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <button type="submit"
                                        class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-check"></i>
                                            <span>Importer</span>
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
                                        @if (session()->has('failures'))
                                        <table class="table table-danger">
                                            <thead>
                                                <th>Ligne</th>
                                                <th>Champs</th>
                                                <th>Erreurs</th>
                                                <th>Valeur</th>
                                            </thead>
                                            <tbody>
                                            @foreach (session()->get('failures') as $validation)
                                                <tr>
                                                    <td>{{ $validation->row() }}</td>
                                                    <td>{{ $validation->attribute() }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($validation->errors() as $error)
                                                                <li>{{ $error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>{{ $validation->values()[$validation->attribute()] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                        <div class="m-form__section">
                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">* Fichier :</label>
                                                <div></div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="fichier">
                                                    <label class="custom-file-label" for="customFile">Séléctionner un fichier</label>
                                                </div>
                                            </div>
                                            <span>Type de fichier : .xlsx, .xls</span>
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
    var li  = document.getElementById('matiere');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('import_matiere');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>
@endsection