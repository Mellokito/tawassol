@extends('layouts.admin.app-cycle')

@section('content')

 <!-- BEGIN: Subheader -->
 <div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
        <h3 class="m-subheader__title ">Cycle scolaire <strong>{{ \Carbon\Carbon::parse($cycle_scolaire->date_debut)->format('Y') }} - {{ \Carbon\Carbon::parse($cycle_scolaire->date_fin)->format('Y') }}</strong></h3>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">

    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">

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
                                        Classes
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $classe = App\ClasseNiveauCycle::all();

                                            $total_classe = $classe->count();
                                        @endphp
                                        {{ $total_classe }} classes
                                    </span>
                                </div>
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="flaticon-file-2 m--font-info"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Etudiants
                                    </span>
                                    <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                        @php
                                            $etudiant = App\Etudiant::all();

                                            $total_etudiant = $etudiant->count();
                                        @endphp
                                        {{ $total_etudiant }} matières
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
