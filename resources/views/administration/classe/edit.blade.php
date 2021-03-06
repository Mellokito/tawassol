@extends('layouts.admin.app-cycle')

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
                    <a href="{{ route('cycle.classe.index',$cycle_scolaire) }}" class="m-nav__link">
                        <span class="m-nav__link-text">Classes</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Modifier classe</span>
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
                action="{{route('cycle.classe.update',[$classe->id, $cycle_scolaire])}}" method="POST" enctype="multipart/form-data">
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
                                        Modifier classe du cycle scolaire &nbsp;<strong>{{ \Carbon\Carbon::parse($cycle_scolaire->date_debut)->format('Y') }} - {{ \Carbon\Carbon::parse($cycle_scolaire->date_fin)->format('Y') }}</strong> 
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
                                <div class="col-xl-12">
                                        <div class="m-form__section m-form__section--first">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Niveau :</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <select class="form-control m-input m_selectpicker" name="niveau" data-live-search="true" title="">
                                                        @foreach ($categorie_niveau_scolaires as $categorie_niveau_scolaire)
                                                        <optgroup label="{{$categorie_niveau_scolaire->nom_categorie}}">
                                                            @foreach ($niveau_scolaires as $niveau_scolaire)
                                                            @if ($categorie_niveau_scolaire->id == $niveau_scolaire->categorie_niveau)
                                                                <option value="{{$niveau_scolaire->id}}" {{ $classe_niveau->id_niveau_scolaire == $niveau_scolaire->id ? 'selected' : '' }}>
                                                                    {{$niveau_scolaire->nom_niveau_scolaire }}
                                                                </option>
                                                            @endif    
                                                            
                                                            @endforeach
                                                            
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Nom :</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input class="form-control m-input" type="text" name="nom" value="{{ $classe->nom_classe }}">
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
    var li  = document.getElementById('classe');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_classe');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>

@endsection