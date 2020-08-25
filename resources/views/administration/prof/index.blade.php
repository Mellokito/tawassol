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
                    <a href="{{ route('prof.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">Prof</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Liste des profs</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
        @include('shared.errors_succes')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Liste des profs
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('prof.create') }}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus-circle"></i>
                                <span>Ajouter prof</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body table-responsive">

            <!--begin: Datatable -->
            <form action="{{ route('prof.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air mb-4" 
                    onclick="return confirm('Confirmer cette action ?');" type="submit">
                    <i class="la la-close"></i> &nbsp; Supprimer la selection
                </button>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="list_items" >
                <thead>
                    <th><input type="checkbox" class="selectall" /></th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Date naissance</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Date de création</th>
                    <th>Date de modification</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($profs as $prof)
                    <tr>
                        {{-- {{ var_dump($prof->id) }} --}}
                        <td>
                            <input type="checkbox" class="selectbox" name="test[]" value="{{ $prof->id }}">
                        </td>
                        <td>
                            {{ $prof->nom_prof }}
                        </td>
                        <td>
                            {{ $prof->prenom_prof }}
                        </td>
                        <td>
                            {{ $prof->adresse_prof }}
                        </td>
                        <td>
                            {{ $prof->telephone_prof }}
                        </td>
                        <td>
                            {{ $prof->date_naissance_prof }}
                        </td>
                        <td>
                            {{ $prof->email_prof }}
                        </td>

                        <td>
                            {{ $prof->username }}
                        </td>
                    
                        <td>
                            {{ $prof->created_at }}
                        </td>
                        <td>
                            {{ $prof->updated_at }}
                        </td>
                        <td style="text-align:center;">
                            <span class="dropdown">
                                <a href="#" class="btn m-btn btn-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">
                                    <a class="dropdown-item" href="{{route('prof.edit',$prof->id)}}">
                                        <i class="la la-edit"></i> &nbsp; Modifer
                                    </a>
                                                                        
                                    <form action="{{ route('prof.destroy', $prof->id)}}" method="POST" id="formDelete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" onclick="return confirm('Confirmer cette action ?');" type="submit">
                                            <i class="la la-close"></i> &nbsp; Supprimer
                                        </button>
                                    </form>
                                </div>
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            </form>
        </div>
    </div>

    <!-- END EXAMPLE TABLE PORTLET-->
</div>

@section('datatable')
<script>
		$("#list_items").dataTable({
			"order": [
				[1, "asc"]
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
    var li  = document.getElementById('prof');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_prof');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>

@endsection
