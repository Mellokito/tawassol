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
                    <a href="{{ route('matiere.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">Classes</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Liste des classes
                        </span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
    @include('shared.errors_succes')

    <form action="{{ route('cycle.classe.classe_cycle.store',$cycle_scolaire) }}" method="POST">
        @csrf
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Liste des classes du cycle scolaire &nbsp;<strong>{{ \Carbon\Carbon::parse($cycle_scolaire->date_debut)->format('Y') }} - {{ \Carbon\Carbon::parse($cycle_scolaire->date_fin)->format('Y') }}</strong> 
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <button type="submit" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                            <i class="la la-plus-check"></i>&nbsp; Enregistrer
                        </button>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="list_items" >
                <thead>
                    <th><input type="checkbox" class="selectall" /></th>
                    <th>Niveau</th>
                    <th>Nom</th>
                </thead>
                <tbody>
                    @foreach ($classe_cycle as $classe)
                    <tr>
                        {{-- {{ dd($matiere->categorie) }} --}}
                        <td>
                            <input type="checkbox" class="selectbox" name="ids[]" value="{{ $classe->id_classe_cycle }}">
                        </td>
                        <td>
                            {{ $classe->nom_niveau_scolaire }}
                        </td>
                        <td>
                            {{ $classe->nom_classe }}
                        </td>
                    
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </form>

    <!-- END EXAMPLE TABLE PORTLET-->
</div>

@section('datatable')
<script>
		$("#list_items").dataTable({
			"order": [
				[1, "desc"]
			],
			"language": {
					"sProcessing": "Traitement en cours ...",
					"sLengthMenu": "Afficher _MENU_ lignes",
					"sZeroRecords": "Aucun résultat trouvé",
					"sEmptyTable": "Aucune donnée disponible",
					"sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
					"sInfoEmpty": "Aucune ligne affichée",
					"sInfoFiltered": "(Filtrer un maximum de_MAX_)",
					"sInfoPostFix": "",
					"sSearch": "Chercher:",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Chargement...",
					"oPaginate": {
						"sFirst": "<<", "sLast": ">>", "sNext": ">", "sPrevious": "<"
					},
					"oAria": {
						"sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
					}
					}
			});
	</script>
@endsection

@section('deleteAll')
    <script>
        $('.selectall').click(function(){
            $('.selectbox').prop('checked', $(this).prop('checked'));
        });

        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if(total == number){
                $('.selectall').prop('checked', true);
            }else{
                $('.selectall').prop('checked', false);
            }
        });
    </script>
@endsection

<script>
    var li  = document.getElementById('matiere');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_matiere');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>

@endsection
