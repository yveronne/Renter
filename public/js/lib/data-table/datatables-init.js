(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/




    $('#bootstrap-data-table').DataTable({
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        "aaSorting": [],
        "select" :true,
        "language": {
            "lengthMenu": "Affichage de _MENU_ entrées par page",
            "zeroRecords": "Aucun élément à afficher",
            "info": "Page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat",
            "infoFiltered": "(filtrage de _MAX_ max)",
            "search" : "Rechercher",
            "paginate" :{
                "previous" : "Précédent",
                "next" : "Suivant"
            }
        }
    });

    $('.bootstrap-data-table').DataTable({
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        "aaSorting": [],
        "select" :true,
        "language": {
            "lengthMenu": "Affichage de _MENU_ entrées par page",
            "zeroRecords": "Aucun élément à afficher",
            "info": "Page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat",
            "infoFiltered": "(filtrage de _MAX_ max)",
            "search" : "Rechercher",
            "paginate" :{
                "previous" : "Précédent",
                "next" : "Suivant"
            }
        }
    });

    $('#bootstrap-data-table-export').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	$('#row-select').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
	 
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );






})(jQuery);