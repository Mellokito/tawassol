@extends('layouts.admin.app-admin')

@section('content')

 <!-- BEGIN: Subheader -->
 <div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Tableau de bord</h3>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">

    <!--Begin::Section-->
    <div class="row">

        <div class="col-xl-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Dernier cycle
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Cycle</th>
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cycle_scolaires as $cycle_scolaire)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($cycle_scolaire->date_debut)->format('Y') }} - {{ \Carbon\Carbon::parse($cycle_scolaire->date_fin)->format('Y') }}</td>
                                                <td>{{ $cycle_scolaire->date_debut}}</td>
                                                <td>{{ $cycle_scolaire->date_fin }}</td>
                                                <td>
                                                    <a href="{{ route('cycle.dashboard',$cycle_scolaire->id) }}" class="btn btn-outline-primary m-btn m-btn--custom">Gérer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--end::Section-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
        <div class="col-xl-6">

            <!--begin:: Widgets/Activity-->
            <div
                class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Activités
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget17">
                        <div
                            class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-success">
                            <div class="m-widget17__chart">
                                <!-- <canvas id="m_chart_activities"></canvas> -->
                            </div>
                        </div>
                        <div class="m-widget17__stats  m--bg-info">
                            <div class="m-widget17__items m-widget17__items-col1">
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="flaticon-map m--font-brand"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Niveau scolaire
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $niveau_scolaire = App\NiveauScolaire::all();

                                            $total_niveau_scolaire = $niveau_scolaire->count();
                                        @endphp
                                        {{ $total_niveau_scolaire }} niveaux
                                    </span>
                                </div>
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="flaticon-file-2 m--font-info"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Matières
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $matiere = App\Matiere::all();

                                            $total_matiere = $matiere->count();
                                        @endphp
                                        {{ $total_matiere }} matières
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget17__items m-widget17__items-col2">
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="flaticon-photo-camera  m--font-success"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Profs
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $prof = App\Prof::all();

                                            $total_prof = $prof->count();
                                        @endphp
                                        {{ $total_prof }} profs
                                    </span>
                                </div>
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="flaticon-book m--font-danger"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Etudiants
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $etudiant = App\Etudiant::all();

                                            $total_etudiant = $etudiant->count();
                                        @endphp
                                        {{ $total_etudiant }} étudiants
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Activity-->
        </div>
    </div>

    <!--End::Section-->

</div>
@endsection
